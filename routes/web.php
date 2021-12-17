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


// GET ROUTES

// User homepage
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Single post by logged User (owner)
Route::get('/home-show-single-post/{id}', [App\Http\Controllers\HomeController::class, 'showSingleUserPost'])
->name('singleUserPost');
// Single post view from main page
Route::get('/single-post/{id}', [App\Http\Controllers\PostController::class, 'show'])
->name('singlePostView');
// Edit post by user (owner)
Route::get('/edit-post/{id}', [App\Http\Controllers\PostController::class, 'edit'])
->name('editPost');
// Edit user profile
Route::get('/edit-user-profile', [App\Http\Controllers\HomeController::class, 'editUserProfile'])
->name('editUserProfile');



// POST ROUTES

// Save edited post by user (owner)
Route::post('/save-edited-post/{id}', [App\Http\Controllers\PostController::class, 'update'])
->name('saveEditedPost');
// Save image on user profile
Route::post('/home-save-img', [App\Http\Controllers\HomeController::class, 'saveImg'])
->name('saveImg');
// Create comment on post by logged user
Route::post('/comment/{id}', [App\Http\Controllers\CommentController::class, 'createComment'])
->name('createComment');


// DELETE ROUTES

// Delete comment by post owner or comment owner
Route::delete('/comment-delete/{id}', [App\Http\Controllers\CommentController::class, 'destroy'])
->name('commentDelete');
// Delete image on user profile
Route::delete('/home-delete-img', [App\Http\Controllers\HomeController::class, 'deleteImg'])
->name('deleteImg');
// Delete user profile by user
Route::delete('/home-delete-user/{id}', [App\Http\Controllers\HomeController::class, 'deleteUser'])
->name('deleteUser');
// Delete post by user, post owner
Route::delete('/post-delete/{id}', [App\Http\Controllers\PostController::class, 'destroy'])
->name('deletePost');

// RESOURCEFUL ROUTES
Route::resource('post', App\Http\Controllers\PostController::class);

