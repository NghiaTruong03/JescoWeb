<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class User extends Authenticatable
{

     use HasApiTokens, HasFactory, Notifiable, SoftDeletes;// add soft delete

     protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phoneNumber',
        'address',
        'avatar',
        'password',
        'role',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];





    public function carts(){
        return $this->hasMany(Cart::class,'user_id');        
    }

    public function wishlists()
    {
        return $this->hasOne(Wishlist::class, 'user_id');
    }

    public function comment(){
        return $this->hasMany(Comment::class,'user_id');        
    }

    public function blog(){
        return $this->hasMany(Blog::class,'blog_author_id');        
    }
}
