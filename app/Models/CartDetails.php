<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    use HasFactory;

    /**
     * 
     * 
     * @var string
     */
    protected $table = 'cart_details';

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'total'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id','id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id','product_id');
    }
    // public static function boot()
    // {
    //     parent::boot();
    //     static::deleting(function($product) { // before delete() method call this
    //         $product->product()->delete();
    //     });
    // }
}
