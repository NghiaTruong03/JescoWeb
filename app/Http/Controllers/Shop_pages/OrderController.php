<?php

namespace App\Http\Controllers\Shop_pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\CartDetails;
use App\Models\Product;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{
    public function create()
    {
        //Lay cart status = 1 cua user
        $cart = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', config('const.CART.STATUS.PENDING'))->first();
        if ($cart) {
            if($cart->order_totalDiscount != null){
                $order_total = $cart->order_totalDiscount;
                // dd($order_total);
            }else{
                $order_total = $cart->order_total;
                // dd($order_total);
            }
            //Lay toan bo cart detail theo cart id
            $cartDetails = CartDetails::where('cart_id', '=', $cart->id)->get();
        }
        return view('shop_pages.pages.checkout', compact('cartDetails','cart','order_total'));
    }
    public function checkoutSuccess()
    {
        return view('shop_pages.pages.order_success');
    }

    public function store(Request $request)
    {   
        // dd($request->all());
        $rules = [
            'order_name' => 'required|max:30',
            'order_email' => 'required|email:rfc,dns',
            'order_phone' => 'required|numeric',
            'order_address' => 'required',
        ];

        $messages = [
            'order_name.required' => 'Yêu cầu nhập họ tên',
            'order_name.max' => 'Tên không được nhập quá :max kí tự',
            'order_email.required' => 'Yêu cầu nhập email',
            'order_phone.required' => 'Yêu cầu nhập số điện thoại',
            'order_phone.size' => 'Số điện thoại phải đủ :size chữ số',
            'order_phone.numeric' => 'Số điện thoại phải ở dạng số',
            'order_address.required' => 'Yêu cầu nhập địa chỉ',
        ];

        $request->validate($rules, $messages);

        try {
            //tim gio hang de lay id
            $cart_id = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', config('const.CART.STATUS.PENDING'))->first()->id;
            $checkout = Cart::find($cart_id);
            // dd($checkout);
            $checkout->update($request->all());
            $cartDetails = CartDetails::where('cart_id', '=', $cart_id)->get();

            foreach ($cartDetails as $cartDetail) {
                //tim id product duoc mua 
                $product_id = $cartDetail->product->id;
                $product_update = Product::find($product_id);

                //tim tong so luong san pham co trong db
                $product_quantity = $product_update->product_quantity;

                //thuc hien cap nhat san pham con lai trong db sau khi mua hang
                $new_product_qty = $product_quantity - ($cartDetail->quantity);

                $product_update->update([
                    'product_quantity' => $new_product_qty
                ]);
                if($product_update->product_quantity == 0){
                    $product_update->update([
                        'status' => 0
                    ]);
                }
            }
            if ($checkout) {

                $checkout->update([
                    'status' => config('const.CART.STATUS.CONFIRMED')
                ]);
                $send_mail = Mail::to($request->order_email)->send(new mailNotify);
                Session()->forget('coupon_checked');
                return redirect()->route('checkout.success');
                    

                // return response()->json([
                //     'status' => true,
                // ]);
            }
        } catch (\Exception $e) {
            Log::debug($e);
        }
    }

    public function vnpay_payment(Request $request){
        $data = $request->all();
       
        $this->store($request);
        // dd($request->all());
        
        $order_code = rand(00,9999);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/checkout.success";
        $vnp_TmnCode = "UWLFLV0S";//Mã website tại VNPAY 
        $vnp_HashSecret = "VNNUDXKFHUUZYOBANRROBXANDSJYSPGH"; //Chuỗi bí mật
        
        $vnp_TxnRef = $order_code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán VNPAY';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $data['total_vnpay']* 100;
        $vnp_Locale = 'VN';
        $vnp_BankCode ='NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }
        
        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
            // return redirect()->to($vnp_Url);

                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            // vui lòng tham khảo thêm tại code demo
    }

    
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function momo_payment(Request $request){    
        $data = $request->all();

        $this->store($request);

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua ATM MoMo";
        $amount = $data['total_momo'];
    //    dd($data['total_momo']);

        $orderId = time() . "";
        $redirectUrl = "http://127.0.0.1:8000/checkout.success";
        $ipnUrl = "http://127.0.0.1:8000/checkout.success";
        $extraData = "";
        
        $requestId = time() . "";
        $requestType = "payWithATM";
            // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : ""); 
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);

            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));
            // dd($result);
            $jsonResult = json_decode($result, true);  // decode json
            // dd($jsonResult);

        
            //Just a example, please check more in there
            return redirect()->to($jsonResult['payUrl']);
        
            // header('Location: ' . $jsonResult['payUrl']);
        
    }
}
