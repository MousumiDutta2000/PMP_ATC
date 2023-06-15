<?php

namespace App\Http\Controllers;

use App\Models\HighestEducationValue;
use Illuminate\Http\Request;

class HighestEducationValueController extends Controller
{
    public function index()
    {
        $highestEducationValues = HighestEducationValue::all();
        return view('highest_education_value.index', compact('highestEducationValues'));
    }

    public function create()
    {
        return view('highest_education_value.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'highest_education_value' => 'required',
        ]);

        HighestEducationValue::create($request->only('highest_education_value'));

        return redirect()->route('highest-education-values.index')->with('success', 'Highest Education Value created successfully.');
    }

    public function show($id)
    {
        $highestEducationValue = HighestEducationValue::findOrFail($id);
        return view('highest_education_value.show', compact('highestEducationValue'));
    }

    public function edit($id)
    {
        $highestEducationValue = HighestEducationValue::findOrFail($id);
        return view('highest_education_value.edit', compact('highestEducationValue'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'highest_education_value' => 'required',
        ]);

        $highestEducationValue = HighestEducationValue::findOrFail($id);
        $highestEducationValue->update($request->only('highest_education_value'));

        return redirect()->route('highest-education-values.index')->with('success', 'Highest Education Value updated successfully.');
    }

    public function destroy($id)
    {
        $highestEducationValue = HighestEducationValue::findOrFail($id);
        $highestEducationValue->delete();

        return redirect()->route('highest-education-values.index')->with('success', 'Highest Education Value deleted successfully.');
    }
}
