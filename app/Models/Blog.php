<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
     /**
     * 
     * 
     * @var string
     */
    protected $table = 'blogs';

    protected $fillable = [
        'blog_author_id',
        'blog_title', 
        'blog_image',
        'blog_summary',
        'blog_content',
        'blog_view',
        'blog_status'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'blog_author_id', 'id');
    }
}
