<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', 'App\Http\Controllers\Dashboard\DashboardController@index');

//users
Route::get('/dashboard/users', 'App\Http\Controllers\Dashboard\UserController@index');
Route::get('/dashboard/user/edit/{id}', 'App\Http\Controllers\Dashboard\UserController@edit');
Route::post('/dashboard/user/update/{id}', 'App\Http\Controllers\Dashboard\UserController@update');
