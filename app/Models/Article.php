<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'image', 'category'
    ];

    /**
     * Get the author for the article.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Get the category for the article.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all the comments for the article.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
