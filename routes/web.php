<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomePostController;

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



// Route::get('/', function () {
//     return view('home.welcome');
// });
Route::get('/', [HomePostController::class, 'index'])->name('home.index');

Route::get('/post', [HomePostController::class, 'view_post'])->name('view.post');




/*
|--------------------------------------------------------------------------
| ROUTE GROUP FOR AUTH MIDDLEWARE
|--------------------------------------------------------------------------

*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
    Route::get('/create-post', [PostsController::class, 'index'])->middleware(['auth'])->name('post.create');
    Route::post('/save-post', [PostsController::class, 'store'])->middleware(['auth'])->name('post.store');
    Route::get('/all-post', [PostsController::class, 'view_all'])->middleware(['auth'])->name('posts.all');
    Route::get('/users', [AdminController::class, 'get_users'])->middleware(['auth'])->name('users.get');
    Route::get('/post/{id}', [PostsController::class, 'show_post'])->middleware(['auth'])->name('show.post');
    Route::get('/post/{id}/delete', [PostsController::class, 'delete_post'])->middleware(['auth'])->name('delete.post');
    Route::get('/post/{id}/edit', [PostsController::class, 'edit_post'])->middleware(['auth'])->name('edit.post');
    Route::post('/post/{id}/update', [PostsController::class, 'update_post'])->middleware(['auth'])->name('post.update');
    Route::post('/post/{post}/comment', [CommentController::class, 'store'])->middleware(['auth'])->name('comment.store');
    Route::get('/user/{id}', [AdminController::class, 'show_user'])->middleware(['auth'])->name('show.user');
    Route::get('/user/{id}/profile', [AdminController::class, 'profile_view'])->middleware(['auth'])->name('profile.settings');
    Route::get('/user/{id}/profile/edit', [AdminController::class, 'profile_edit'])->middleware(['auth'])->name('profile.edit');
    Route::get('/user/{id}/edit', [AdminController::class, 'edit_user'])->middleware(['auth'])->name('edit.user');
    Route::get('/user/{id}/delete', [AdminController::class, 'delete_user'])->middleware(['auth'])->name('delete.user');
    Route::post('/user/{id}/update', [AdminController::class, 'update_user'])->middleware(['auth'])->name('users.update');
    Route::post('/user/{id}/profile/update', [AdminController::class, 'update_profile'])->middleware(['auth'])->name('profile.update');

    });









require __DIR__.'/auth.php';
