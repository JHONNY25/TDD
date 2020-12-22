<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function create(){
        return view('Task.create')->with('users',User::all());
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:250',
            'description' => 'required|max:250',
            'user' => 'required'
        ],[
            '*.required' => 'El campo es requerido',
            '*.max' => 'El campo acepta solo :max caracteres',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user
        ]);

        return redirect()->back()->with('success','Se creo la tarea correctamente.');
    }
}
