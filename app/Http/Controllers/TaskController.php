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
        $tasks = Task::get();
        return view('Task.index',compact('tasks'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $task="";
        return view('Task.create',compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->task_name = $request->input('task_name');
        $task->task_link = $request->input('task_link');
        $task->task_summary = $request->input('task_summary');
        $task->task_start_date = $request->input('start_date');
        $task->task_end_date = $request->input('end_date');
        $task->save();
        return redirect()->route('task.index')->with('message','Task added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('Task.create', compact('task'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->task_name = $request->input('task_name');
        $task->task_link = $request->input('task_link');
        $task->task_summary = $request->input('task_summary');
        $task->task_start_date = $request->input('start_date');
        $task->task_end_date = $request->input('end_date');
        $task->save();
        return redirect()->route('task.index')->with('message','Task updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('task.index')->with('message','Task deleted Successfully.');
    }
}
