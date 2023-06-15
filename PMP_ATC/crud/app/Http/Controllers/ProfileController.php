<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
class ProfileController extends Controller
{
    public function index(Request $request){
        $keyword = $request->get('search');
        $perPage = 5;

        if(!empty($keyword)){
            $profiles = Profile::where('name', 'LIKE', "%$keyword%")
            ->orWhere('user_id', 'LIKE', "%$keyword%")
            ->latest()->paginate($perPage);
        }
        else{
            $profiles = Profile::latest()->paginate($perPage);
        }
        return view('profiles.index', ['profiles' => $profiles])->with('i',(request()->input('page',1) -1) *5);
    }

    public function create(){
        return view('profiles.create');
    }

    public function store(Request $request)
    {

        $profile = new Profile;

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
            'line_manager_id' => 'required',
            'user_id' => 'required',
            'designation_id' => 'required',
            'vertical_id' => 'required',
            'highest_educational_qualification_id' => 'required'
        ]);
        
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->contact_number = $request->contact_number;
        $profile->line_manager_id = $request->line_manager_id;
        $profile->user_id = $request->user_id;
        $profile->designation_id = $request->designation_id;
        $profile->vertical_id = $request->vertical_id;
        $profile->highest_educational_qualification_id = $request->highest_educational_qualification_id;
        // $profile->image = $imageName;
        $profile->image = $request->image;

        $profile->save();
        return redirect() -> route('profiles.index')->with('success','Profile Added Successfully');
    }

    public function edit($id){
        $profile = Profile::findOrFail($id);
        return view('profiles.edit',['profile'=>$profile]);
    }

    public function update(Request $request, Profile $profile){
        $request -> validate([
            'name' => 'required'
        ]);

        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->contact_number = $request->contact_number;
        $profile->designation_id = $request->designation_id;
        $profile->highest_educational_qualification_id = $request->highest_educational_qualification_id;
        // $profile->image = $imageName;
        $profile->image = $request->image;

        $profile->save();
        return redirect() -> route('profiles.index')->with('success','Profile Updated');
    }

    public function destroy($id){
        $profile = Profile::findOrFail($id);
        $profile ->delete();
        return redirect('profiles')->with('success','Product deleted!');
    }
}
