<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/tasks', 'TasksController@index')->name('tasks.index');
// Route::get('/tasks/create', 'TasksController@create')->name('tasks.create');
// Route::post('/tasks/store', 'TasksController@store')->name('tasks.store');
// Route::get('/tasks/{task}/edit', 'TasksController@edit')->name('tasks.edit');
// Route::put('/tasks/{task}', 'TasksController@update')->name('tasks.update');
// Route::delete('/tasks/{task}', 'TasksController@destroy')->name('tasks.destroy');

Route::resource('tasks', 'TasksController')->except(['show']);
