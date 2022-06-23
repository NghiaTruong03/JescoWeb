@extends('admin.master')

@section('title')
    <title>Thêm mới banner</title>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6 mx-auto">
                    <h1>Thêm mới banner</h1>
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
                            <form action="{{route('banner.create')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="exampleInputEmail1">Nội dung</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" class="form-control" name="title">
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
                                            <input type="file" name="banner_img" class="" id="validatedCustomFile">
                                            <label class="custom-file-label" for="validatedCustomFile">Choose
                                                file...</label>
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
                                        <label for="">Tiêu đề</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" class="form-control" name="discount">
                                        @error('discount')
                                        <span style="color: red" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Trạng thái</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <div class="form-check radio">
                                            <label class="form-check-label" for="exampleRadios1">
                                                <input class="form-check-input" type="radio" name="status" id="input"
                                                    value="1" checked>
                                                {{-- {{($status)?'checked':''}} --}}
                                                Hiện
                                            </label>
                                        </div>
                                        <div class="form-check radio">
                                            <label class="form-check-label" for="exampleRadios2">
                                                <input class="form-check-input" type="radio" name="status" id="input"
                                                    value="2">
                                                Ẩn
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary float-right">Submit</button>
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
