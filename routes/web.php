<?php

use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'ConfirmController@confirm');

    Route::resource('users', 'UserController');
    Route::resource('customers', 'CustomerController');
    Route::get('cars/{id}/set-status', 'CarController@setStatus')
                ->name('cars.status');
    Route::resource('cars', 'CarController');
    
});
