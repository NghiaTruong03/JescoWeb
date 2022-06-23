<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];
    public function products(){
        return $this->hasMany(Product::class,'category_id', 'id');        
    }
    
    public static function boot() {
        parent::boot();

        static::deleting(function($product) { // before delete() method call this
            $product->products()->each(function($product) {
                $product->delete();
            });
        });
        // static::deleting(function($product) { // before delete() method call this
        //      $product->products()->delete();
        // });
    }
}
