<?php

namespace App\Http\Controllers\Shop_pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('shop_pages.pages.login');
    }

    
    public function register(Request $request){
        // dd($request->all());
        $rules = [
            'name' => 'required|max:30',
            'email' => 'required|unique:users|email:rfc,dns',
            'password' => 'required|min:8|max:20',
            'phoneNumber' => 'required|unique:users|size:10',
        ];

        $messages = [
            'name.required' => 'Yêu cầu nhập họ tên',
            'name.max' => 'Tên không được nhập quá :max kí tự',
            'email.required' => 'Yêu cầu nhập email',
            'email.unique' => 'Email này đã tồn tại',
            'password.required' => 'Yêu cầu nhập mật khẩu',
            'password.min'=> 'Mật khẩu phải từ :min đến :max kí tự',
            'phoneNumber.size' => 'Số điện thoại phải đủ :size kí tự',
            'phoneNumber.unique' => 'Số điện thoại này đã tồn tại',
            'phoneNumber.required' => 'Yêu cầu nhập số điện thoại'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()->toArray()
            ]);
            
        }else{
            $create_user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phoneNumber' => $request->phoneNumber,
                'avatar' => 'default_avatar.jpg',
                'role' => 0,
            ]);
            
            if($create_user){
                return response()->json(['status'=>1, 'msg'=> 'Đăng kí thành công']); 
                // return redirect()->route('signin.index')->with('success', 'Đăng kí thành công');
            }else{
                dd('Đăng kí thất bại');
            }
        }


    }


    public function login(Request $request){
        
        $rules = [
                'email' => 'required|email:rfc,dns',
                'password' => 'required|min:8|max:30',
        ];

        $messages = [
                'email.required' => 'Yêu cầu nhập email',
                'password.required' => 'Yêu cầu nhập mật khẩu',
                'password.min'=> 'Mật khẩu phải từ :min đến :max kí tự',
        ];
        // $request->validate($rules,$messages);
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()->toArray()
            ]);         
        }else{
            if(Auth::attempt($request->only('email','password'))){
                // return response()->json(['status'=>1, 'msg'=> 'Đăng kí thành công']); 
                return response()->json(['status'=>1]);
                // return redirect()->route('shop.index');
            }else{
                return response()->json(['status'=>1, 'msg'=> 'Sai thông tin đăng nhập']); 
                // dd('Sai thông tin đăng nhập');
            }
        }
    }

    public function viewProfile(){
        $cart = Cart::where('user_id', '=', Auth::user()->id)->get();
;
        $cartDetails = CartDetails::all();
        // dd($cart);
        return view('shop_pages.pages.profile',compact('cart','cartDetails'));
    }


    public function updateProfile(Request $request, $id){
        $rules = [
            'name' => 'required|max:30',
            'email' => 'required|email:rfc,dns',
            'phoneNumber' => 'nullable|numeric',
            'avatar' => 'file|image|mimes:jpg, png, jpeg, svg',
        ];

        $messages = [
            'name.required' => 'Yêu cầu nhập họ tên',
            'name.max' => 'Tên không được nhập quá :max kí tự',
            'email.required' => 'Yêu cầu nhập email',
            // 'phoneNumber.max' => 'Số điện thoại không được quá :max kí tự',
            'phoneNumber.numeric' => 'Số điện thoại phải ở dạng số',
            'avatar.image' => 'Ảnh phải có định dạng .jpg,png,jpeg',
        ];

        $request->validate($rules,$messages);


        $profile_update = User::find($id);
        $data = $request->all();
        //Nếu tồn tại ảnh đại diện mới thì
        if ($request->file('avatar')) {
            // Lưu ảnh mới vào folder Storage
            $file = $request->file('avatar')->store('public');
            $data['avatar'] = $request->file('avatar')->hashName();
            // Nếu sp đã có ảnh đại diện thì thực hiện xóa ảnh cũ trong folder Storage
            if ($profile_update->avatar) {
                $file_name = $profile_update->avatar;
                Storage::delete('/public/' . $file_name);
            }
        }



        $profile_update->update($data);
        if($profile_update){
            return redirect()->route('user.profile');
        }else{
            dd("Cập nhật thất bại");
        }
    }


    public function changePassword(Request $request){
        // dd($request->all());
        $rules = [
            'oldPassword' => 'required|min:8',
            'newPassword' => 'required|min:8',
            'confirmPassword' => 'required|min:8',
        ];

        $messages = [
            'oldPassword.required' => 'Yêu cầu nhập mật khẩu hiện tại',
            'newPassword.required' => 'Yêu cầu nhập mật khẩu mới ',
            'confirmPassword.required' => 'Yêu cầu nhập lại mật khẩu mới',
            'oldPassword.min'=> 'Mật khẩu phải từ :min đến :max kí tự',
            'newPassword.min'=> 'Mật khẩu phải từ :min đến :max kí tự',
            'confirmPassword.min'=> 'Mật khẩu phải từ :min đến :max kí tự',
        ];

        $request->validate($rules,$messages);

        $old_password = $request->oldPassword;
        $new_password = $request->newPassword;
        $confirm_password = $request->confirmPassword;
        //Kiem tra mat khau nhap vao voi mat khau cua user trong db
        if(Hash::check($old_password , Auth::user()->password)){
            //so sanh 2 chuoi mat khau moi
            if(strcmp($new_password , $confirm_password) != 0){
                return redirect()->back()->with('error','Mật khẩu mới không trùng khớp');
            }
            if(strcmp($new_password , $confirm_password) == 0){
                $update_password = User::find($request->id);
                $update_password->update([
                    'password' => Hash::make($new_password)
                ]);
                Auth::logout();
                return redirect()->route('signin.index')->with('requireLogin','Đổi mật khẩu thành công! </br> Yêu cầu đăng nhập lại');
            }

        }else{
            return redirect()->back()->with('error','Mật khẩu bạn nhập không đúng');
        }

    }

    public function passReset(){
        return view('shop_pages.pages.password_reset');
    }

    public function post_passReset(Request $request){
        // dd($request->all());
        $check_email = User::where('email' , $request->email)->first();
        if($check_email){
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $request->_token
            ]);
            Mail::to($request->email)->send(new ResetPassword($request->_token));

        }else{
            dd('không tìm thấy email');
        }
    }
    public function password_reset(){
        return view('shop_pages.pages.newPassword');
    }
    public function post_password_reset(Request $request){
        dd($request->all());
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('shop.index');
        // return redirect()->back();
    }

}
