<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    public function create()
    {
        // Add any necessary data to pass to the create view if needed
        return view('comments.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'commented_by' => 'required',
            'user' => 'required',
            'task_id' => 'required',
        ]);

        Comment::create($validatedData);
        return redirect()->route('comments.index')->with('success', 'Comment created successfully!');
    }

    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $validatedData = $request->validate([
            'commented_by' => 'required',
            'user' => 'required',
            'task_id' => 'required',
        ]);

        $comment->update($validatedData);
        return redirect()->route('comments.index')->with('success', 'Comment updated successfully!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully!');
    }
}
