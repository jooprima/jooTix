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

    
    Route::get('/dashboard/theaters', 'App\Http\Controllers\Dashboard\TheaterController@index')->name('dashboard.theaters');
    
    Route::get('/dashboard/tickets', 'App\Http\Controllers\Dashboard\TicketController@index')->name('dashboard.tickets');
    
    //movies
    Route::get('/dashboard/movies', 'App\Http\Controllers\Dashboard\MovieController@index')->name('dashboard.movies');
    Route::get('/dashboard/movies/create', 'App\Http\Controllers\Dashboard\MovieController@create')->name('dashboard.movies.create');
    Route::post('/dashboard/movies', 'App\Http\Controllers\Dashboard\MovieController@store')->name('dashboard.movies.store');
    Route::get('/dashboard/movies/{movie}', 'App\Http\Controllers\Dashboard\MovieController@edit')->name('dashboard.movies.edit');
    Route::put('/dashboard/movies/{movie}', 'App\Http\Controllers\Dashboard\MovieController@update')->name('dashboard.movies.update');
    Route::delete('/dashboard/movies/{movie}', 'App\Http\Controllers\Dashboard\MovieController@destroy')->name('dashboard.movies.delete');

    //theaters
    Route::get('/dashboard/theaters', 'App\Http\Controllers\Dashboard\TheaterController@index')->name('dashboard.theaters');
    Route::get('/dashboard/theaters/create', 'App\Http\Controllers\Dashboard\TheaterController@create')->name('dashboard.theaters.create');
    Route::post('/dashboard/theaters', 'App\Http\Controllers\Dashboard\TheaterController@store')->name('dashboard.theaters.store');
    Route::get('/dashboard/theaters/{theater}', 'App\Http\Controllers\Dashboard\TheaterController@edit')->name('dashboard.theaters.edit');
    Route::put('/dashboard/theaters/{theater}', 'App\Http\Controllers\Dashboard\TheaterController@update')->name('dashboard.theaters.update');
    Route::delete('/dashboard/theaters/{theater}', 'App\Http\Controllers\Dashboard\TheaterController@destroy')->name('dashboard.theaters.delete');

    //arrange movie
    Route::get('/dashboard/theaters/arrange/movies/{theater}', 'App\Http\Controllers\Dashboard\ArrangeMovieController@index')->name('dashboard.theaters.arrange.movie');
    Route::get('/dashboard/theaters/arrange/movies/create/{theater}', 'App\Http\Controllers\Dashboard\ArrangeMovieController@create')->name('dashboard.theaters.arrange.movie.create');
    Route::post('/dashboard/theaters/arrange/movies', 'App\Http\Controllers\Dashboard\ArrangeMovieController@store')->name('dashboard.theaters.arrange.movie.store');
    Route::get('/dashboard/theaters/arrange/movies/{arrangeMovie}', 'App\Http\Controllers\Dashboard\ArrangeMovieController@edit')->name('dashboard.theaters.arrange.movie.edit');
    Route::put('/dashboard/theaters/arrange/movies/{arrangeMovie}', 'App\Http\Controllers\Dashboard\ArrangeMovieController@update')->name('dashboard.theaters.arrange.movie.update');
    Route::delete('/dashboard/theaters/arrange/movies/{arrangeMovie}', 'App\Http\Controllers\Dashboard\ArrangeMovieController@destroy')->name('dashboard.theaters.arrange.movie.delete');

    //users
    Route::get('/dashboard/users', 'App\Http\Controllers\Dashboard\UserController@index')->name('dashboard.users');
    Route::get('/dashboard/users/{id}', 'App\Http\Controllers\Dashboard\UserController@edit')->name('dashboard.users.edit');
    Route::put('/dashboard/users/{id}', 'App\Http\Controllers\Dashboard\UserController@update')->name('dashboard.users.update');
    Route::delete('/dashboard/users/{id}', 'App\Http\Controllers\Dashboard\UserController@destroy')->name('dashboard.users.delete');
});
