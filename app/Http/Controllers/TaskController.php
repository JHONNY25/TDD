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

    public function index(){
        return view('home')->with('tasks',$this->getTask());
    }
    public function getTask(){
        return $this->task->with('user')->paginate(3);
    }
}
