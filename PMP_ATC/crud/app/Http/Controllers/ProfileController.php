<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Vertical;
use App\Models\Designation;
use App\Models\HighestEducationValue;
use App\Models\UserTechnology;
use App\Models\ProjectRole;
use App\Models\Technology;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;

        $query = Profile::with(['user', 'lineManager', 'profileName']);

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%$keyword%")
                ->orWhereHas('user', function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', "%$keyword%");
                })
                ->orWhereHas('lineManager', function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', "%$keyword%");
                })
                ->orWhereHas('profileName', function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', "%$keyword%");
                });
        }

        $profiles = $query->latest()->paginate($perPage);
        $user_technologies = UserTechnology :: all();
        return view('profiles.index', compact('profiles'))->with('i', ($profiles->currentPage() - 1) * $perPage);
    }

    public function create()
    {
        $users = User::all();
        $verticals = Vertical::all();
        $designations = Designation::all();
        $lineManagers = User::all();
        $qualifications = HighestEducationValue::all();
        $profile_names = User::all();
        $user_technologies = UserTechnology :: all();
        return view('profiles.create', compact('users', 'verticals', 'designations', 'lineManagers', 'qualifications', 'profile_names'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'profile_name' => 'required',
            'father_name' => 'required',
            'DOB' => 'required',
            'work_location' => 'required',
            'work_address' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
            'line_manager_id' => 'required',
            'designation_id' => 'required',
            'vertical_id' => 'required',
            'highest_educational_qualification_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profile = new Profile;
        $profile->profile_name = $request->profile_name;
        $profile->father_name = $request->father_name;
        $profile->DOB = $request->DOB;
        $profile->work_location = $request->work_location;
        $profile->work_address = $request->work_address;
        $profile->email = $request->email;
        $profile->contact_number = $request->contact_number;
        $profile->line_manager_id = $request->line_manager_id;
        $profile->designation_id = $request->designation_id;
        $profile->vertical_id = $request->vertical_id;
        $profile->highest_educational_qualification_id = $request->highest_educational_qualification_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/profiles'), $imageName);
            $profile->image = 'images/profiles/' . $imageName;
        }

        $profile->save();
        $user_technologies = UserTechnology :: all();
        return redirect()->route('profiles.index')->with('success', 'Profile Added Successfully');
    }

    public function edit(Profile $profile)
    {
        $users = User::all();
        $verticals = Vertical::all();
        $designations = Designation::all();
        $lineManagers = User::all();
        $qualifications = HighestEducationValue::all();
        $user_technologies = UserTechnology :: all();
        return view('profiles.edit', compact('profile', 'users', 'verticals', 'designations', 'lineManagers', 'qualifications', 'user_technologies'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'profile_name' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
            'line_manager_id' => 'required',
            'designation_id' => 'required',
            'vertical_id' => 'required',
            'highest_educational_qualification_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profile->profile_name = $request->profile_name;
        $profile->email = $request->email;
        $profile->contact_number = $request->contact_number;
        $profile->line_manager_id = $request->line_manager_id;
        $profile->designation_id = $request->designation_id;
        $profile->vertical_id = $request->vertical_id;
        $profile->highest_educational_qualification_id = $request->highest_educational_qualification_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/profiles'), $imageName);
            $profile->image = 'images/profiles/' . $imageName;
        }

        $profile->save();
        $user_technologies = UserTechnology :: all();
        return redirect()->route('profiles.index')->with('success', 'Profile Updated');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        $user_technologies = UserTechnology :: all();
        return redirect('profiles')->with('success', 'Profile deleted!');
    }

    public function show(Profile $profile)
    {
        $users = User::all();
        $user_technologies = UserTechnology :: all();
        $project_roles = ProjectRole :: all();
        $technologies = Technology :: all();
        return view('profiles.show', compact('profile','users','user_technologies', 'project_roles','technologies'));
    }
}
