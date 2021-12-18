<?php

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

Route::get('/', function () {
    return view('posts',[
        'posts' => Post::all()
    ]);
});
/*
Route::get('posts/{post}', function ($slug) {
    $path = __DIR__."/../resources/posts/{$slug}.html";

    abort_if(! file_exists($path),40
    $post = cache()->remember("posts.{$slug}", now()->addMinutes(2), function () use ($path) {
        var_dump('file_get_content');
        return file_get_contents($path);
    });
    return view('post',[
        'post' =>  $post
    ]);
})->where('post','[A-z_\-]+');
*/
Route::get('posts/{post}', function ($slug) {
    return view('post',['post' =>  Post::find($slug)]);
})->where('post','[A-z_\-]+');
