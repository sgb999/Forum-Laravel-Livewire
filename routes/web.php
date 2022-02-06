<?php

use App\Http\Controllers\{
    Index,
    UserController,
    CategoryController,
    PostController,
    CommentController
};
use App\Http\Livewire\{
    ViewCategory
};
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
Route::controller(PostController::class)->group(function (){
    Route::get('/view-topics/{id}', 'viewTopics')->name('viewTopics');
    Route::get('/view-topics-ajax/{id}', 'viewTopicsAjax');
    Route::get('/view-profile-posts-ajax/{id}', 'getProfilePostsAjax');
    Route::get('/view-post/{post}', 'viewPost')->name('viewPost');
});
Route::get('/comment/view/{id}/{date}', [CommentController::class, 'getComments']);
Route::get('/profile/{user:username}', [UserController::class, 'userPage'])->name('profile');

Route::middleware(['auth'])->group(function(){
    Route::post('/comment/post', [CommentController::class, 'store'])->name('comment');
    Route::get('/log-out', [UserController::class, 'logOutMethod'])->name('logout');

    //Post routing
    Route::prefix('/post')->controller(PostController::class)->group(function () {
        Route::get('/', 'postPage')->name('post');
        Route::post('/store', 'store')->name('post.store');
        Route::get('/update/{post}', 'updatePostPage')->name('post.update');
        Route::put('/update/{post}', 'update')->name('post.update.request');
        Route::delete('/delete/{post}', 'destroy')->name('post.delete');
    });
});

Route::middleware(['guest'])->controller(UserController::class)->group(function(){
    Route::get('/login', 'loginPage')->name('loginPage');
    Route::post('/login-user', 'login')->name('login');
    Route::post('/register-user', 'register')->name('register');
    Route::get('/register', 'registerPage')->name('registerPage');
});
