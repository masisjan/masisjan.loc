<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [ 'image', 'title', 'text', 'short_text', 'post_url', 'images', 'text_video', 'word', 'publish', 'user_id', 'count' ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_posts');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
