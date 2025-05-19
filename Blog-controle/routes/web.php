<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/', [PostController::class, 'index'])->name('home');

// Posts Routes
Route::resource('posts', PostController::class);

// Auth Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');


    Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::get('/dashboard', [PostController::class, 'dashboard'])->name('dashboard');
});


require __DIR__.'/auth.php';
