<?php

use App\Subject;
use App\Http\Middleware\Admin;
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

    Route::middleware('admin')
    ->post('courses/update_status', 'Admin\CourseController@updateStatus')
    ->name('admin.courses.update_status');

    Route::middleware('admin')->resource('courses', 'Admin\CourseController')->only([
        'index',
        'store',
        'create',
        'show',
        'update',
    ])->names([
        'index' => 'admin.courses.index',
        'store' => 'admin.courses.store',
        'create' => 'admin.courses.create',
        'show' => 'admin.courses.show',
        'update' => 'admin.courses.update',
    ]);

    Route::middleware('admin')->resource('subjects', 'Admin\SubjectController')->names([
        'index' => 'admin.subject.index',
        'create' => 'admin.subject.create',
        'store' => 'admin.subject.store',
        'show' => 'admin.subject.show',
        'edit' => 'admin.subject.edit',
        'update' => 'admin.subject.update',
        'destroy' => 'admin.subject.destroy',
    ]);

});

//trainee controller
