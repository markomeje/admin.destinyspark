<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * Get the payments for the book.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
