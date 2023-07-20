<?php

namespace App\Http\Controllers;

use App\Models\Task;
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
        $tasks= Task::all();
        return view('tasks.create', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required|in:Feature, User story', 
            'priority' => 'required|in:Low priority, Med Priority, High priority',
            'details' => 'required',
            'attachments' => 'required',
            'assigned_to' => 'required',
            'created_by' => 'required',
            'last_edited_by' => 'required',
            'estimated_time' => 'required|date',
            'time_taken' => 'required|date',
            'status' => 'required|in:notstarted,ongoing,hold,completed',
            'parent_task' => '',
        ]);

        $task = new Task;
        $task->uuid = substr(Str::uuid()->toString(), 0, 8);
        $task->title = $request->type;
        $task->type = $request->type;
        $task->priority = $request->priority;
        $task->details = $request->details;
        $task->attachments = $request->attachments;
        $task->assigned_to = $request->assigned_to;
        $task->created_by = $request->created_by;
        $task->last_edited_by = $request->last_edited_by;
        $task->estimated_time = $request->estimated_time;
        $task->time_taken = $request->time_taken;
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
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required|in:Feature, User story', 
            'priority' => 'required|in:Low priority, Med Priority, High priority',
            'details' => 'required',
            'attachments' => 'required',
            'assigned_to' => 'required',
            'created_by' => 'required',
            'last_edited_by' => 'required',
            'estimated_time' => 'required|date',
            'time_taken' => 'required|date',
            'status' => 'required|in:notstarted,ongoing,hold,completed',
            'parent_task' => '',
        ]);
        
       
        $task->uuid = substr(Str::uuid()->toString(), 0, 8);
        $task->type = $request->type;
        $task->priority = $request->priority;
        $task->details = $request->details;
        $task->attachments = $request->attachments;
        $task->assigned_to = $request->assigned_to;
        $task->created_by = $request->created_by;
        $task->last_edited_by = $request->last_edited_by;
        $task->estimated_time = $request->estimated_time;
        $task->time_taken = $request->time_taken;
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
