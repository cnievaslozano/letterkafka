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

    /**
     * Get the book lists that belong to this book.
     */
    public function bookLists()
    {
        return $this->belongsToMany(BookList::class, 'books_on_lists', 'book_id', 'list_id');
    }

    /**
     * Get the likes for the book.
     */
    public function likes()
    {
        return $this->hasMany(LikeBook::class);
    }

    /**
     * Get the reviews for the book.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the average rating for the book.
     */
    public function avgRating()
    {
        return $this->reviews->isEmpty() ? 'N/A' : $this->reviews->avg('rating');
    }
}