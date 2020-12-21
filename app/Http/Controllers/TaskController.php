<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public $task = null;

    public function __construct(Task $task){
        $this->task = $task;
    }

    public function getTask(){
        return $this->task->all();
    }
}
