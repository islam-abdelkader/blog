<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Post
{
    public static function find($slug)
    {
        abort_if(! file_exists($path = resource_path("posts/{$slug}.html")),404);
        return cache()->remember("posts.{$slug}", now()->addMinutes(2), fn()=> file_get_contents($path));
    }
    public static function all()
    {
        $files = File::files(resource_path("posts"));

        return array_map(fn($file) => $file->getContents() ,$files);
    }
}
