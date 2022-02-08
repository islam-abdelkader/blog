<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];    // every thing is fillable except id

    /*
    *   with(['category','author'])
    *   or ->load(['category','author'])
    *   we can use protected $with instead of
    *
    *   every post include its category and its author info
    *
    *   use without('author') to ignore author
    *   or without(['category','author']) to ignore category and author
    */
    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where(fn ($query) =>
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('excerpt', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%'))
        );
        $query->when($filters['category'] ?? false, fn ($query, $category) =>
        $query
            ->whereHas('category', fn ($query) =>
            $query->whereSlug($category)));

        $query->when($filters['author'] ?? false, fn ($query, $author) =>
        $query
            ->whereHas('author', fn ($query) =>
            $query->where('user_name', $author)));
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()    // this mean forgin key is author_id
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
