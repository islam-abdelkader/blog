<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class,'show'])->name('posts.show');

Route::resource('register', RegisterController::class);
Route::resource('login', LoginController::class);
Route::resource('/posts/{post}/comments', PostCommentsController::class);

Route::middleware(['admin'])->group(function () {
    Route::resource('admin/posts', AdminPostController::class, ['as'=> 'admin']);
});
Route::resource('newsletter', NewsLetterController::class);


