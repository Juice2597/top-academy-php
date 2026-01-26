<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('posts')->group(function () {

    Route::get('/categories', [CategoryController::class, 'index'])->name('posts.categories.index');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('posts.categories.show');

    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/{post}', [PostController::class, 'show'])->whereNumber('id')->name('posts.show');

});


Route::prefix('admin')->group(function () {
    Route::get('/', AdminHomeController::class)->name('admin.index');
    Route::get('/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('admin.category.index');
});



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
