<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $table = 'contact_messages';

    protected $fillable = [
        'user_id',
        'email',
        'subject',
        'message',
        'contact_form_date'
    ];

    // Define the relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formatearFechaCreacion()
    {
        return Carbon::parse($this->attributes['contact_form_date'])->format('d-m-Y');
    }
}
