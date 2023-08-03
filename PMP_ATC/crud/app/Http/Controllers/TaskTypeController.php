<?php

namespace App\Http\Controllers;
use App\Models\TaskType;

use Illuminate\Http\Request;

class TaskTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskTypes = TaskType::all();
        return view('task_types.index', compact('taskTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'type_name' => 'required',
        'level' => 'required',
        'description' => 'required'
    ]);

    $taskType = new TaskType;
    $taskType->type_name = $request->type_name;
    $taskType->level = $request->level;
    $taskType->description = $request->description;

    $taskType->save();

    return redirect()->route('task_types.index')->with('success', 'Task type created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(TaskType $taskType)
    {
        return view('task_types.show', compact('taskType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskType $taskType)
    {
        return view('task_types.edit', compact('taskType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskType $taskType)
    {
        $request->validate([
            'type_name' => 'required',
            'level' => 'required',
            'description' => 'required'
        ]);

        $taskType->update($request->all());

        return redirect()->route('task_types.index')->with('success', 'Task type updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskType $taskType)
    {
        $taskType->delete();

        return redirect()->route('task_types.index')->with('success', 'Task type deleted successfully.');
    }
}

