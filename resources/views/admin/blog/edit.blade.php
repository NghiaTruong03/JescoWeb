@extends('admin.master')

@section('title')
<title>Sửa blog</title>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-8 mx-auto">
                    <h1>Sửa blog #{{ $blog->id }}</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('blog_manage.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- @method('PUT') --}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên blog</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="" name="blog_title"
                                        value="{{ $blog->blog_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ảnh bìa</label>
                                    <div class="custom-file">
                                        <input type="file" name="blog_image" class="" id="validatedCustomFile" value="{{$blog->blog_image}}">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    </div>
                                    <img class="img-fluid mb-3" style="width:400px;object-fit:cover" src="{{ url('storage/'.$blog->blog_image) }}"
                                        id="previewImage">
                                    {{-- <img src="{{ url('storage/'.$blog->blog_image) }}" style="width:100%;height:300px;object-fit:cover;"
                                    class="card-img-top"> --}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tóm tắt ngắn</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="" name="blog_summary"
                                        value="{{ $blog->blog_summary }}">
                                </div>
                                <div class="form-group">
                                    <label for="validationTextarea">Nội dung blog</label>
                                    <textarea class="form-control" name="blog_content" id="editor1" rows="10" cols="80">
                                            {{ $blog->blog_content }}
                                        </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="blog_status" id="input"
                                            value="1" {{ $blog->blog_status==1?'checked':'' }}>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Hiện
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="blog_status" id="input"
                                            value="0" {{ $blog->blog_status==0?'checked':'' }}>
                                        <label class="form-check-label" for="exampleRadios2">
                                            Ẩn
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Update</button>
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

<!-- jQuery -->

@endsection
