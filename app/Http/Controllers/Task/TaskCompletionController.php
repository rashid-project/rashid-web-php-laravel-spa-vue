<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Task;

class TaskCompletionController extends Controller
{
    public function complete(Task $task)
    {
        $task->complete();

        return response()->json([
            'data' => $task
        ]);
    }

    public function uncomplete(Task $task)
    {
        $task->uncomplete();

        return response()->json([
            'data' => $task
        ]);
    }
}
