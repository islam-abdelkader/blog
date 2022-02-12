<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {

        $this->middleware('admin')->only(['create', 'store']);

    }

    public function index()
    {
        return view('posts.index', [
            'posts' =>
            Post::latest()
                ->filter(request(['search', 'category', 'author']))
                ->paginate(6)
                ->withQueryString(),
        ]);
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {

        $attributes = request()->validate([
            'title' => 'required|min:3|max:255',
            'thumbnail' => 'required|image',
            'excerpt' => 'required|min:5',
            'body' => 'required|min:5',
            'category_id' => 'required|exists:categories,id',
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect(route('home'));
    }
}
