<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/{id}', 'show')->whereNumber('id')->name('posts.show');
});

//Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
//Route::get('/posts/{id}', [PostController::class, 'show'])->whereNumber('id')->name('posts.show');


//Route::get('/admin', IndexController::class)->name('admin.index');
//Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');

Route::prefix('admin')->group(function () {
    Route::get('/', IndexController::class)->name('admin.index');
    Route::get('/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
});
