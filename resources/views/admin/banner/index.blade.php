@extends('admin.master')

@section('title')
    <title>Danh sách banner</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách banner</li>
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
                    <a href="{{ route('banner.create') }}" class="btn btn-primary">Thêm mới banner</a>
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>{{session('success')}}</strong>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">ID</th>
                                        <th scope="col">Tiêu đề</th>
                                        <th scope="col">Ảnh</th>
                                        <th scope="col">Khuyến mại</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($banner as $banner_value)
                                    <tr>
                                        <td style="text-align: center">{{ $banner_value->id }}</td>
                                        <td>{{ $banner_value->title }}</td>
                                        <td>
                                            <img style="width:100px;height:100px;object-fit:cover;"
                                                src="{{ url('storage/'.$banner_value->banner_img) }}" alt="">
                                        </td>
                                        <td>{{$banner_value->discount}}</td>
                                        <td>
                                            
                                            <form id="delete-form-{{$banner_value->id}}"
                                                action="{{ route('banner.deleteBanner',$banner_value->id) }}"
                                                method="POST">
                                                @csrf
                                                {{-- @method('DELETE') --}}
                                                <a class="btn btn-md" href="{{route('banner.viewBanner', $banner_value->id)}}"><i class="nav-icon far fa-eye"></i></a>
                                                <a class="btn btn-md"
                                                    href="{{route('banner.editBanner',$banner_value->id)}}"><i
                                                        class="nav-icon far fa-edit"></i></a>
                                                <button type="button" class="btn btn-md"><i
                                                        class="nav-icon fas fa-times" data-toggle="modal"
                                                        data-target="#modal-delete-{{$banner_value->id}}"></i></button>
                                            </form>

                                        </td>

                                    </tr>
                                    <div class="modal fade" id="modal-delete-{{$banner_value->id}}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Thông báo</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Đồng ý xóa banner?</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Đóng
                                                    </button>
                                                    <a href="{{ route('banner.deleteBanner', ['id' => $banner_value->id]) }}"
                                                        type="button" class="btn btn-danger">Xóa</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
