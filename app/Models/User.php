<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the book lists owned by the user.
     */
    public function bookLists()
    {
        return $this->hasMany(BookList::class);
    }

    /**
     * Get the followers of the user.
     */
    public function followers()
    {
        return $this->hasMany(Follower::class, 'followed_user_id');
    }

    /**
     * Get the users being followed by this user.
     */
    public function following()
    {
        return $this->hasMany(Follower::class, 'following_user_id');
    }

    /**
     * Get the liked books by the user.
     */
    public function likedBooks()
    {
        return $this->hasMany(LikeBook::class);
    }

    /**
     * Get the liked reviews by the user.
     */
    public function likedReviews()
    {
        return $this->hasMany(LikeReview::class);
    }

    /**
     * Get the reviews written by the user.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getProfilePhotoUrlAttribute(){
        return "hello";
    }

    public function contactMessages()
    {
        return $this->hasMany(ContactMessage::class);
    }

    public static function buscarPorUsername($query, $username)
    {
        $username = strtolower(str_replace(' ', '', $username)); // Convertir a minúsculas y eliminar espacios en blanco
        return $query->whereRaw('LOWER(REPLACE(name, " ", "")) LIKE ?', ['%' . $username . '%']);
    }

}
