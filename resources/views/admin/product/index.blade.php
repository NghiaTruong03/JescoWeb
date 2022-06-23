@extends('admin.master')
@section('title')
<title>Quản lí Sản phẩm</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách sản phẩm</h1>
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
                    {{-- <a href="{{ Route('product.create') }}" class="btn btn-primary">Thêm mới sản phẩm</a> --}}
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Giá km</th>
                                        <th>Ảnh</th>
                                        <th>Danh mục</th>
                                        {{-- <th>Nhãn hàng</th> --}}
                                        {{-- <th>Trạng thái</th> --}}
                                        @cannot('merchandiser')
                                        <th>Thao tác</th>
                                        @endcannot
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product_view as $product_value)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $product_value->name }}</td>
                                        <td>{{ $product_value->product_quantity }}</td>
                                        <td>₫ {{ number_format($product_value->price,0,',','.') }}</td>
                                        <td>₫ {{number_format($product_value->sale_price,0,',','.')}}</td>
                                        <td>
                                            <img style="width:100px;height:100px;object-fit:cover;"
                                                src="{{ url('storage/' . $product_value->image) }}" alt="">
                                        </td>
                                        <td>{{ $product_value->category->name }}</td>
                                        {{-- <td>{{ $product_value->brand->name }}</td> --}}
                                        {{-- <td>
                                                    
                                                    @if ($product_value->product_quantity>0)
                                                        <span class="badge bg-success">Còn hàng</span>
                                                    @else
                                                        <span class="badge bg-danger">Hết hàng</span>
                                                    @endif
                                                </td> --}}
                                        @cannot('merchandiser')
                                        <td>
                                            <form id="delete-form-{{ $product_value->id }}"
                                                action="{{ route('product.destroy', $product_value->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-md" href="{{route('product.show', $product_value->id)}}"><i class="nav-icon far fa-eye"></i></a>
                                                <a class="btn btn-md"
                                                    href="{{ route('product.edit', $product_value->id) }}"><i
                                                        class="nav-icon far fa-edit"></i></a>
                                                <button type="button" class="btn btn-md"><i
                                                        class="nav-icon fas fa-times" data-toggle="modal"
                                                        data-target="#modal-delete-{{ $product_value->id }}"></i></button>
                                            </form>
                                        </td>
                                        @endcannot
                                    </tr>
                                    <div class="modal fade" id="modal-delete-{{ $product_value->id }}" tabindex="-1"
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
                                                <div class="modal-body">Đồng ý xóa sản phẩm</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Đóng
                                                    </button>
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="event.preventDefault();document.getElementById('delete-form-{{ $product_value->id }}').submit()">Xóa</button>
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

<!-- /.card -->
@endsection
