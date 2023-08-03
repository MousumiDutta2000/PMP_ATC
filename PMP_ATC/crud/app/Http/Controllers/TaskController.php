<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $tasks = Task::all();
        $profiles= Profile::all();
        return view('tasks.create', compact('tasks','profiles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required|in:Feature,User story',
            'priority' => 'required|in:Low priority,Med priority,High priority',
            'details' => 'required',
            'attachments' => 'required',
            'assigned_to' => 'required',
            'created_by' => 'required',
            'last_edited_by' => 'required',
            'estimated_time_number' => 'required|numeric',
            'estimated_time_unit' => 'required|in:hour,day,month,year',
            'time_taken_number' => 'required|numeric',
            'time_taken_unit' => 'required|in:hour,day,month,year',
            'status' => 'required|in:not started,ongoing,hold,completed',
            'parent_task' => '',
        ]);

        $task = new Task;
        $task->uuid = substr(Str::uuid()->toString(), 0, 8);
        $task->title = $request->title;
        $task->type = $request->type;
        $task->priority = $request->priority;
        $task->details = $request->details;
        // $task->attachments = $request->attachments;
        if ($request->hasFile('attachments')) {
            $file = $request->file('attachments');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('attachments', $fileName, 'public');
            $task->attachments = $filePath;
        }
        $task->assigned_to = $request->assigned_to;
        $task->created_by = $request->created_by;
        $task->last_edited_by = $request->last_edited_by;
        $task->estimated_time = $request->estimated_time_number . ' ' . $request->estimated_time_unit;
        $task->time_taken = $request->time_taken_number . ' ' . $request->time_taken_unit;
        $task->status = $request->status;
        $task->parent_task = $request->parent_task;

        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $tasks = Task::all();
        $profiles= Profile::all();
        return view('tasks.edit', compact('task','tasks','profiles'));
    }



    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required|in:feature,user story',
            'priority' => 'required|in:Low priority,Med priority,High priority',
            'details' => 'required',
            // 'attachments' => '',
            'assigned_to' => 'required',
            'created_by' => 'required',
            'last_edited_by' => 'required',
            'estimated_time_number' => 'required|numeric',
            'estimated_time_unit' => 'required|in:hour,day,month,year',
            'time_taken_number' => 'required|numeric',
            'time_taken_unit' => 'required|in:hour,day,month,year',
            'status' => 'required|in:not started,ongoing,hold,completed',
            'parent_task' => '',
        ]);

        $task->uuid = substr(Str::uuid()->toString(), 0, 8);
        $task->title = $request->title;
        $task->type = $request->type;
        $task->priority = $request->priority;
        $task->details = $request->details;
        // $task->attachments = $request->attachments;
        if ($request->hasFile('attachments')) {
            $file = $request->file('attachments');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('attachments', $fileName, 'public');
            $task->attachments = $filePath;
        }
        $task->assigned_to = $request->assigned_to;
        $task->created_by = $request->created_by;
        $task->last_edited_by = $request->last_edited_by;
        $task->estimated_time = $request->estimated_time_number . ' ' . $request->estimated_time_unit;
        $task->time_taken = $request->time_taken_number . ' ' . $request->time_taken_unit;
        $task->status = $request->status;
        $task->parent_task = $request->parent_task;

        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
