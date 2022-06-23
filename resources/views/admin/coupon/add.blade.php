@extends('admin.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6 mx-auto">
                    <h1>Thêm mới mã giảm giá</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('coupon.store')}}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" class="form-control" name="coupon_name">
                                        @error('coupon_name')
                                        <span style="color: red" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Loại giảm giá</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <div class="form-check radio">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="coupon_type" id="input"
                                                    value="0">
                                                Giảm giá theo giá tiền (vnđ)
                                            </label>
                                        </div>
                                        <div class="form-check radio">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="coupon_type" id="input"
                                                    value="1">
                                                Giảm giá theo phần trăm (%)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Mức giảm giá</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" class="form-control" name="coupon_value">
                                        @error('coupon_value')
                                        <span style="color: red" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Mã giảm giá</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" class="form-control" name="coupon_code">
                                        @error('coupon_value')
                                        <span style="color: red" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Số lượng</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="number" class="form-control" name="coupon_quantity">
                                        @error('coupon_quantity')
                                        <span style="color: red" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary float-right">Thêm mới</button>
                                    </div>
                                </div>
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

@endsection
