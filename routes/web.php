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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();;
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth', 'role:ROLE_ADMIN'], 'prefix' => 'admin'], function () {
    Route::get('index', 'App\Http\Controllers\AdminController@index');
});
Route::group(['middleware' => ['auth', 'role:ROLE_MENTOR'], 'prefix' => 'mentor'], function () {
    Route::get('index', 'App\Http\Controllers\MentorController@index')->name('index');
    Route::get('/show/{id}', 'App\Http\Controllers\MentorController@show')->name('mentor.show');
});
Route::group(['middleware' => ['auth', 'role:ROLE_STUDENT'], 'prefix' => 'student'], function() {
    Route::get('index', 'App\Http\Controllers\StudentController@index');
});
