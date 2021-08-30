<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    /**
     * Get the user that is an author.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all the articles for the author.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

}
