<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


use App\Models\Advertisement;

class AdminRoleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('can:admin.roles.view')->only(['index','create']);
    // }

    public function index()
    {
        $roles = Role::with('permissions')->get();
        $totalPermissionsCount = Permission::count();
        return view('admin.roles.index', compact('roles','totalPermissionsCount'));
    }
    public function create()
    {
        $permissions =Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        try {
            // Create role with correct guard
            $role = Role::create([
                'name' => $request->name,
                'guard_name' => 'web', // must match permission guard
            ]);

            if ($request->filled('permissions')) {
                // Fetch permission models (ensures correct guard + valid IDs)
                $permissions = Permission::whereIn('id', $request->permissions)
                                        ->where('guard_name', 'web')
                                        ->get();

                // Attach them properly
                $role->syncPermissions($permissions);
            }
            return redirect()->route('admin.roles.index')
                            ->with('success', 'Role created successfully with permissions.');

        } catch (\Exception $e) {
            return redirect()->route('admin.roles.index')
                            ->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $role = Role::findOrFail($id); // safer than where()->first()
        $permissions = Permission::all(); // all available permissions

        // Use IDs here to match form checkboxes
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id', // validate by ID, not name
        ]);

        try {
            $role = Role::findOrFail($id);

            // Ensure the role has the correct guard
            if (!$role->guard_name) {
                $role->guard_name = 'web';
            }

            $role->name = $request->name;
            $role->save();

            if ($request->filled('permissions')) {
                // Fetch permission models by ID and guard
                $permissions = Permission::whereIn('id', $request->permissions)->where('guard_name', $role->guard_name)->get();
                $role->syncPermissions($permissions);
            }
            else {
                // No permissions selected → remove all
                $role->syncPermissions([]);
            }

            return redirect()->route('admin.roles.index')
                            ->with('success', 'Role updated successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()
                            ->with('error', 'Failed to update role: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $role = Role::findById($id);
            $role->delete();

            return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.roles.index')->with('error', 'Failed to delete role: ' . $e->getMessage());
        }
    }

}
