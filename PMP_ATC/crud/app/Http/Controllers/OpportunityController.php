<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::all();
        return view('opportunities.index', compact('opportunities'));
    }

    public function create()
    {
        return view('opportunities.create');
    }

    public function store(Request $request)
    {
        $opportunity = new Opportunity;
        $opportunity->opportunity_status_id = $request->opportunity_status_id;
        $opportunity->proposal = $request->proposal;
        $opportunity->initial_stage = $request->initial_stage;
        $opportunity->technical_stage = $request->technical_stage;
        $opportunity->save();

        return redirect()->route('opportunities.index')->with('success', 'Opportunity created successfully.');
    }

    public function show(Opportunity $opportunity)
    {
        return view('opportunities.show', compact('opportunity'));
    }

    public function edit(Opportunity $opportunity)
    {
        return view('opportunities.edit', compact('opportunity'));
    }

    public function update(Request $request, Opportunity $opportunity)
    {
        $opportunity->opportunity_status_id = $request->opportunity_status_id;
        $opportunity->proposal = $request->proposal;
        $opportunity->initial_stage = $request->initial_stage;
        $opportunity->technical_stage = $request->technical_stage;
        $opportunity->save();

        return redirect()->route('opportunities.index')->with('success', 'Opportunity updated successfully.');
    }

    public function destroy(Opportunity $opportunity)
    {
        $opportunity->delete();

        return redirect()->route('opportunities.index')->with('success', 'Opportunity deleted successfully.');
    }
}
