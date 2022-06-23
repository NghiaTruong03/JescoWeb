<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    public function index(){
        $coupon = Coupon::all();
        return view('admin.coupon.index',compact('coupon'));
    }

    public function create(){
        return view('admin.coupon.add');
    }

    public function store(Request $request){
        $create_coupon = Coupon::create($request->all());
        if($create_coupon){
            return redirect()->route('coupon.index')->with('success','Thêm mới mã thành công');
        }else{
            dd('Thêm mới thất bại');
        }
    }

    public function edit($id){
        $edit_coupon = Coupon::find($id);
        return view('admin.coupon.edit',compact('edit_coupon'));
    }
    
    public function update(Request $request, $id){
        $update_coupon = Coupon::find($id);
        $update_coupon->update($request->all());
        if($update_coupon){
            return redirect()->route('coupon.index')->with('success','Cập nhật mã thành công');
        }else{
            dd('Cập nhật thất bại');
        }

    }

    public function destroy($id){
        $delete_coupon = Coupon::find($id);
        $delete_coupon->delete();
        if($delete_coupon){
            return redirect()->route('coupon.index')->with('success','Xóa mã thành công');
        }else{
            dd('Cập nhật thất bại');
        }

    }

}

