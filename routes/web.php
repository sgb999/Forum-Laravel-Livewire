<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Index;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
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

Route::view('/', 'general.pages.home', ['page_title' => 'Assassin\'s Creed Forum - Home'])->name('home');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/view-topics/{id}', function (int $id) {
    return view('general.pages.view-topics', ['id' => $id, 'page_title' => 'Assassin\'s creed Forum - Post']);
})->name('viewTopics');
Route::get('/view-post/{post}', function (Post $post) {
        return view('general.pages.view-post', ['post' => $post, 'page_title' => 'Assassin\'s creed Forum - Post']);
    })->name('viewPost');
Route::get('/profile/{user:username}', [UserController::class, 'userPage'])->name('profile');


Route::middleware(['auth'])->group(function () {
    Route::get('/log-out', [UserController::class, 'logOutMethod'])->name('logout');

    //Post routing
    Route::prefix('/post')->group(function() {
        Route::view('/', 'general.pages.post', ['page_title' => 'Assassin\'s Creed - Make a Post'])->name('post');
        Route::controller(PostController::class)->group(function () {
            Route::get('/update/{post}', 'updatePostPage')->name('post.update');
            Route::delete('/delete/{post}', 'destroy')->name('post.delete');
        });
    });
    Route::prefix('/profile')->controller(UserController::class)->group(function () {
        Route::get('/update/{user:username}', 'updateProfilePage')->name('profile.update');
    });
});

Route::middleware(['guest'])->controller(UserController::class)->group(function () {
    Route::view('/login', 'general.pages.login', ['page_title' => 'Assassin\'s Creed Forum - Login'])->name('loginPage');
    Route::view('/register', 'general.pages.register', ['page_title' => 'Assassin\'s Creed Forum - Create an Account'])->name('registerPage');
});
