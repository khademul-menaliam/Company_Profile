<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeopleController extends Controller
{
    // ------------------ ADVISORS ------------------

    public function advisorsIndex()
    {
        $advisors = Person::where('type', 'advisor')->latest()->paginate(10);
        return view('admin.advisors.index', compact('advisors'));
    }

    public function createAdvisor()
    {
        return view('admin.advisors.create');
    }

    public function storeAdvisor(Request $request)
    {
        $request->merge(['type' => 'advisor']);
        return $this->storePerson($request);
    }

    public function editAdvisor(Person $person)
    {
        return view('admin.advisors.edit', compact('person'));
    }

    public function updateAdvisor(Request $request, Person $person)
    {
        $request->merge(['type' => 'advisor']);
        return $this->updatePerson($request, $person);
    }

    public function showAdvisor(Person $person)
    {
        return view('admin.advisors.view', compact('person'));
    }

    public function destroyAdvisor(Person $person)
    {
        return $this->destroyPerson($person);
    }

    // ------------------ TEAM MEMBERS ------------------

    public function teamIndex()
    {
        $teamMembers = Person::where('type', 'team_member')->latest()->paginate(10);
        return view('admin.team.index', compact('teamMembers'));
    }

    public function createTeam()
    {
        return view('admin.team.create');
    }

    public function storeTeam(Request $request)
    {
        $request->merge(['type' => 'team_member']);
        return $this->storePerson($request);
    }

    public function editTeam(Person $person)
    {
        return view('admin.team.edit', compact('person'));
    }

    public function updateTeam(Request $request, Person $person)
    {
        $request->merge(['type' => 'team_member']);
        return $this->updatePerson($request, $person);
    }

    public function showTeam(Person $person)
    {
        return view('admin.team.view', compact('person'));
    }

    public function destroyTeam(Person $person)
    {
        return $this->destroyPerson($person);
    }

    // ------------------ COMMON PRIVATE METHODS ------------------

    private function storePerson(Request $request)
    {
        $request->validate([
            'type' => 'required|in:advisor,team_member',
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp',
        ]);

        $data = $request->only(['type', 'name', 'position', 'message']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('people', 'public');
        }

        Person::create($data);

        return $request->type === 'advisor'
            ? redirect()->route('admin.advisors.index')->with('success', 'Advisor added successfully!')
            : redirect()->route('admin.team_members.index')->with('success', 'Team member added successfully!');
    }

    private function updatePerson(Request $request, Person $person)
    {
        $request->validate([
            'type' => 'required|in:advisor,team_member',
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp',
        ]);

        $data = $request->only(['type', 'name', 'position', 'message']);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($person->image && Storage::disk('public')->exists($person->image)) {
                Storage::disk('public')->delete($person->image);
            }
            $data['image'] = $request->file('image')->store('people', 'public');
        }

        $person->update($data);

        return $person->type === 'advisor'
            ? redirect()->route('admin.advisors.index')->with('success', 'Advisor updated successfully!')
            : redirect()->route('admin.team_members.index')->with('success', 'Team member updated successfully!');
    }

    private function destroyPerson(Person $person)
    {
        if ($person->image && Storage::disk('public')->exists($person->image)) {
            Storage::disk('public')->delete($person->image);
        }

        $type = $person->type;
        $person->delete();

        return $type === 'advisor'
            ? redirect()->route('admin.advisors.index')->with('success', 'Advisor deleted successfully!')
            : redirect()->route('admin.team_members.index')->with('success', 'Team member deleted successfully!');
    }
}
