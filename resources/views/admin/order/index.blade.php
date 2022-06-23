@extends('admin.master')
@section('title')
    <title>Quản lí đơn hàng</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách đơn hàng</h1>
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
                                            <th>ID</th>
                                            <th>Thời gian tạo</th>
                                            <th>Tên người dùng</th>
                                            <th>Số điện thoại</th>
                                            <th>Tổng tiền</th>
                                            <th style="text-align: center">Trạng thái</th>
                                            <th></th>
                                            {{-- @cannot('merchandiser') --}}
                                            {{-- <th>Thao tác</th> --}}
                                            {{-- @endcannot --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $cart_value)
                                            @if($cart_value->status != 1)
                                            <tr>
                                                <td style="width: 100px">{{ $cart_value->id }}</td>
                                                <td>{{ $cart_value->created_at->format('d/m/Y') }}</td>
                                                <td>{{$cart_value->order_name}}</td>
                                                <td>{{$cart_value->order_phone}}</td>
                                                  <td>
     
                                                        @if($cart_value->order_totalDiscount != null)

                                                    đ {{ number_format($cart_value->order_totalDiscount,0,',','.') }}
                               
                                                       @else
                                     
                                                    đ {{ number_format($cart_value->order_total,0,',','.') }}
                                     
                                                        @endif
                                            
                                                   
                                                   
                                                    
                                                </td>
                                                <td style="text-align: center">
                                                    
                                                    @foreach (config('const.CART.STATUS') as $key => $value )
                                                        @if ($cart_value->status ==  $value)
                                                        <span class="order-status-{{Str::lower($key)}}"> 
                                                            {{__('order_status.ORDER.STATUS'.'.'.Str::lower($key))}}
                                                        </span>
                                                        @endif                                    
                                                    @endforeach    
                                                                                              
                                                </td>
                                                
                                                <td><a href="{{ route('order.detail',$cart_value->id) }}">Chi tiết</a></td>
                                               {{-- @cannot('merchandiser')
                                                <td>
                                                
                                                        
                                                    
                                                    <form id="delete-form-{{ $product_value->id }}"
                                                        action="{{ route('product.destroy', $product_value->id) }}"
                                                        method="POST">

                                                        @csrf
                                                        @method('DELETE')
                                                        <a class="btn btn-md"
                                                            href="{{ route('product.edit', $product_value->id) }}"><i
                                                                class="nav-icon far fa-edit"></i></a>

                                                        <button type="button" class="btn btn-md"><i
                                                                class="nav-icon fas fa-times" data-toggle="modal"
                                                                data-target="#modal-delete-{{ $product_value->id }}"></i></button>
                                                    </form>
                                                   
                                                </td>
                                                @endcannot --}}

                                            </tr>
                                            {{-- <div class="modal fade" id="modal-delete-{{ $product_value->id }}"
                                                tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Thông báo</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Đồng ý xóa sản phẩm</div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">
                                                                Đóng
                                                            </button>
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="event.preventDefault();document.getElementById('delete-form-{{ $product_value->id }}').submit()">Xóa</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                             @endif
                                        @endforeach

                                    </tbody>
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






    {{-- Modal --}}

    <!-- /.card -->
@endsection
