<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected function validatePost(?Post $post = null): array
    {
        $post??=new Post();
        return request()->validate([
            'title' => 'required|min:3|max:255',
            'thumbnail' => $post->exists ? 'image' : 'required|image',
            'excerpt' => 'required|min:5',
            'body' => 'required|min:5',
            'category_id' => 'required|exists:categories,id',
        ]);
    }

    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50),
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {

        Post::create(array_merge($this->validatePost(), [
            'user_id' => auth()->id(),
            'thumbnail' => request()->file('thumbnail')->store('thumbnails'),
        ]));

        return redirect(route('home'));
        // request()->user()->posts()->create(array_merge($this->validatePost(), [
        //     'thumbnail' => request()->file('thumbnail')->store('thumbnails'),
        // ]));
    }

    public function show($id)
    {
        //
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);
        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post Deleted!');
    }
}
