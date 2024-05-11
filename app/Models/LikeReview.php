<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeReview extends Model
{
    protected $table = 'likes_reviews';
    protected $fillable = [
        'review_id',
        'user_id',
        'like_date',
    ];

    protected $casts = [
        'like_date' => 'date',
    ];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
