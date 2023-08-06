<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Profile;
use App\Models\Sprint;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        
        return view('tasks.index', compact('tasks'));
    //     $tasks = Task::with('assignedTo')->get();
    // return view('tasks.index', compact('tasks'));
    }


// -----fom kanban
//     public function index()
// {
//     // Retrieve all tasks from the database
//     $tasks = Task::all();

//     // Return the tasks data as a JSON response
//     return response()->json($tasks);
// }

    public function create()
    {
        $tasks = Task::all();
        $profiles= Profile::all();
        $sprints= Sprint::all();
        $projects= Project::all();
        return view('tasks.create', compact('tasks','profiles','sprints','projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'sprint_id' => 'required',
            'type' => 'required',
            'priority' => 'required|in:Low priority,Med priority,High priority',
            'details' => 'required',
            // 'attachments' => 'required',
            'assigned_to' => 'required',
            'created_by' => 'required',
            'last_edited_by' => 'required',
            'estimated_time_number' => 'required|numeric',
            'estimated_time_unit' => 'required|in:hour,day,month,year',
            'time_taken_number' => 'required|numeric',
            'time_taken_unit' => 'required|in:hour,day,month,year',
            'status' => 'required',
            'parent_task' => '',
        ]);

        $task = new Task;
        $task->uuid = substr(Str::uuid()->toString(), 0, 8);
        $task->title = $request->title;
        // $task->sprint_id = $request->sprint_id;
        $task->type = $request->type;
        $task->priority = $request->priority;
        $task->details = $request->details;
        // $task->attachments = $request->attachments;
        // if ($request->hasFile('attachments')) {
        //     $file = $request->file('attachments');
        //     $fileName = $file->getClientOriginalName();
        //     $filePath = $file->storeAs('attachments', $fileName, 'public');
        //     $task->attachments = $filePath;
        // }
        $task->assigned_to = implode(',', $request->assigned_to);
        // $task->assigned_to = $request->assigned_to;
        $task->created_by = $request->created_by;
        $task->last_edited_by = $request->last_edited_by;
        $task->estimated_time = $request->estimated_time_number . ' ' . $request->estimated_time_unit;
        $task->time_taken = $request->time_taken_number . ' ' . $request->time_taken_unit;
        $task->status = $request->status;
        $task->parent_task = $request->parent_task;

        $task->save();

        // $assignedTo = $request->input('assigned_to', []);
        // $assignedBy = $request->input('assigned_by', []);
        
        // if (is_array($assignedTo) && is_array($assignedBy)) {
        //     foreach ($assignedTo as $key => $profileId) {
        //         $assignedByUser = $assignedBy[$key] ?? null;
        
        //         if ($profileId && $assignedByUser) {
        //             $tasks->profiles()->attach($profileId, ['assigned_by' => $assignedByUser]);
        //         }
        //     }
        // } 
        // $assignedTo = $request->input('assigned_to', []);
        // $assignedBy = $request->input('assigned_by', []);

        // foreach ($assignedTo as $key => $profileId) {
        //     $assignedByUser = $assignedBy[$key] ?? null;

        //     if ($profileId && $assignedByUser) {
        //         $tasks->profiles()->attach($profileId, ['assigned_by' => $assignedByUser]);
        //     }

        // }

        //working 1st
        // $task->users()->sync($request->input('assigned_to'));

        // $task->profiles()->attach($request->assigned_to, [
        //     'assigned_by' => $request->assigned_by,
        //     // 'assigned_date' => now()->toDateString(),
        // ]);
      
  
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }


    // ---------------kanban-------
    // public function store(Request $request)
    // {
    //     // Validate the request data
    //     $validatedData = $request->validate([
    //         'title' => 'required',
    //         'description' => 'required',
    //         'assigned_to' => 'required',
    //         'due_date' => 'required',
    //     ]);

    //     // Create a new task
    //     $task = new Task;
    //     $task->title = $validatedData['title'];
    //     $task->description = $validatedData['description'];
    //     $task->assigned_to = $validatedData['assigned_to'];
    //     $task->due_date = $validatedData['due_date'];
    //     $task->save();

    //     // Return the newly created task as a JSON response
    //     return response()->json(['task' => $task]);
    // }

    

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $tasks = Task::all();
        $profiles= Profile::all();
        $sprints= Sprint::all();
        $projects= Project::all();
        return view('tasks.edit', compact('tasks','profiles','sprints','projects'));
    }



    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'sprint_id' => 'required',
            'type' => 'required',
            'priority' => 'required|in:Low priority,Med priority,High priority',
            'details' => 'required',
            // 'attachments' => 'required',
            'assigned_to' => 'required',
            'created_by' => 'required',
            'last_edited_by' => 'required',
            'estimated_time_number' => 'required|numeric',
            'estimated_time_unit' => 'required|in:hour,day,month,year',
            'time_taken_number' => 'required|numeric',
            'time_taken_unit' => 'required|in:hour,day,month,year',
            'status' => 'required',
            'parent_task' => '',
        ]);

        $task->uuid = substr(Str::uuid()->toString(), 0, 8);
        $task->title = $request->title;
        $task->sprint_id = $request->sprint_id;
        $task->type = $request->type;
        $task->priority = $request->priority;
        $task->details = $request->details;
        // $task->attachments = $request->attachments;
        // if ($request->hasFile('attachments')) {
        //     $file = $request->file('attachments');
        //     $fileName = $file->getClientOriginalName();
        //     $filePath = $file->storeAs('attachments', $fileName, 'public');
        //     $task->attachments = $filePath;
        // }
        $task->assigned_to = implode(',', $request->assigned_to);
        // $task->assigned_to = $request->assigned_to;
        $task->created_by = $request->created_by;
        $task->last_edited_by = $request->last_edited_by;
        $task->estimated_time = $request->estimated_time_number . ' ' . $request->estimated_time_unit;
        $task->time_taken = $request->time_taken_number . ' ' . $request->time_taken_unit;
        $task->status = $request->status;
        $task->parent_task = $request->parent_task;

        $task->save();

        
        // $assignedTo = $request->input('assigned_to', []);
        // $assignedBy = $request->input('assigned_by', []);

        // foreach ($assignedTo as $key => $profileId) {
        //     $assignedByUser = $assignedBy[$key] ?? null;

        //     if ($profileId && $assignedByUser) {
        //         $tasks->profiles()->attach($profileId, ['assigned_by' => $assignedByUser]);
        //     }

        // }
        // $task->users()->sync($request->input('assigned_to'));

        $task->profiles()->sync($request->assigned_to, [
            'assigned_by' => $request->assigned_by,
            'assigned_date' => now()->toDateString(),
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
