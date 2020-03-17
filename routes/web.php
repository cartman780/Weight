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

Route::middleware('auth')->group(function () {

    // user
    Route::get('/dashboard', 'UserController@index')->name('index');
    Route::get('/user/{user}', 'UserController@show')->name('show');
    
    // challange
    Route::post('/dashboard', 'ChallangeController@store')->name('store'); 
    Route::get('/create', 'ChallangeController@create')->name('create');
    // Route::put('/{challange}/update', 'ChallangeController@create')->name('update');
    // Route::get('/{challange}/destroy', 'ChallangeController@destroy')->name('destroy');

    // weight
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');