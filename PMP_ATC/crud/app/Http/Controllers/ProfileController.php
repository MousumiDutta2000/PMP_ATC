<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Vertical;
use App\Models\Designation;
use App\Models\HighestEducationValue;

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

            // Check if the image file already exists
            $existingImage = public_path('images/profiles/' . $imageName);
            if (file_exists($existingImage)) {
                // If the image already exists, assign the existing path to the profile
                $profile->image = 'images/profiles/' . $imageName;
            } else {
                // If the image doesn't exist, move it to the destination folder
                $image->move(public_path('images/profiles'), $imageName);
                $profile->image = 'images/profiles/' . $imageName;
            }
        }

        $profile->save();

        return redirect()->route('profiles.index')->with('success', 'Profile Added Successfully');
    }

    public function edit(Profile $profile)
    {
        $users = User::all();
        $verticals = Vertical::all();
        $designations = Designation::all();
        $lineManagers = User::all();
        $qualifications = HighestEducationValue::all();

        return view('profiles.edit', compact('profile', 'users', 'verticals', 'designations', 'lineManagers', 'qualifications'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'contact_number' => 'required',
            'line_manager_id' => 'required',
            'designation_id' => 'required',
            'vertical_id' => 'required',
            'highest_educational_qualification_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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

        return redirect()->route('profiles.index')->with('success', 'Profile Updated');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect('profiles')->with('success', 'Profile deleted!');
    }

    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }
}
