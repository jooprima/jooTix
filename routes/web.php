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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\Dashboard\DashboardController@index')->name('dashboard');

    Route::get('/dashboard/movies', 'App\Http\Controllers\Dashboard\MovieController@index')->name('dashboard.movies');

    Route::get('/dashboard/theaters', 'App\Http\Controllers\Dashboard\TheaterController@index')->name('dashboard.theaters');

    Route::get('/dashboard/tickets', 'App\Http\Controllers\Dashboard\TicketController@index')->name('dashboard.tickets');
    
    //users
    Route::get('/dashboard/users', 'App\Http\Controllers\Dashboard\UserController@index')->name('dashboard.users');
    Route::get('/dashboard/users/{id}', 'App\Http\Controllers\Dashboard\UserController@edit')->name('dashboard.users.edit');
    Route::put('/dashboard/users/{id}', 'App\Http\Controllers\Dashboard\UserController@update')->name('dashboard.users.update');
    Route::delete('/dashboard/users/{id}', 'App\Http\Controllers\Dashboard\UserController@destroy')->name('dashboard.users.delete');
});
