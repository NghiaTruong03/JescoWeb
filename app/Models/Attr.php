<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attr extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        // 'value',
        'type',
    ];
    public function values(){
        return $this->hasMany(AttrValue::class, 'id_attr');        
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($Attr) { // before delete() method call this
             $Attr->values()->delete();
             // do the rest of the cleanup...
        });
    }
}
