<?php

namespace App\Http\Controllers\Shop_pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\ProWishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WishlistController extends Controller
{
    public function index(){
        $product_wishlist= [];
        $wishlist = Wishlist::where('user_id' , '=' , Auth::user()->id)->first();
        if ($wishlist) {
            //Lay toan bo thong tin wishlist theo id
            $product_wishlist = ProWishlist::where('wishlist_id', '=' , $wishlist->id)->get();
        }
        return view('shop_pages.pages.wishlist',compact('product_wishlist'));
    }

    public function addWishList($id) {
        DB::beginTransaction();
        try {
            if (Auth::user()) {
                //Kiem tra nguoi dung co Wishlist truoc do chua       
                $wishlist = Wishlist::where('user_id', '=', Auth::user()->id)->first();
                //Neu chua thi tao Wishlist moi
                if (!$wishlist) {
                    $wishlist_id = Wishlist::create([
                        'user_id' => Auth::user()->id,
                    ])->id; //lay ID cua Wishlist moi
                    ProWishlist::create([
                        'wishlist_id' => $wishlist_id,
                        'product_id' => $id,
                    ]);
                //Roi thi them san pham vao Wishlist da ton tai
                } else { 
                    // Kiem tra san pham duoc chon da ton tai trong Wishlist chua
                    $pro = ProWishlist::where('product_id', '=' , $id)->first();
                    $wishlist_id = $wishlist->id;
                    //Neu chua thi them san pham vao Wishlist
                    if(!$pro){
                        ProWishlist::create([
                            "wishlist_id"=> $wishlist_id,
                            "product_id" => $id,
                        ]);     
                    } else {
                        // ProWishlist::where('wishlist_id', $wishlist_id)->first();
                    }
                }
                DB::commit();
            }
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
        }
        return redirect()->route('shop.index');
    }

    //delete product in wishlist
    public function deleteWishlist($id){
        $product_wishlist = ProWishlist::find($id);
        $product_wishlist->delete();
        return redirect()->route('wishlist.index');
    }
}
