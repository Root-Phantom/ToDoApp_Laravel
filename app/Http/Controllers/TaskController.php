<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all()->sortByDesc('created_at');
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Task::create($validated);
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_done' => 'sometimes|boolean',
        ]);

        $newData = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'is_done' => $request->has('is_done'),
        ];

        // بررسی شباهت
        $hasChanges =
            $task->title !== $newData['title'] ||
            $task->description !== $newData['description'] ||
            $task->is_done != $newData['is_done'];

        if ($hasChanges) {
            $task->update($newData);
            return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
        } else {
            return redirect()->route('tasks.index')->with('info', 'No changes were made to the task.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }

    public function change_is_done(Task $task)
    {
        $task->update([
            'is_done' => !$task->is_done
        ]);
        return redirect()->route('tasks.index')->with('success', 'State changed successfully!');
    }
}
