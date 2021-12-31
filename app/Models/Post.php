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
    protected $with = ['category','author'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()    // this mean forgin key is author_id
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // public function user()   // this mean forgin key is user_id
    // {
    //     return $this->belongsTo(User::class);
    // }
}
