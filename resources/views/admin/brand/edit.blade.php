@extends('admin.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6 mx-auto">
                    <h1>Sửa thông tin nhãn hiệu</h1>
                </div>
            </div>
        </div>
    <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{Route('brand.update',$brand->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên nhãn hiệu</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                                        value="{{$brand->name}}">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="input" value="1" {{$brand->status==1?'checked':''}}>
                                    <label class="form-check-label" for="exampleRadios1">Hiện</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="input" value="2" {{$brand->status==2?'checked':''}}>
                                    <label class="form-check-label" for="exampleRadios2">Ẩn</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
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
