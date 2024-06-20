<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassController;
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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// user
Route::get('/user/create', [App\Http\Controllers\UserController::class, 'showCreate'])->name('user.create');
Route::post('/user/create/store', [App\Http\Controllers\UserController::class, 'createStore'])->name('user.create.store');
Route::get('/user/update/{id}', [App\Http\Controllers\UserController::class, 'showUpdate'])->name('user.update');
Route::post('/user/update/store/{id}', [App\Http\Controllers\UserController::class, 'updateStore'])->name('user.update.store');
Route::get('/user/list/', [App\Http\Controllers\UserController::class, 'showList'])->name('user.list');
Route::delete('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

// classes
Route::get('/class/create',[App\Http\Controllers\ClassController::class, 'showCreate'])->name('class.create');
Route::post('/class/create/store', [App\Http\Controllers\ClassController::class, 'createStore'])->name('class.create.store');
Route::get('/class/list',[App\Http\Controllers\ClassController::class, 'showList'])->name('class.list');
Route::delete('/class/delete/{id}', [App\Http\Controllers\ClassController::class, 'delete'])->name('class.delete');
Route::get('/class/update/{id}', [App\Http\Controllers\ClassController::class, 'showUpdate'])->name('class.update');
Route::post('/class/update/store/{id}', [App\Http\Controllers\ClassController::class, 'updateStore'])->name('class.update.store');


Route::get('manage/class/list',[App\Http\Controllers\ClassController::class, 'showListManage'])->name('manage.class.list-all');

//courts
Route::get('/court/create',[App\Http\Controllers\CourtController::class, 'showCreate'])->name('court.create');
Route::post('/court/create/store', [App\Http\Controllers\CourtController::class, 'createStore'])->name('court.create.store');
Route::get('/court/list',[App\Http\Controllers\CourtController::class, 'showList'])->name('court.list');
Route::delete('/court/delete/{id}', [App\Http\Controllers\CourtController::class, 'delete'])->name('court.delete');
Route::get('/court/update/{id}', [App\Http\Controllers\CourtController::class, 'showUpdate'])->name('court.update');
Route::post('/court/update/store/{id}', [App\Http\Controllers\CourtController::class, 'updateStore'])->name('court.update.store');



// Short session

Route::get('/short-session/create',[App\Http\Controllers\ShortSessionController::class, 'showCreate'])->name('short-session.create');
Route::post('/short-session/create/store', [App\Http\Controllers\ShortSessionController::class, 'createStore'])->name('short-session.create.store');
Route::get('/short-session/list',[App\Http\Controllers\ShortSessionController::class, 'showList'])->name('short-session.list');
Route::delete('/short-session/delete/{id}', [App\Http\Controllers\ShortSessionController::class, 'delete'])->name('short-session.delete');
Route::get('/short-session/update/{id}', [App\Http\Controllers\ShortSessionController::class, 'showUpdate'])->name('short-session.update');
Route::post('/short-session/update/store/{id}', [App\Http\Controllers\ShortSessionController::class, 'updateStore'])->name('short-session.update.store');


// classes
Route::get('/students/create',[App\Http\Controllers\StudentController::class, 'showCreate'])->name('students.create');
Route::post('/students/create/store', [App\Http\Controllers\StudentController::class, 'createStore'])->name('students.create.store');
Route::get('/students/list',[App\Http\Controllers\StudentController::class, 'showList'])->name('students.list');
Route::delete('/students/delete/{id}', [App\Http\Controllers\StudentController::class, 'delete'])->name('students.delete');
Route::get('/students/update/{id}', [App\Http\Controllers\StudentController::class, 'showUpdate'])->name('students.update');
Route::post('/students/update/store/{id}', [App\Http\Controllers\StudentController::class, 'updateStore'])->name('students.update.store');
