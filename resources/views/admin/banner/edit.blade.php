@extends('admin.master')

@section('title')
    <title>Sửa banner #{{ $banner_edit->id }}</title>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6 mx-auto">
                    <h1>Sửa banner #{{ $banner_edit->id }}</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('banner.updateBanner',$banner_edit->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="exampleInputEmail1">Tiêu đề</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" class="form-control" name="title" value="{{$banner_edit->title}}">
                                        @error('title')
                                        <span style="color: red" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Ảnh banner</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <div class="custom-file">
                                            <input type="file" name="banner_img" id="validatedCustomFile" value="{{$banner_edit->banner_img}}">
                                            {{-- <label class="custom-file-label" for="validatedCustomFile">Choose file...</label> --}}
                                            <label class="custom-file-label" for="validatedCustomFile" >@if($banner_edit->banner_img)
                                                {{ $banner_edit->banner_img }}
                                                @else
                                                Choose file...
                                                @endif
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <div><label style="margin-top: 0.5rem;" for="">Ảnh hiện tại:</label></div>
                                            @if($banner_edit->banner_img)
                                            <img style="width:50%;object-fit:cover" src="{{ url('storage/'.$banner_edit->banner_img) }}"
                                                alt="">
                                            @endif
                                        </div>
                                        @error('banner_img')
                                        <span style="color: red" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                        <img class="img-fluid mb-3" style="width:400px;object-fit:cover" src=""
                                            id="previewImage">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Mức giảm giá</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" class="form-control" name="discount" value="{{$banner_edit->discount}}">
                                        @error('discount')
                                        <span style="color: red" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Trạng thái</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <div class="form-check radio">
                                            <label class="form-check-label" for="exampleRadios1">
                                                <input class="form-check-input" type="radio" name="status" id="input"
                                                    value="1" {{($banner_edit->status==1)?'checked':''}}>
                                                Hiện
                                            </label>
                                        </div>
                                        <div class="form-check radio">

                                            <label class="form-check-label" for="exampleRadios2">
                                                <input class="form-check-input" type="radio" name="status" id="input"
                                                    value="2" {{($banner_edit->status==2)?'checked':''}}>
                                                Ẩn
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary float-right">Lưu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
