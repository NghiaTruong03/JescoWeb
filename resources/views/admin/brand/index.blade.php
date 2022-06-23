@extends('admin.master')
@section('title')
<title>Quản lí nhãn hiệu</title>
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách nhãn hiệu sản phẩm</h1>
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
                <div class="col-md-12">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>{{session('success')}}</strong>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card ">
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped custom-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên nhãn hiệu</th>
                                                <th>Số sản phẩm</th>
                                                <th>Trạng thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($brand as $brand_value )
                                            <tr>
                                                <td style="width: 100px">{{$brand_value->id}}</td>
                                                <td>{{$brand_value->name}}</td>
                                                @php
                                                    $count = 0;
                                                    foreach ($product as $product_value) {
                                                        if($product_value->brand_id == $brand_value->id){
                                                            $count++;
                                                        }
                                                    }
                                                @endphp
                                                <td>{{$count}}</td>
                                                <td> 
                                                    @if ($brand_value->status == 1)
                                                    <span class="badge bg-success">Hiện</span>
                                                    @else
                                                    <span class="badge bg-danger">Ẩn</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('brand.destroy',$brand_value->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a class="btn btn-md" href="{{route('brand.edit',$brand_value->id)}}">
                                                            <i class="nav-icon far fa-edit"></i></a>
                                                        <button type="submit" class="btn btn-md">
                                                            <i class="nav-icon fas fa-times"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('brand.store')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên nhãn hiệu</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Điền tên nhãn hiệu"
                                                name="name" value={{old("name")}}>
                                            @error('name')
                                            <span style="color: red" role="alert">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="input" value="1" checked>
                                            <label class="form-check-label" for="exampleRadios1">Hiện</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="input" value="2">
                                            <label class="form-check-label" for="exampleRadios2">Ẩn</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-3">Thêm mới</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <!-- /.card -->
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




@endsection
