<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookList extends Model
{
    protected $table = 'booklists';
    protected $fillable = ['user_id', 'list_name', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'books_on_lists', 'list_id', 'book_id');
    }
}
