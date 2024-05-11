<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'description',
        'genre',
        'buy_links',
        'pages',
        'release_date',
        'cover',
    ];

    protected $casts = [
        'buy_links' => 'array',
        'release_date' => 'date',
    ];
}
