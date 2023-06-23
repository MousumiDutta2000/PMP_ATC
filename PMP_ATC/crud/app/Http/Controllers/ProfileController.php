<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Vertical;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;

        $query = Profile::with(['user', 'lineManager', 'vertical']);

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

        return view('profiles.index', compact('profiles'))->with('i', ($profiles->currentPage() - 1) * $perPage);
    }

    public function create()
    {
        $users = User::all();
        $verticals = Vertical::all();

        return view('profiles.create', compact('users', 'verticals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'DOB' => 'required',
            'work_location' => 'required',
            'work_address' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
            'line_manager_id' => 'required',
            'user_id' => 'required',
            'designation_id' => 'required',
            'vertical_id' => 'required',
            'highest_educational_qualification_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profile = new Profile;
        $profile->name = $request->name;
        $profile->father_name = $request->father_name;
        $profile->DOB = $request->DOB;
        $profile->work_location = $request->work_location;
        $profile->work_address = $request->work_address;
        $profile->email = $request->email;
        $profile->contact_number = $request->contact_number;
        $profile->line_manager_id = $request->line_manager_id;
        $profile->user_id = $request->user_id;
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

        return redirect()->route('profiles.index')->with('success', 'Profile Added Successfully');
    }

    public function edit(Profile $profile)
    {
        $users = User::all();
        $verticals = Vertical::all();

        return view('profiles.edit', compact('profile', 'users', 'verticals'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
            'line_manager_id' => 'required',
            'designation_id' => 'required',
            'vertical_id' => 'required',
            'highest_educational_qualification_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profile->name = $request->name;
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
