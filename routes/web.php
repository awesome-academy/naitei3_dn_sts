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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//supervisor controller
Route::group(['prefix' => 'admin'], function () {
    Route::view('/', 'admin.layouts.app')
    ->name('admin')
    ->middleware('admin');

    Route::middleware('admin')->resource('courses', 'Admin\CourseController')->only([
        'index',
    ])->names([
        'index' => 'admin.courses.index',
    ]);
});

//trainee controller
