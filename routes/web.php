<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function() {
    $tasks= Task::latest('title')->get();
    return view('index',['tasks'=>$tasks]);
})->name('tasks.index');

Route::get('tasks/create', function(){
    return view('create');
})->name('tasks.create');

Route::get('/tasks/{id}', function($id) {
    $task= Task::findOrFail($id);
    return view('detail',['task'=>$task]);
})->name('tasks.detail');

Route::post('tasks', function(Request $request){
    // dd($request->all());
    $data=$request->validate([
        'title'=>'required|max:255',
        'description'=>'required|min:3|max:255',
        'long_description'=>'required|min:3|max:255',
    ]);
    $task = new Task();
    $task->title = $request->title;
    $task->description = $request->description;
    $task->long_description = $request->long_description;
    $task->completed = false;
    $task->save();
    return redirect()->route('tasks.index')->with('success', 'Task created successfully');
})->name('tasks.create');
