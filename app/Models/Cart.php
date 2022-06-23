<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    /**
     * 
     * 
     * @var string
     */
    protected $table = 'carts';

    protected $fillable = [
        'id',
        'user_id',
        'status',
        'order_total',
        'order_totalDiscount',
        'payment_method',
        'order_name',
        'order_email',
        'order_phone',
        'order_address',
        'order_note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cart_details()
    {
        return $this->hasMany(CartDetails::class, 'cart_id','id');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($cart_detail) { // before delete() method call this
            $cart_detail->cart_details()->each(function($detail) {
                $detail->delete();
            });
        });
    }
}
