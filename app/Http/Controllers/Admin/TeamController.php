<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class TeamController extends Controller
{
    public function index()
    {
        $members = User::all();
        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.team.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'role_id' => 'required|exists:roles,id',
        ]);

        $member = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password'), // Default password
        ]);

        $role = Role::find($request->role_id);
        $member->assignRole($role->name);

        return redirect()->route('admin.team.index')->with('success', 'Team member created successfully.');
    }

    public function edit(User $team)
    {
        $roles = Role::all();
        return view('admin.team.edit', ['member' => $team, 'roles' => $roles]);
    }

    public function update(Request $request, User $team)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$team->id,
            'role_id' => 'required|exists:roles,id',
        ]);

        $team->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $role = Role::find($request->role_id);
        $team->syncRoles([$role->name]);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(User $team)
    {
        $team->delete();
        return redirect()->route('admin.team.index')->with('success', 'Team member deleted successfully.');
    }
}
