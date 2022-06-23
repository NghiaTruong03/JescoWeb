@extends('admin.master')

@section('content')






<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách mã giảm giá</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <strong>{{session('success')}}</strong>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tên mã giảm giá</th>
                                        <th scope="col">Số lượng mã</th>
                                        <th scope="col">Hình thức giảm giá</th>
                                        <th scope="col">Mã giảm giá</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($coupon as $value)
                                    <tr>
                                        <th scope="row" style="width: 100px">{{$value->id}}</th>
                                        <td>{{ $value->coupon_name }}</td>
                                        <td>{{$value->coupon_quantity}}</td>
                                        <td>
                                            @if ($value->coupon_type == 0)
                                            <span class="label label-success">Giảm ₫{{ number_format($value->coupon_value,0,',','.') }}</span>
                                            @else
                                            <span class="label label-danger">Giảm {{$value->coupon_value}}%</span>
                                            @endif
                                        </td>
                                        <td>{{$value->coupon_code}}</td>
                                        <td>
                                            <form id="delete-form-{{$value->id}}"
                                                action="{{ route('coupon.destroy',$value->id) }}"
                                                method="POST">
                                                @csrf
                                                {{-- @method('DELETE') --}}
                                                <a class="btn btn-md"
                                                    href="{{route('coupon.edit',$value->id)}}"><i
                                                        class="nav-icon far fa-edit"></i></a>
                                                <button type="button" class="btn btn-md"><i
                                                        class="nav-icon fas fa-times" data-toggle="modal"
                                                        data-target="#modal-delete-{{$value->id}}"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-delete-{{$value->id}}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Thông báo</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Đồng ý xóa mã giảm giá?</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Đóng
                                                    </button>
                                                    <a href="{{ route('coupon.destroy', ['id' => $value->id]) }}"
                                                        type="button" class="btn btn-danger">Xóa</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
