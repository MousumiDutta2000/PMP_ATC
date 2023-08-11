<?php

namespace App\Http\Controllers;
use App\Models\TaskStatus;

use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskStatuses = TaskStatus::all();
        return view('task_status.index', compact('taskStatuses'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task_status.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'level' => 'required',
        ]);

        $TaskStatus = new TaskStatus;
        $TaskStatus->status = $request->status;
        $TaskStatus->level = $request->level;

        $TaskStatus->save();

        return redirect()->route('task_status.index')->with('success', 'Task status created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(TaskStatus $TaskStatus)
    {
        return view('task_status.show', compact('TaskStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskStatus $TaskStatus)
    {
        return view('task_status.edit', compact('TaskStatus'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskStatus $TaskStatus)
    {
        $request->validate([
            'status' => 'required',
            'level' => 'required',
        ]);

        $TaskStatus->update($request->all());

        return redirect()->route('task_status.index')->with('success', 'Task status updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskStatus $TaskStatus)
    {
        $TaskStatus->delete();
        return redirect()->route('task_status.index')->with('success', 'Task status deleted successfully.');
    }

}