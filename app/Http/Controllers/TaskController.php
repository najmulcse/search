<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;

class TaskController extends Controller
{
    //

//    public function __construct(){
//        $this->middleware('auth');
//    }

    public function index()
    {
        $tasks = Task::orderBy('created_at','dsc')->get();

        return view('tasks.index',compact('tasks'));
    }


    public function edit(Task $task){

        return view('tasks.edit',compact('task'));
    }
    public function update(Request $request, Task $task){
        $task->name=$request->name;
        $task->save();
        return redirect('/tasks');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:10',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }


    public function destroy(Task $task){

        $task->delete();
        return back();
    }
}
