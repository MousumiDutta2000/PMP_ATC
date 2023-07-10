<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
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

        $query = Profile::with(['user', 'lineManager']);

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%$keyword%")
                ->orWhereHas('user', function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', "%$keyword%");
                })
                ->orWhereHas('lineManager', function ($q) use ($keyword) {
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
        $profile = new Profile;
        return view('profiles.create', compact('users', 'verticals', 'designations', 'lineManagers', 'qualifications', 'profile'));
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|min:8', // Add a validation rule for the password
        ]);
    
        // Create a new User instance
        $user = new User;
        $user->name = $request->profile_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash the password
        $user->is_admin = $request->has('is_admin');
    
        $user->save(); // Save the user to the users table
    
        // Create a new Profile instance
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

        else {
            // Set profile image based on first and last name initials
            $firstNameInitial = strtoupper(substr($request->profile_name, 0, 1));
            $lastNameInitial = strtoupper(substr(strrchr($request->profile_name, ' '), 1, 1)); // Get the first letter after the last space in the profile name
            $initials = $firstNameInitial . $lastNameInitial;
            $textColor = '#ffffff'; // Set the text color for the initials
            
            // Create an image with the initials
            $image = \Intervention\Image\Facades\Image::canvas(200, 200);

            // Generate a unique color based on the initials
            $nameHash = md5($request->profile_name); // Generate a hash of the name
            $color = '#' . substr($nameHash, 0, 6); // Extract the first 6 characters as a hexadecimal color code

            $image->circle(200, 100, 100, function ($draw) use ($color) {
                $draw->background($color); // Set the circle color based on the name
            });

            $image->text($initials, 100, 100, function($font) use ($textColor) {
                $font->file(public_path('fonts/arial.ttf'));
                $font->size(100); // Increase the font size to 150
                $font->color($textColor);
                $font->align('center');
                $font->valign('middle');
            });

            // Save the image
            $imageName = time() . '.png';
            $image->save(public_path('images/profiles') . '/' . $imageName);
            $profile->image = 'images/profiles/' . $imageName;
        }
    
        // Assign the user_id to the profile
        $profile->user_id = $user->id;
    
        $profile->save(); // Save the profile
    
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
