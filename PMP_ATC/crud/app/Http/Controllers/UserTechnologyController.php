<?php

namespace App\Http\Controllers;

use App\Models\UserTechnology;
use App\Models\ProjectRole;
use App\Models\User;
use App\Models\Technology;
use App\Models\Profile;

use Illuminate\Http\Request;

class UserTechnologyController extends Controller
{
    public function index()
    {
        $user_technologies = UserTechnology::all();
        $technologies = Technology::all();
        $project_roles = ProjectRole::all();
        $users = User::all();
        return view('user_technologies.index', compact('user_technologies'));
    }

    public function create()
    {
        $technologies = Technology::all();
        $project_roles = ProjectRole::all();
        $users = User::all();
        $user_technologies = UserTechnology::all();
        return view('user_technologies.create', compact('users', 'project_roles','technologies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'project_role_id' => 'required',
            'technology_id' => 'required',
            'details' => 'required',
            'years_of_experience' => 'required',
            'is_current_company' => 'boolean'
        ]);

        // Create a new UserTechnology instance and set its properties
        $user_technology = new UserTechnology;
        $user_technology->user_id = $request->user_id;
        $user_technology->project_role_id = $request->project_role_id;
        $user_technology->technology_id = $request->technology_id;
        $user_technology->details = $request->details;
        $user_technology->years_of_experience = $request->years_of_experience;
        $user_technology->is_current_company = $request->has('is_current_company');

        // Save the new user technology record
        $user_technology->save();

        // Redirect back to the same page and display a success message.
       return back()->with('success', 'Skill added successfully.');
       //return back()->withInput(['tab'=>'skill-set']);
       //return redirect(('profiles').'#skill-set')->with('message','sucessfull');
    }


    public function show($id)
    {   
        $user_technology = UserTechnology::findOrFail($id);
        $technologies = Technology::all();
        $project_roles = ProjectRole::all();
        $users = User::all();
        return view('user_technologies.show', compact('user_technology','project_roles','technologies','users'));
    }

    public function edit($id)
    {
        $user_technology = UserTechnology::findOrFail($id);
        $technologies = Technology::all();
        $project_roles = ProjectRole::all();
        $users = User::all();
        return view('user_technologies.edit', compact('user_technology', 'project_roles','technologies','users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'project_role_id' => 'required',
            'technology_id' => 'required',
            'details' => 'required',
            'years_of_experience' => 'required',
            'is_current_company' => 'boolean'
        ]);

        $user_technology = UserTechnology::findOrFail($id);
        $user_technology->project_role_id = $request->project_role_id;
        $user_technology->technology_id = $request->technology_id;
        $user_technology->details = $request->details;
        $user_technology->years_of_experience = $request->years_of_experience;
        $user_technology->is_current_company = $request->has('is_current_company');

        $user_technology->save();
        $technologies = Technology::all();
        $project_roles = ProjectRole::all();
        $users = User::all();
        $user_technologies = UserTechnology::all();
        
        return back()->with('success', 'Skill edited successfully.');
    }

    public function destroy($id)
    {
        $user_technology = UserTechnology::findOrFail($id);
        $user_technology->delete();
        $technologies = Technology::all();
        $project_roles = ProjectRole::all();
        $users = User::all();
        $user_technologies = UserTechnology::all();

        return back()->with('success', 'Skill deleted successfully.');
    }

}
