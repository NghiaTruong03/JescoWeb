<?php

namespace App\Http\Controllers\Shop_pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index() {
        $blog = Blog::all();
        return view('shop_pages.pages.blog', compact('blog'));
    }

    public function detail($id) {
        $blog = Blog::find($id);
        $blog->increment('blog_view');
        return view('shop_pages.pages.blog_detail', compact('blog'));
    }
}
