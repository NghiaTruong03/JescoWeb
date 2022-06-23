<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index() {
        $banner = Banner::all();
        return view('admin.banner.index',compact('banner'));
    }

    public function create() {
        return view('admin.banner.add');
    }

    public function addBanner(Request $request) {
        $rules = [
            'title' => 'required',
            'discount' => 'required',
            'banner_img' => 'required|image|mimes:jpg,png,jpeg,svg',
        ];
        $messages = [
            'title.required' => 'Tiêu đề không được để trống',
            'discount.required' => 'Mức giảm giá không được để trống',
            'banner_img.required' => 'Ảnh banner không được để trống',
        ];
        $request->validate($rules,$messages);
        $data = $request->all();

        if($request->file('banner_img')) {
            $request->file('banner_img')->store('public');
            $data['banner_img'] = $request->file('banner_img')->hashName();
        }else{
            dd("ssss");
        }
        $banner = Banner::create($data);
        if($banner){
            return redirect()->route('banner.index')->with('success','Thêm mới thành công');
        } else {
            dd("Thêm mới thất bại");
        }
    }

    public function viewBanner($id){
        $banner_view = Banner::find($id);
        return view('admin.banner.view_detail',compact('banner_view'));
    }

    public function editBanner($id) {
        $banner_edit = Banner::find($id);
        return view('admin.banner.edit',compact('banner_edit'));
    }

    public function updateBanner(Request $request, $id){
        $rules = [
            'title' => 'required',
            'discount' => 'required',
            'banner_img' => 'required|image|mimes:jpg,png,jpeg,svg',
        ];
        $messages = [
            'title.required' => 'Tiêu đề không được để trống',
            'discount.required' => 'Mức giảm giá không được để trống',
            'banner_img.required' => 'Ảnh banner không được để trống',
        ];
        $request->validate($rules,$messages);

        // Tìm id banner
        $banner_update = Banner::find($id);
        $data = $request->all();
        //Nếu tồn tại ảnh mới
        if ($request->file('banner_img')) {
            // Lưu ảnh mới vào folder Storage
            $file = $request->file('banner_img')->store('public');
            $data['banner_img'] = $request->file('banner_img')->hashName();
            // Nếu sp đã có ảnh đại diện thì thực hiện xóa ảnh cũ trong folder Storage
            if ($banner_update->banner_img) {
                $file_name = $banner_update->banner_img;
                Storage::delete('/public/' . $file_name);
            }
        }

        $banner_update->update($data);
        if ($banner_update) {
            return redirect()->route('banner.index')->with('success', 'Cập nhật thành công');
        } else {
            dd('Cập nhật thất bại');
        }
    }

    public function deleteBanner($id) {
        $banner_delete = Banner::find($id);
        $banner_delete->delete();
        if($banner_delete){
            return redirect()->back()->with('success','Xóa thành công');
        }
    }
}
