<?php

namespace App\Http\Controllers;

use App\Models\Vertical;
use Illuminate\Http\Request;

class VerticalController extends Controller
{
    public function index()
    {
        $verticals = Vertical::all();
        return view('vertical.index', compact('verticals'));
    }

    public function create()
    {
        return view('vertical.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vertical_name' => 'required',
            'vertical_head_name' => 'required',
            'vertical_head_emailId' => 'required|email',
            'vertical_head_contact' => 'required',
        ]);

        Vertical::create([
            'vertical_name' => $request->input('vertical_name'),
            'vertical_head_name' => $request->input('vertical_head_name'),
            'vertical_head_emailId' => $request->input('vertical_head_emailId'),
            'vertical_head_contact' => $request->input('vertical_head_contact'),
        ]);

        return redirect()->route('verticals.index')->with('success', 'Vertical created successfully.');
    }

    public function show($id)
    {
        $vertical = Vertical::findOrFail($id);
        return view('vertical.show', compact('vertical'));
    }

    public function edit($id)
    {
        $vertical = Vertical::findOrFail($id);
        return view('vertical.edit', compact('vertical'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vertical_name' => 'required',
            'vertical_head_name' => 'required',
            'vertical_head_emailId' => 'required|email',
            'vertical_head_contact' => 'required',
        ]);

        $vertical = Vertical::findOrFail($id);
        $vertical->update([
            'vertical_name' => $request->input('vertical_name'),
            'vertical_head_name' => $request->input('vertical_head_name'),
            'vertical_head_emailId' => $request->input('vertical_head_emailId'),
            'vertical_head_contact' => $request->input('vertical_head_contact'),
        ]);

        return redirect()->route('verticals.index')->with('success', 'Vertical updated successfully.');
    }

    public function destroy($id)
    {
        $vertical = Vertical::findOrFail($id);
        $vertical->delete();

        return redirect()->route('verticals.index')->with('success', 'Vertical deleted successfully.');
    }
}
