<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['user', 'userImage', 'username', 'createdAt', 'content', 'portada', 'likes', 'updated_at'];

}
