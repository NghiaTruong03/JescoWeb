<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index(){

        //Tong so don hang
        $current_order = count(Cart::where('status', '!=',config('const.CART.STATUS.PENDING'))->get());

        Carbon::setLocale('vi');
        //lay cac ban ghi hoa don trong 7 ngay gan nhat
        $from = Carbon::now()->subDays(7);
        $to = Carbon::now();
        $period = now()->subMonths(12)->monthsUntil(now());
        $allDay = [];
        $allTotal = [];
        for ($i = 0; $i <= 7; $i++) {
            $day = Carbon::now()->subDays($i)->toDateString();

            $listCartInDay = Cart::where('status','=',config('const.CART.STATUS.DELIVERED'))->whereDate('updated_at', '=' ,$day)->orderBy('updated_at','DESC')->get();
            // dump($listCartInDay);
            // die();
            $total = 0;
            if($listCartInDay) {
                foreach ($listCartInDay as $value) {
                    // dump($listCartInDay);
                    $total += $value->order_totalDiscount ?? $value->order_total;
                }
            }
            array_push($allDay, $day);
            array_push($allTotal, $total);
            // dump($day . '----' .$total);
        }

        for($i = 0; $i< count($allDay); $i++) {
            // dump($allDay[$i] . '----' .$allTotal[$i]);
        }
        // dd("END");

        // $days = Cart::where('status','=',config('const.CART.STATUS.DELIVERED'))->whereBetween('updated_at', [$from,$to])
        //     ->orderBy('updated_at','ASC')->get()->groupBy(function($data) {
        //         return Carbon::parse($data->updated_at)->format('Y-m-d');
        //     });


        $days =  Cart::where('status','=',config('const.CART.STATUS.DELIVERED'))->whereBetween('updated_at', [$from,$to])
                 ->orderBy('updated_at','ASC')->get();
        // dump($days);
        // die();
        
        //tong doanh thu
        $revenue = 0;
        $cart = Cart::where('status','=',config('const.CART.STATUS.DELIVERED'))->get();
        foreach($cart as $cart_value){
            $cart_id = $cart_value->id;
            if($cart_value->order_totalDiscount != null){
                $revenue += $cart_value->order_totalDiscount;               
            }else{
                $revenue += $cart_value->order_total;               
            }

        } 

        //tong so luong user
        $current_user = count(User::all());


        //tong so luong san pham
        $current_product = count(Product::all());


        return view('admin.dashboard',compact('current_user','current_product','current_order','revenue','days','allDay','allTotal'));
    }


    public function login(){
        return view('admin.login');
    }


    public function postLogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect()->route('admin.index');
        } else {
            dd('sai thong tin');
        }
    }


    public function logout(){
        Auth::logout();
        return view('admin.login');
    }

}
