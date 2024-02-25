<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Index;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', [index::class, 'home'])->name('home');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::controller(PostController::class)->group(function () {
    Route::get('/view-topics/{id}', 'viewTopics')->name('viewTopics');
    Route::get('/view-post/{post}', 'viewPost')->name('viewPost');
});
Route::prefix('/profile')->controller(UserController::class)->group(function () {
    Route::get('/{user:username}', 'userPage')->name('profile');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/log-out', [UserController::class, 'logOutMethod'])->name('logout');

    //Post routing
    Route::prefix('/post')->controller(PostController::class)->group(function () {
        Route::get('/', 'postPage')->name('post');
        Route::get('/update/{post}', 'updatePostPage')->name('post.update');
        Route::delete('/delete/{post}', 'destroy')->name('post.delete');
    });
    Route::prefix('/profile')->controller(UserController::class)->group(function () {
        Route::get('/update/{user:username}', 'updateProfilePage')->name('profile.update');
    });
});

Route::middleware(['guest'])->controller(UserController::class)->group(function () {
    Route::get('/login', 'loginPage')->name('loginPage');
    Route::get('/register', 'registerPage')->name('registerPage');
});
