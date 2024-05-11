<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = [
        'book_id',
        'user_id',
        'review',
        'rating',
        'creation_date',
    ];

    protected $casts = [
        'review' => 'array', // Ajusta el casting del campo 'review' a array
        'creation_date' => 'date',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function likes()
    {
        return $this->hasMany(LikeReview::class, 'review_id');
    }

    public function likesCount()
    {
        return $this->likes()->count();
    }
}
