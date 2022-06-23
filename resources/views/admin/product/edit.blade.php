@extends('admin.master')

@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa thông tin sản phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <form action="{{Route('product.update',$product_edit->id)}}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="">Tên sản phẩm</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                onkeyup="ChangeToSlug()" value="{{$product_edit->name}}">
                                                @error('name')
                                                <span style="color: red" role="alert">
                                                    {{$message}}
                                                </span>
                                                @enderror
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                            <label for="">Slug</label>
                                            <input type="text" class="form-control" name="slug" id="slug" value="{{$product_edit->slug}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationTextarea">Mô tả</label>
                                        <textarea class="form-control" name="description" id="editor1" rows="10"
                                            cols="80" >
                                            {{$product_edit->description}}"
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Giá</label>
                                            <input type="text" class="form-control" id="price" name="price"  value="{{$product_edit->price}}">
                                            @error('price')
                                                <span style="color: red" role="alert">
                                                    {{$message}}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Giá KM</label>
                                            <input type="text" class="form-control" id="sale_price" name="sale_price" value="{{$product_edit->sale_price}}">
                                            @error('sale_price')
                                                <span style="color: red" role="alert">
                                                    {{$message}}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="">Số lượng trong kho</label>
                                            <input type="number" class="form-control" name="product_quantity" value="{{$product_edit->product_quantity}}">
                                            @error('product_quantity')
                                                <span style="color: red" role="alert">
                                                    {{$message}}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Ảnh sản phẩm</label>
                                        <div class="custom-file">
                                            {{-- <input type="file" class="custom-file-input" id="customFile"> --}}
                                            <input type="file" name="image" class="" id="validatedCustomFile">
                                            <label class="custom-file-label" for="validatedCustomFile">@if($product_edit->image)
                                                {{ $product_edit->image }}
                                                @else
                                                Choose file...
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <div><label style="margin-top: 0.5rem;" for="">Ảnh hiện tại:</label></div>
                                            @if($product_edit->image)
                                            <img style="width:100px;object-fit:cover" src="{{ url('storage/'.$product_edit->image) }}"
                                                alt="">
                                            @endif
                                        </div>
                                        {{-- <img class="img-fluid mb-3" style="width:400px;object-fit:cover" src=""
                                            id="previewImage"> --}}
                                            @error('image')
                                            <span style="color: red" role="alert">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ảnh liên quan</label>
                                        <div class="custom-file">
                                            <input type="file" name="child_img[]" multiple class="" id="">                                          
                                        </div>
                                        @error('child_img')
                                                <span style="color: red" role="alert">
                                                    {{$message}}
                                                </span>
                                        @enderror
                                        {{-- <div>
                                            <label for="">Anh cu</label>
                                            @if($cImg_edit)
                                                @foreach ($cImg_edit as $value)
                                                <img style="width:100px;object-fit:cover" src="{{ url('storage/'.$value->child_img) }}">
                                                @endforeach
                                            @endif
                                        </div> --}}
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="mb-4 text-right">
                                {{-- <div class="card-body"> --}}
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                {{-- </div> --}}
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Trạng thái</label>
                                        <div class="form-check radio">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status" id="input"
                                                    value="1" {{$product_edit->status==1?'checked':''}}>
                                                Còn hàng
                                            </label>
                                        </div>
                                        <div class="form-check radio">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status" id="input"
                                                    value="0" {{$product_edit->status==0?'checked':''}}>
                                                Hết hàng
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Danh mục</label>
                                        @foreach ($category as $category_value)
                                        <div class="form-check radio">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="category_id"
                                                    id="input" value="{{$category_value->id}}" {{$product_edit->category_id==$category_value->id?'checked':''}}>
                                                {{$category_value->name}}
                                            </label>
                                        </div>
                                        @endforeach
                                        @error('category_id')
                                        <span style="color: red" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Nhãn hàng</label>
                                        @foreach ($brand as $brand_value)
                                        <div class="form-check radio">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="brand_id" id="input"
                                                    value="{{$brand_value->id}}" {{$product_edit->brand_id==$brand_value->id?'checked':''}}>
                                                {{$brand_value->name}}
                                            </label>
                                        </div>
                                        @endforeach
                                        @error('brand_id')
                                        <span style="color: red" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            {{-- <div class="col-md-6 mx-auto">
                <form action="{{Route('product.update',$product_edit->id)}}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" value="{{$product_edit->name}}"
                                placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Giá</label>
                            <input type="text" class="form-control" name="price" value="{{$product_edit->price}}"
                                placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Giá KM</label>
                            <input type="text" class="form-control" name="sale_price"
                                value="{{$product_edit->sale_price}}" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="" id="validatedCustomFile">
                            <label class="custom-file-label" for="validatedCustomFile">
                                @if($product_edit->image)
                                {{ $product_edit->image }}
                                @endif
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div><label style="margin-top: 0.5rem;" for="">Ảnh hiện tại:</label></div>
                        @if($product_edit->image)
                        <img style="width:100px;object-fit:cover" src="{{ url('storage/'.$product_edit->image) }}"
                            alt="">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Anh lien quan</label>
                        <input type="file" name="child_img[]" multiple class="" id="">
                        <div>
                            <label for="">Anh cu</label>
                            @if($cImg_edit)
                                @foreach ($cImg_edit as $value)
                                <img style="width:100px;object-fit:cover" src="{{ url('storage/'.$value->child_img) }}">
                                @endforeach
                            @endif
                        </div>
                        
                    </div>

                    <img class="img-fluid mb-3" style="width:400px;object-fit:cover" src="" id="previewImage">
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <select name="category_id" class="custom-select" aria-placeholder="">
                            @foreach ($category as $value)
                            <option value="{{$value->id}}" @if ($product_edit->category_id == $value->id)
                                selected
                                @endif >{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tên Nhãn hàng</label>
                        <select name="brand_id" class="custom-select">
                            @foreach ($brand as $value)
                            <option value="{{$value->id}}" @if ($product_edit->brand_id == $value->id)
                                selected
                                @endif >{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="validationTextarea">Mô tả</label>
                        <textarea class="form-control" name="description" id="" rows="3"
                            value="">{{ $product_edit->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <div class="form-check radio">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="input" value="1" checked>
                                Còn hàng
                            </label>
                        </div>
                        <div class="form-check radio">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="input" value="2">
                                Hết hàng
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div> --}}
        </div>
    </div>
</div>

<script>
    function ChangeToSlug() {
        var title, slug;

        //Lấy text từ thẻ input title 
        title = document.getElementById("name").value;

        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('slug').value = slug;
    }

</script>
@endsection
