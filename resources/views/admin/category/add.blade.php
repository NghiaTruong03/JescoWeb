@extends('admin.master')

@section('content')






<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm mới danh mục sản phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <form action="{{route('category.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Điên tên danh mục" name="name" value={{old("name")}}>
                        @error('name')
                            <span style="color: red" role="alert">
                                {{$message}}
                            </span>
                        @enderror
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="input" value="1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Hiện
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="input" value="2">
                    <label class="form-check-label" for="exampleRadios2">
                        Ẩn
                    </label>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- jQuery -->




@endsection
