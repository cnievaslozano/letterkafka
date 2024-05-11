<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $table = 'followers';
    protected $fillable = [
        'following_user_id',
        'followed_user_id',
        'follow_date',
    ];

    protected $casts = [
        'follow_date' => 'date',
    ];

    public function followingUser()
    {
        return $this->belongsTo(User::class, 'following_user_id');
    }

    public function followedUser()
    {
        return $this->belongsTo(User::class, 'followed_user_id');
    }
}
