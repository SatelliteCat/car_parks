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

use Illuminate\Support\Facades\Route;

Route::get('/', 'home@show');
Route::get('/create', 'users@create');
Route::get('/edit/{user}', 'users@edit');
Route::post('/save/{user}', 'users@save');
Route::delete('/users/{user}', 'users@delete');
Route::get('/carpark', 'carpark@show');
Route::post('/savestatus', 'carpark@save');
