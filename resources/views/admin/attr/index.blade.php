@extends('admin.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
                <div class="row">
                  <div class="col-6-md">
                    <form action="{{ Route('attr.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thuộc tính</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kiểu giá trị</label>
                            <select class="form-control" name="type" id="">
                                <option value="1">Số</option>
                                <option value="2">Chữ</option>
                                <option value="3">Màu</option>
                                <option value="4">Ngày</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                  <!-- /.col -->
                  <div class="col-12">
                    <table  style="  text-align: center;
                                    vertical-align: middle;" 
                            class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên thuộc tính</th>
                                <th scope="col">Option</th>
                                <th scope="col">Giá trị</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attr as $attrValue)
                            <tr>
                                <td scope="row">{{ $loop->index+1 }}</td>
                                <td>{{ $attrValue->name }}</td>
                                <td>
                                    @foreach($attrValue->values as $data)
                                    @if($attrValue->type == 3)
                                    <span style="background: {{$data->value}}; color: {{$data->value}}">[4]</span>
                                    @else
                                    <span>{{$data->value}}</span>
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                 
                                  <form action="{{Route('attr.destroy',$attrValue->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-md" href="{{ route('attr.show',$attrValue->id) }}">
                                      <i class="nav-icon fas fa-plus"></i>
                                    </a>
                                    <a class="btn btn-md" href="{{route('attr.edit',$attrValue->id)}}">
                                      <i class="nav-icon fas fa-edit"></i>
                                    </a>
                                    <button type="submit" class="btn btn-md">  
                                      <i class="nav-icon fas fa-times"></i>
                                    </button>
                                  </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- /.card -->
                  </div>
                
                </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- jQuery -->




@endsection
