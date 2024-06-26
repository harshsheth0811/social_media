<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('auth/google', [LoginController::class, 'googlelogincallback'])->name('googlelogin');
    Route::get('auth/google/callback', [LoginController::class, 'googlelogin']);
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('loginuser');

    Route::get('/signup', [SignupController::class, 'index'])->name('signup');
    Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [WelcomeController::class, 'index'])->name('home');
    Route::post('/post', [WelcomeController::class, 'store'])->name('home.store');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update/{id}', [ProfileController::class, 'upd_profile'])->name('profile.update');
    Route::post('/profile/{id}', [ProfileController::class, 'update'])->name('post.update');
    Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('post.delete');
    
    Route::post('/like', [LikesController::class, 'like'])->name('like');
    Route::post('/unlike', [LikesController::class, 'unlike'])->name('unlike');

    Route::get('/comments/{postId}', [CommentsController::class, 'index'])->name('comments.index');
    Route::post('/comments', [CommentsController::class, 'store'])->name('comments.store');

    Route::get('/friends', [FriendsController::class, 'index'])->name('friends');
    Route::post('/friends/store', [FriendsController::class, 'store'])->name('friends.store');
    Route::delete('/friends/{id}', [FriendsController::class, 'destroy'])->name('friends.destroy');

    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
