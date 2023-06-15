<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
class DesignationController extends Controller
{
    public function index(Request $request){
        $keyword = $request->get('search');
        $perPage = 5;

        if(!empty($keyword)){
            $designations = Designation::where('level', 'LIKE', "%$keyword%")
            ->orWhere('id', 'LIKE', "%$keyword%")
            ->latest()->paginate($perPage);
        }
        else{
            $designations = Designation::latest()->paginate($perPage);
        }
        return view('designations.index', ['designations' => $designations])->with('i',(request()->input('page',1) -1) *5);
    }

    public function create(){
        return view('designations.create');
    }

    public function store(Request $request)
    {

        $designation = new Designation;

        $request->validate([
            'level' => 'required',
        ]);

       
        $designation->level = $request->level;
        
        $designation->save();
        return redirect() -> route('designations.index')->with('success','Added Successfully');
    }

    public function edit($id){
        $designation = Designation::findOrFail($id);
        return view('designations.edit',['designation'=>$designation]);
    }

    public function update(Request $request, Designation $designation){
        $request -> validate([
            'level' => 'required'
        ]);

        $designation->level = $request->level;

        $designation->save();
        return redirect() -> route('designations.index')->with('success','Updated');
    }

    public function destroy($id){
        $profile = Designation::findOrFail($id);
        $profile ->delete();
        return redirect('designations')->with('success','Deleted!');
    }
}
