<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\AttrValue;
use App\Models\ImgProduct;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_view = Product::all();
        return view('admin.product.index', compact('product_view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $attr_value = AttrValue::all();
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.product.add', compact('category', 'attr_value', 'brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //validation
        $rules = [
            'name' => 'required|unique:products',
            'price' => 'required|digits_between:4,8',
            'sale_price' => 'nullable|digits_between:4,8',
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_quantity' => 'required',
            'image' => 'required',
            // 'child_img' => 'nullable|image|mimes:jpg,png,jpeg,svg'
        ];

        $messages = [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'price.required' => 'Giá sản phẩm không được để trống',
            'price.digits_between' => 'Giá sản phẩm phải là dạng số',
            'sale_price.digits_between' => 'Giá sản phẩm phải là dạng số',
            'category_id.required' => 'Vui lòng chọn danh mục',
            'brand_id.required' => 'Vui lòng chọn nhãn hàng',
            'product_quantity.required' => 'Số lượng sản phẩm không được để trống',
            'image.required' => 'Ảnh sản phẩm không được để trống',
            // 'image.image' => 'Ảnh phải có định dạng .jpg,png,jpeg',
            // 'child_img.required' => 'Ảnh sản phẩm không được để trống',
            // 'child_img.image' => 'Ảnh phải có định dạng .jpg,png,jpeg',
        ];
        $request->validate($rules,$messages);

        $data = $request->all();
        // dd($data);
        
        //kiểm tra ảnh tồn tại 
        if ($request->file('image')) {
            $request->file('image')->store('public');
            $data['image'] = $request->file('image')->hashName();
        }
        $product = Product::create($data)->id;
        
        if($product){      
            //Kiểm tra ảnh con có tồn tại không, nếu có thì lưu trữ vào thư mục Storage
            if ($request->file('child_img')) {
                foreach (($request->file('child_img')) as $value) {
                    $value->store('public');
                    $data['child_img'] = $value->hashName();
                    $img_product = ImgProduct::create([
                        'child_img' => $data['child_img'],
                        'product_id' => $product,
                    ]);
                }
            }
            return redirect()->route('product.index')->with('success', 'Thêm mới thành công');
        } else {
            return redirect()->route('product.index')->with('success', 'Cập nhật thất bại');
          }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_edit = Product::find($id);
        $category = Category::all();
        $brand = Brand::all();
        $cImg_edit = ImgProduct::where('product_id', $id)->get();
        return view('admin.product.view_detail', compact('product_edit', 'category', 'brand', 'cImg_edit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_edit = Product::find($id);
        $category = Category::all();
        $brand = Brand::all();
        $cImg_edit = ImgProduct::where('product_id', $id)->get();
        // dd($img_prd);
        return view('admin.product.edit', compact('product_edit', 'category', 'brand', 'cImg_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation
        $rules = [
            'name' => 'required',
            'price' => 'required|digits_between:4,8',
            'sale_price' => 'nullable|digits_between:4,8',
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_quantity' => 'required',
            'image' => 'required',
            // 'child_img' => 'nullable|image|mimes:jpg,png,jpeg,svg'
        ];
        
        $messages = [
            'name.required' => 'Tên sản phẩm không được để trống',
            'price.required' => 'Giá sản phẩm không được để trống',
            'price.digits_between' => 'Giá sản phẩm phải từ 4 đến 8 số',
            'sale_price.digits_between' => 'Giá sản phẩm phải từ 4 đến 8 số',
            'category_id.required' => 'Vui lòng chọn danh mục',
            'brand_id.required' => 'Vui lòng chọn nhãn hàng',
            'product_quantity.required' => 'Số lượng sản phẩm không được để trống',
            'image.required' => 'Ảnh sản phẩm không được để trống',
            // 'image.image' => 'Ảnh phải có định dạng .jpg,png,jpeg',
            // 'child_img.required' => 'Ảnh sản phẩm không được để trống',
            // 'child_img.image' => 'Ảnh phải có định dạng .jpg,png,jpeg',
        ];
        $request->validate($rules,$messages);
        
        $data = $request->all();
        // dd($data);
        // Tìm id sản phẩm
        $product_update = Product::find($id);
        $data = $request->all();

        //Nếu tồn tại ảnh đại diện mới thì
        if ($request->file('image')) {
            // Lưu ảnh mới vào folder Storage
            $file = $request->file('image')->store('public');
            $data['image'] = $request->file('image')->hashName();
            // Nếu sp đã có ảnh đại diện thì thực hiện xóa ảnh cũ trong folder Storage
            if ($product_update->image) {
                $file_name = $product_update->image;
                Storage::delete('/public/' . $file_name);
            }
        }

        //Nếu tồn tại ảnh con
        if ($request->file('child_img')) {
            $cImg_update = ImgProduct::where('product_id', $id)->get();
            if($cImg_update){
                $cImg_delete = ImgProduct::where('product_id', $id)->delete();
                foreach($cImg_update as $img){
                    $file_name = $img->child_img;
                    Storage::delete('/public/'.$file_name);
                }
            }
            foreach (($request->file('child_img')) as $value) {
                $value->store('public');
                $data['child_img'] = $value->hashName();
                $img_product = ImgProduct::create([
                    'child_img' => $data['child_img'],
                    'product_id' => $id,
                ]);
            }
        }

        $product_update->update($data);
        if ($product_update) {
            return redirect()->route('product.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('product.index')->with('success', 'Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::find($id);
        $delete->delete();
        

        if ($delete) {
            return redirect()->route('product.index')->with('success', 'Xóa thành công');
        } else {
            return redirect()->route('product.index')->with('success', 'Xóa thất bại');
        }
    }
}
