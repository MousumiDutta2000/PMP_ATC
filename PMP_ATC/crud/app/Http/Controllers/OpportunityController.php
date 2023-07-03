<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use App\Models\OpportunityStatus;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::all();
        $opportunityStatuses = OpportunityStatus::all();
        return view('opportunities.index', compact('opportunities', 'opportunityStatuses'));
    }

    public function create()
    {
        $opportunityStatuses = OpportunityStatus::all();
        return view('opportunities.create', compact('opportunityStatuses'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'opportunity_status_id' => 'required',
            'proposal' => 'required',
            'initial_stage' => 'required',
            'technical_stage' => 'required',
        ]);

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
        $opportunityStatuses = OpportunityStatus::all();

        return view('profiles.edit', compact('profile', 'users', 'verticals', 'designations', 'lineManagers', 'qualifications'));
        return view('opportunities.edit', compact('opportunity', opportunityStatuses));
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
