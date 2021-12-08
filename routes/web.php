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
Route::get('/home-show-single-post/{id}', [App\Http\Controllers\HomeController::class, 'showSingleUserPost'])
->name('singleUserPost');
Route::get('/single-post/{id}', [App\Http\Controllers\PostController::class, 'show'])
->name('singlePostView');
Route::get('/edit-post/{id}', [App\Http\Controllers\PostController::class, 'edit'])
->name('editPost');
Route::get('/edit-user-profile', [App\Http\Controllers\HomeController::class, 'editUserProfile'])
->name('editUserProfile');




Route::post('/save-edited-post/{id}', [App\Http\Controllers\PostController::class, 'update'])
->name('saveEditedPost');
Route::post('/home-save-img', [App\Http\Controllers\HomeController::class, 'saveImg'])
->name('saveImg');
Route::post('/comment/{id}', [App\Http\Controllers\CommentController::class, 'createComment'])
->name('createComment');

Route::delete('/comment-delete/{id}', [App\Http\Controllers\CommentController::class, 'destroy'])
->name('commentDelete');
Route::delete('/home-delete-img', [App\Http\Controllers\HomeController::class, 'deleteImg'])
->name('deleteImg');
Route::delete('/home-delete-user/{id}', [App\Http\Controllers\HomeController::class, 'deleteUser'])
->name('deleteUser');
Route::delete('/post-delete/{id}', [App\Http\Controllers\PostController::class, 'destroy'])
->name('deletePost');

Route::resource('post', App\Http\Controllers\PostController::class);

