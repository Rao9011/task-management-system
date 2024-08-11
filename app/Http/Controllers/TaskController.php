<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getTask()
    {
        $employeeRole = Role::where('name', 'Employee')->first();
        $employees = $employeeRole->users;
        $projet = Project::get();

        $authUser = Auth::user()->id;

        $tasks = Task::with('assignee','creator','project')
        ->where('created_by',$authUser)
        ->get();

        return view('admin.module.Task.index', compact('employees', 'projet','tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function getTaskAssign(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'assigned_to' => 'required|exists:users,id',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'required|date',
        ]);

        $taskData = $request->all();
        $taskData['created_by'] = Auth::id(); // Assign the currently authenticated user's ID as the creator

        $task = Task::create($taskData); // Create a new task with the validated data
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     */
    public function getTaskEdit($id)
    {
        $projet = Project::get();
        $employeeRole = Role::where('name', 'Employee')->first();
        $employees = $employeeRole->users;

        $tasks = Task::with('assignee','creator','project')
        ->where('id',$id)
        ->first();

        return view('admin.module.Task.update',compact('tasks','projet','employees'));

    }

    /**
     * Show the form for editing the specified resource.
     */
  
    /**
     * Update the specified resource in storage.
     */
    public function getTaskUpdate(Request $request, $id)
    {
        $project = Task::find($id);
        $project->name = $request->name;
        $project->description = $request->description;
        $project->project_id = $request->project_id;
        $project->status = $request->status;
        $project->assigned_to = $request->assigned_to;
        $project->priority = $request->priority;
        $project->due_date = $request->due_date;
        $project->save();
        return  redirect('manager/task');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function getTaskDelete($id)
    {
        $project = Task::find($id);
        $project->delete();
        return redirect()->back();
    }
}
