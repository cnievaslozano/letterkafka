<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_first_name',
        'author_last_name',
        'review_name',
        'review_body',
        'external_id',
        'book_id',
        'title',
        'pages',
        'genres',
        'rating',
        'plot',
        'cover',
        'url',
    ];
}