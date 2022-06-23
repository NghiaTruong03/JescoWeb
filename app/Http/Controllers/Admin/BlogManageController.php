<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;


class BlogManageController extends Controller
{
    public function index() {
        $blog = Blog::all();
        return view('admin.blog.index', compact('blog'));
    }

    public function create() {
        return view('admin.blog.create');
    }

    public function store(Request $request) {
        $user_id = Auth::user()->id;
        $data = $request->all();
        // Luu anh blog vao folder Public/Storage
        if($request->file('blog_image')) {
            $request->file('blog_image')->store('public');
            $data['blog_image'] = $request->file('blog_image')->hashName();
        }else{
            dd("ssss");
        }
        $blog = Blog::create([
            'blog_author_id' => $user_id,
            'blog_title' => $data['blog_title'], 
            'blog_image' => $data['blog_image'],
            'blog_summary' => $data['blog_summary'],
            'blog_content' => $data['blog_content'],
            'blog_status' => $data['blog_status']
        ]);
        if($blog){
            return redirect()->route('blog_manage.index')->with('success','Thêm mới thành công');
        } else {
            return redirect()->route('blog_manage.index')->with('success','Thêm mới thất bại');
        }
    }

    public function viewBlog($id){
        $blog = Blog::find($id);
        return view('admin.blog.view_detail',compact('blog'));
    }

    public function edit($id) {
        $blog = Blog::find($id);
        return view('admin.blog.edit',compact('blog'));
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        // dd($data);
        $blog_update = Blog::find($id);
        //Nếu tồn tại ảnh bìa mới
        if ($request->file('blog_image')) {
            // Lưu ảnh mới vào folder Public/Storage
            $request->file('blog_image')->store('public');
            $data['blog_image'] = $request->file('blog_image')->hashName();
            // Nếu blog đã có ảnh bìa thì thực hiện xóa ảnh cũ trong folder Public/Storage
            if ($blog_update->blog_image) {
                dd($blog_update->blog_image);
                $file_name = $blog_update->blog_image;
                Storage::delete('/public/' . $file_name);
            }
        }
        // dd($blog_update);
        // dd($blog_update->blog_image);
        $blog_update->update([
            'blog_title' => $data['blog_title'], 
            'blog_image' => $blog_update->blog_image,
            'blog_summary' => $data['blog_summary'],
            'blog_content' => $data['blog_content'],
            'blog_status' => $data['blog_status']
        ]);
        if ($blog_update) {
            return redirect()->route('blog_manage.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('blog_manage.index')->with('success', 'Cập nhật thất bại');
        }
    }

    public function destroy($id) {
        $blog_destroy = Blog::find($id);
        $blog_destroy->delete();
        if ($blog_destroy) {
            return redirect()->route('blog_manage.index')->with('success', 'Xóa thành công');
        } else {
            return redirect()->route('blog_manage.index')->with('success', 'Xóa thất bại');
        }
    }
}