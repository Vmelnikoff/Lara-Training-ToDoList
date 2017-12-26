<?php

use App\Http\Requests\StoreTaskPost;
use App\Http\Requests\StoreTaskStatus;
use App\Task;


Route::get('/', function () {
    $tasks = Task::all();

    return view('tasks.index', [
        'tasks' => $tasks,
    ]);
})->name('tasks.index');

Route::get('/tasks/create', function () {
    return view('tasks.create');
})->name('tasks.create');


Route::get('/tasks/{task}', function (Task $task) {

    return view('tasks.show', [
        'task' => $task,
    ]);
})->name('tasks.show');


Route::put('/tasks/update/{task}/{status}', function (StoreTaskStatus $request, Task $task) {

    $task->status = $request->status;
    $task->save();

    return redirect()->route('tasks.index');

})->name('tasks.status');





Route::post('/tasks/store', function (StoreTaskPost $request) {

    Task::create($request->all());

    return redirect()->route('tasks.index');
})->name('tasks.store');


Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('tasks.edit', [
        'task' => $task,
    ]);
})->name('tasks.edit');


Route::put('/tasks/update/{task}', function (StoreTaskPost $request, Task $task) {

    $task->fill($request->all());
    $task->save();

    return redirect()->route('tasks.index');

})->name('tasks.update');


Route::delete('/tasks/{task}/destroy', function (Task $task) {

    $task->delete();

    return redirect()->route('tasks.index');
})->name('tasks.destroy');



