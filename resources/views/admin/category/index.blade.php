@extends('admin.master')

@section('content')






<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách danh mục</h1>
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
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tên danh mục</th>
                                        <th scope="col">Số sản phẩm</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($category as $category_value)
                                    <tr>
                                        <th scope="row" style="width: 100px">{{$category_value->id}}</th>
                                        <td>{{ $category_value->name }}</td>
                                        @php
                                        $count = 0;
                                        foreach ($product as $product_value) {
                                          if($product_value->category_id == $category_value->id){
                                            $count++;
                                          }
                                        }
                                        @endphp
                                        <td>{{$count}}</td>
                                        <td>
                                            @if ($category_value->status == 1)
                                            <span class="label label-success">Hiển thị</span>
                                            @else
                                            <span class="label label-danger">Đang ẩn</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form id="delete-form-{{$category_value->id}}"
                                                action="{{ route('category.destroy',$category_value->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-md"
                                                    href="{{route('category.edit',$category_value->id)}}"><i
                                                        class="nav-icon far fa-edit"></i></a>
                                                <button type="button" class="btn btn-md"><i
                                                        class="nav-icon fas fa-times" data-toggle="modal"
                                                        data-target="#modal-delete-{{$category_value->id}}"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-delete-{{$category_value->id}}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Thông báo</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Đồng ý xóa danh mục?</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Đóng
                                                    </button>
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="event.preventDefault();document.getElementById('delete-form-{{$category_value->id}}').submit()">Xóa</button>
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
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('category.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Điên tên danh mục" name="name"
                                        value={{old("name")}}>
                                    @error('name')
                                    <span style="color: red" role="alert">
                                        {{$message}}
                                    </span>
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
                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                            </form>
                        </div>

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
