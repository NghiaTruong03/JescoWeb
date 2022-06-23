@extends('admin.master')

@section('title')
    <title>Quản lý bài viết</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách bài viết</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">datatble</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                    @endif
                </div>
                @foreach($blog as $value)
                <div class="col-md-3">
                    <div class="card" style="">
                        <img src="{{ url('storage/'.$value->blog_image) }}" style="height:300px;object-fit:cover;"
                            class="card-img-top">
                        <div class="card-body">
                            <h4 class="card-title"><strong>{{ $value->blog_title }}</strong></h4>
                            <p class="card-text">{{ $value->blog_summary }}</p>
                            <div class="btn-group float-right">
                                <a href="{{ route('blog_manage.viewBlog', $value->id) }}" class="btn btn-primary">Chi tiết</a>
                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu" style="">
                                    <a class="dropdown-item" href="{{ route('blog_manage.edit',$value->id) }}">Sửa blog</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('blog_manage.destroy',$value->id) }}">Xóa blog</a>
                                    {{-- <a class="dropdown-item" id="delete-form-{{$value->id}}"
                                        href="{{ route('blog_manage.destroy',$value->id) }}">
                                        <span data-toggle="modal" data-target="#modal-delete-{{$value->id}}">Xóa blog</span>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="modal fade" id="modal-delete-{{$value->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thông báo</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">Đồng ý xóa blog?</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Đóng
                                </button>
                                <button type="button" class="btn btn-danger"
                                    onclick="event.preventDefault();document.getElementById('delete-form-{{$value->id}}').submit()">Xóa</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
                @endforeach

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- /.card -->
@endsection
