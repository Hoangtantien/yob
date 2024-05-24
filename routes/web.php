<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
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
Route::get('/user/create', [App\Http\Controllers\UserController::class, 'showCreate'])->name('user.create');
Route::post('/user/create/store', [App\Http\Controllers\UserController::class, 'createStore'])->name('user.create.store');
Route::get('/user/update/{id}', [App\Http\Controllers\UserController::class, 'showUpdate'])->name('user.update');
Route::post('/user/update/store/{id}', [App\Http\Controllers\UserController::class, 'updateStore'])->name('user.update.store');
Route::get('/user/list/', [App\Http\Controllers\UserController::class, 'showList'])->name('user.list');
Route::delete('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');


