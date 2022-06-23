<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\CartDetails;
use PDF;


class OrderManageController extends Controller
{
    public function index() {
        $cart = Cart::orderBy('id','DESC')->get();
        $cart_detail = CartDetails::all();
        return view('admin.order.index',compact('cart','cart_detail'));
    }

    public function detail($id) {
        $coupon = Coupon::all();
        $cart = Cart::find($id);
        $cart_detail = CartDetails::where('cart_id', $id)->get();
        return view('admin.order.order_detail',compact('cart','cart_detail','coupon'));
    }

    public function updateOrder(Request $request, $id){
        $data = $request->all();
        $order_update = Cart::find($id);
        $order_update->update($data);
        if($order_update){
            return redirect()->route('order.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('order.index')->with('success','Cập nhật thất bại');
        }
    }

    public function printInvoice($id){
    
        // dd('ok');
        $cart = Cart::find($id);
        $cart_detail = CartDetails::where('cart_id', $id)->get();
        // $data = [
        //     'order' => $cart_detail,
        // ];
        // $pdf = PDF::loadView('admin.order.invoice_print',$data)->setOptions(['defaultFont' => 'font-awesome']);

        // return $pdf->download('invoice_print.pdf');
    }   
}
