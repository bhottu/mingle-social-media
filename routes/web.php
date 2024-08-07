<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;


Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

//Route::get('profile/{user}', [ProfileController::class, 'show'])->name('profile')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('profile/{user}', [ProfileController::class, 'show'])->name('profile');
    Route::get('settings/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');
});



Route::get('post/create', [PostController::class, 'create'])->name('post.create')->middleware('auth');
Route::post('post', [PostController::class, 'store'])->name('post.store');
Route::post('follow/{user}', [FollowController::class, 'store'])->name('follow');
Route::delete('unfollow/{user}', [FollowController::class, 'destroy'])->name('unfollow');

Route::post('post/{postId}/like', [LikeController::class, 'addLike'])->name('post.like');
Route::post('post/{post}/share', [PostController::class, 'addShare'])->name('post.share');
Route::post('post/{post}/comment', [PostController::class, 'addComment'])->name('post.comment');

Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit')->middleware('auth');
Route::put('post/{post}', [PostController::class, 'update'])->name('post.update')->middleware('auth');
Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.destroy')->middleware('auth');
Route::delete('/profile/posts/{share}', [PostController::class, 'sharedestroy'])->name('profile.posts.destroy')->middleware('auth');

Route::get('comments/{postId}', [PostController::class, 'fetchComments'])->name('comments.fetch');