<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomePostController;
use App\Http\Controllers\CategoryController;



/*
|--------------------------------------------------------------------------
| ROUTES FOR HOME
|--------------------------------------------------------------------------

*/

Route::get('/home', [HomePostController::class, 'index'])->name('home.index');

Route::get('/public/post/{id}', [HomePostController::class, 'view_post'])->name('home.post.view');

Route::get('/public/category/{id}', [HomePostController::class, 'view_category'])->name('home.category.view');




/*
|--------------------------------------------------------------------------
| ROUTE GROUP FOR AUTH MIDDLEWARE AND DASHBOARD
|--------------------------------------------------------------------------

*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/create-post', [PostsController::class, 'index'])->name('post.create');
    Route::post('/save-post', [PostsController::class, 'store'])->name('post.store');
    Route::get('/all-post', [PostsController::class, 'view_all'])->name('posts.all');
    Route::get('/users', [AdminController::class, 'get_users'])->name('users.get');

    Route::get('/post/{id}', [PostsController::class, 'show_post'])->name('show.post');
    Route::get('/post/{id}/delete', [PostsController::class, 'delete_post'])->name('delete.post');
    Route::get('/post/{id}/edit', [PostsController::class, 'edit_post'])->name('edit.post');
    Route::post('/post/{id}/update', [PostsController::class, 'update_post'])->name('post.update');
    Route::post('/post/{post}/comment', [CommentController::class, 'store'])->name('comment.store');
    
    Route::get('/user/{id}', [AdminController::class, 'show_user'])->name('show.user');
    Route::get('/user/{id}/profile', [AdminController::class, 'profile_view'])->name('profile.settings');
    Route::get('/user/{id}/profile/edit', [AdminController::class, 'profile_edit'])->name('profile.edit');
    Route::get('/user/{id}/edit', [AdminController::class, 'edit_user'])->name('edit.user');
    Route::get('/user/{id}/delete', [AdminController::class, 'delete_user'])->name('delete.user');
    Route::post('/user/{id}/update', [AdminController::class, 'update_user'])->name('users.update');
    Route::post('/user/{id}/profile/update', [AdminController::class, 'update_profile'])->name('profile.update');

    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/categories', [CategoryController::class, 'create'])->name('category.create');

    });









require __DIR__.'/auth.php';
