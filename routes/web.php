<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\DB;
// use Symfony\Component\Routing\Route;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/tasks', function () {
//     $tasks = DB::table('tasks') -> get();
//     return view('hello', compact('tasks'));
// });

// Route::get('/tasks/{task}', function ($id) {
//     $task = DB::table('tasks') -> find($id);
//     dd($task);
//     return view('hello', compact('tasks'));
// });

Route::get('/', 'pagination@users');
Route::get('/create', 'users@create');
Route::get('/edit/{user}', 'users@edit');
Route::post('/save/{user}', 'users@save');
Route::delete('/users/{user}', 'users@delete');
Route::get('/registration', 'registration@show');
Route::post('/savereg', 'registration@save');
