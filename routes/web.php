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

Route::get('/', [App\Http\Controllers\PostController::class, 'index'])
->name('welcome');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/home-save-img', [App\Http\Controllers\HomeController::class, 'saveImg'])
->name('saveImg');

Route::delete('/home-delete-img', [App\Http\Controllers\HomeController::class, 'deleteImg'])
->name('deleteImg');
Route::delete('/home-delete-user/{id}', [App\Http\Controllers\HomeController::class, 'deleteUser'])
->name('deleteUser');

Route::resource('post', App\Http\Controllers\PostController::class);

