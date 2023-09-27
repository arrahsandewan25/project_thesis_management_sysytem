<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskManagementController extends Controller
{
    //
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $task = new Task();
        $task->project_id = $request->project_id;
        $task->team_id = $request->team_id;
        $task->supervisor_id = $request->supervisor_id;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->started_at = str_replace('T', ' ', $request->started_at);
        $task->ended_at = str_replace('T', ' ', $request->ended_at);
        $task->save();

        notify()->success('Task created successfully.');
        return redirect()->back();
    }

    // studentPendingTask
    public function studentPendingTask($id)
    {
        $tasks = Task::with('project', 'team', 'team.member1', 'team.member2', 'supervisor')
            ->where('project_id', $id)
            ->where('team_id', auth()->user()->team->id)
            //status 0 or 1
            ->whereIn('status', [0, 1])
            ->where('ended_at', '>=', Carbon::now())
            ->get();
        // return response()->json($tasks);
        return view('backend.pages.student.task.pending', compact('tasks'));
    }

    //studentApprovedTask
    public function studentApprovedTask($id)
    {
        $tasks = Task::with('project', 'team', 'team.member1', 'team.member2', 'supervisor')
            ->where('project_id', $id)
            ->where('team_id', auth()->user()->team->id)
            ->where('status', 2)
            ->get();
        // return response()->json($tasks);
        return view('backend.pages.student.task.approved', compact('tasks'));
    }

    //studentRejectedTask
    public function studentRejectedTask($id)
    {
        $tasks = Task::with('project', 'team', 'team.member1', 'team.member2', 'supervisor')
            ->where('project_id', $id)
            ->where('team_id', auth()->user()->team->id)
            ->where('status', 3)
            ->get();
        // return response()->json($tasks);
        return view('backend.pages.student.task.approved', compact('tasks'));
    }

    //studentFailedTask
    public function studentFailedTask($id)
    {
        $tasks = Task::with('project', 'team', 'team.member1', 'team.member2', 'supervisor')
            ->where('project_id', $id)
            ->where('team_id', auth()->user()->team->id)
            ->where('status', 4)
            ->where('ended_at', '<', Carbon::now())
            ->get();
        // return response()->json($tasks);
        return view('backend.pages.student.task.approved', compact('tasks'));
    }

    // studentSubmitTask
    public function studentSubmitTask(Request $request)
    {
        $task = Task::find($request->task_id);
        $task->status = 1;
        $task->submitted_description = $request->submitted_description;
        $task->submitted_attachment = $request->submitted_attachment;
        $task->submitted_at = Carbon::now();
        $task->save();

        notify()->success('Task submitted successfully.');
        return redirect()->back();
    }

    //taskList
    public function taskList($id)
    {
        $tasks = Task::with('project', 'team', 'team.member1', 'team.member2', 'supervisor')
            ->where('project_id', $id)
            ->where('supervisor_id', auth()->user()->id)
            ->get();
        // return response()->json($tasks);
        return view('backend.pages.teacher.task.list', compact('tasks'));
    }

    //teacherTaskReview
    public function teacherTaskReview(Request $request)
    {
        $task = Task::find($request->task_id);
        $task->status = $request->status;
        $task->remarks = $request->remark;
        $task->save();

        notify()->success('Task reviewed successfully.');
        return redirect()->back();
    }
}
