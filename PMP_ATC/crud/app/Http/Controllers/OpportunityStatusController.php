<?php

namespace App\Http\Controllers;

use App\Models\OpportunityStatus;
use Illuminate\Http\Request;

class OpportunityStatusController extends Controller
{
    public function index()
    {
        $opportunityStatuses = OpportunityStatus::all();
        return view('opportunity_status.index', compact('opportunityStatuses'));
    }

    public function create()
    {
        return view('opportunity_status.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_goal' => 'required|in:Achieved,Lost',
        ]);

        OpportunityStatus::create($request->all());

        return redirect()->route('opportunity_status.index')
            ->with('success', 'Opportunity status created successfully.');
    }

    public function edit(OpportunityStatus $opportunityStatus)
    {
        return view('opportunity_status.edit', compact('opportunityStatus'));
    }

    public function update(Request $request, OpportunityStatus $opportunityStatus)
    {
        $request->validate([
            'project_goal' => 'required|in:Achieved,Lost',
        ]);

        $opportunityStatus->update($request->all());

        return redirect()->route('opportunity_status.index')
            ->with('success', 'Opportunity status updated successfully.');
    }

    public function destroy(OpportunityStatus $opportunityStatus)
    {
        $opportunityStatus->delete();

        return redirect()->route('opportunity_status.index')
            ->with('success', 'Opportunity status deleted successfully.');
    }
}
