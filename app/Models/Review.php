<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = [
        'book_id',
        'user_id',
        'content',
        'rating',
        'creation_date',
    ];

    protected $dates = [
        'creation_date',
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

    public function formatearFechaCreacion()
    {
        return Carbon::parse($this->attributes['creation_date'])->format('d-m-Y');
    }
}
