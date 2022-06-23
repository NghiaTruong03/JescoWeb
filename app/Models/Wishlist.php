<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    /**
     * 
     * 
     * @var string
     */
    protected $table = 'wishlists';
    
    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function ProWishlists()
    {
        return $this->hasMany(ProWishlists::class, 'wishlist_id','id');
    }
}
