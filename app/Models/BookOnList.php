<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookOnList extends Model
{
    protected $table = 'books_on_lists';
    protected $fillable = [
        'book_id',
        'list_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function list()
    {
        return $this->belongsTo(BookList::class);
    }
}
