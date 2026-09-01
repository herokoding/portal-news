<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/auth', [AdminController::class, 'auth'])->name('auth');
    Route::get('/register', [AdminController::class, 'registration'])->name('registration');
    Route::post('/store', [AdminController::class, 'store'])->name('store');
    Route::post('/auth', [AdminController::class, 'authenticate']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('menu.access:dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::get('/dashboard/profile', [AdminController::class, 'profile'])->name('profile')->middleware('menu.access:profile');

    Route::prefix('/dashboard/posts')->middleware('menu.access:posts')->group(function () {
        Route::get('/', [AdminController::class, 'indexPosts'])->name('posts.index');
        Route::get('/show/{post:slug}', [AdminController::class, 'showPosts'])->name('posts.show');
        Route::get('/create', [AdminController::class, 'createPosts'])->name('posts.create');
        Route::get('/checkSlug', [AdminController::class, 'checkSlug'])->name('posts.checkSlug');
        Route::post('/storePost', [AdminController::class, 'storePost']);
        Route::post('/uploadImage', [AdminController::class, 'uploadImage']);
        Route::delete('/deletePost/{post:slug}', [AdminController::class, 'deletePost']);
        Route::get('/editPost/{post:slug}', [AdminController::class, 'editPost'])->name('posts.edit');
        Route::put('/updatePost/{post:slug}', [AdminController::class, 'updatePost'])->name('posts.update');
    });

    Route::prefix('/dashboard/categories')->middleware('menu.access:categories')->group(function () {
        Route::get('/', [AdminController::class, 'indexCategories'])->name('categories.index');
        Route::get('/create', [AdminController::class, 'createCategories'])->name('categories.create');
        Route::get('/checkSlugCategory', [AdminController::class, 'checkSlugCategory'])->name('categories.checkSlug');
        Route::post('/storeCategory', [AdminController::class, 'storeCategory']);
    });

    Route::prefix('/dashboard/users')->middleware('menu.access:users')->group(function () {
        Route::get('/', [AdminController::class, 'indexUsers'])->name('users.index');
        Route::get('/create', [AdminController::class, 'createUsers'])->name('users.create');
        Route::post('/storeUser', [AdminController::class, 'storeUser']);
        Route::get('/editUser/{user:id}', [AdminController::class, 'editUser'])->name('users.edit');
        Route::put('/updateUser/{user:id}', [AdminController::class, 'updateUser'])->name('users.update');
        Route::delete('/deleteUser/{user:id}', [AdminController::class, 'deleteUser']);
    });

    Route::prefix('/dashboard/settings')->middleware('menu.access:settings')->group(function () {
        Route::get('/', [AdminController::class, 'indexSettings'])->name('settings.index');
        Route::post('/update', [AdminController::class, 'updateSettings']);
    });
});

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/archive', [HomeController::class, 'archive'])->name('archive');

Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post.show');
Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');
