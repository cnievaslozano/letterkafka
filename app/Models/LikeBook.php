<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeBook extends Model
{
    protected $table = 'likes_books';
    protected $fillable = [
        'book_id',
        'user_id',
        'like_date',
    ];

    protected $casts = [
        'like_date' => 'date',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
