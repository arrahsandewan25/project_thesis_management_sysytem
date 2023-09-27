<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    //constructor
    public function __construct()
    {
        //check task status
        $tasks = Task::where('status', 0)
            ->where('ended_at', '<', Carbon::now())
            ->get();
        foreach ($tasks as $task) {
            $task->status = 4;
            $task->save();
        }
    }
}
