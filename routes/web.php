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

Route::get('profile/{user}', [ProfileController::class, 'show'])->name('profile')->middleware('auth');
Route::get('post/create', [PostController::class, 'create'])->name('post.create')->middleware('auth');
Route::post('post', [PostController::class, 'store'])->name('post.store');
Route::post('follow/{user}', [FollowController::class, 'store'])->name('follow');
Route::delete('unfollow/{user}', [FollowController::class, 'destroy'])->name('unfollow');

Route::post('post/{postId}/like', [LikeController::class, 'addLike'])->name('post.like');
Route::post('post/{post}/share', [PostController::class, 'addShare'])->name('post.share');
Route::post('post/{post}/comment', [PostController::class, 'addComment'])->name('post.comment');

//Route::get('/profile/{user}/shares', 'App\Http\Controllers\ProfileController@shares')->name('profile.shares');
//Route::get('/profile/{user}/shares', [ProfileController::class, 'shares'])->name('profile.shares');


