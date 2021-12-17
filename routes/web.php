<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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


// GET ROUTES

// Welcome page
Route::get('/', [PostController::class, 'index'])->name('welcome');

// User homepage
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Single post by logged User (owner)
Route::get('/home-show-single-post/{id}', [HomeController::class, 'showSingleUserPost'])->name('singleUserPost');

// Edit user profile
Route::get('/edit-user-profile', [HomeController::class, 'editUserProfile'])->name('editUserProfile');



// POST ROUTES

// Add user image
Route::post('/home-save-img', [HomeController::class, 'saveImg'])->name('saveImg');

// Create comment on post by logged user
Route::post('/comment/{id}', [CommentController::class, 'createComment'])->name('createComment');


// DELETE ROUTES

// Delete comment by post owner or comment owner
Route::delete('/comment-delete/{id}', [CommentController::class, 'destroy'])->name('commentDelete');

// Delete image on user profile
Route::delete('/home-delete-img', [HomeController::class, 'deleteImg'])->name('deleteImg');

// Delete user profile by user
Route::delete('/home-delete-user/{id}', [HomeController::class, 'deleteUser'])->name('deleteUser');


// RESOURCEFUL ROUTE
Route::resource('post', PostController::class);

