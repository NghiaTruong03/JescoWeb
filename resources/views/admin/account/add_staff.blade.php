@extends('admin.master')

@section('title')
    <title>Tạo tài khoản nhân viên</title>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6 mx-auto">
                    <h1>Tạo tài khoản nhân viên</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('account.storeStaff')}}" method="POST" role="form">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Tên</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" class="form-control" name="name">
                                        @error('name')
                                        <span style="color: red" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Email</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="email" class="form-control" name="email">
                                        @error('email')
                                        <span style="color: red" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Mật khẩu</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="password" class="form-control" name="password">
                                        @error('password')
                                        <span style="color: red" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Số điện thoại</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="tel" class="form-control" name="phoneNumber">
                                        @error('phoneNumber')
                                        <span style="color: red" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Địa chỉ</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" class="form-control" name="address">
                                        @error('address')
                                        <span style="color: red" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Avatar</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <div class="custom-file">
                                            <input type="file" name="avatar" class="" id="validatedCustomFile">
                                            <label class="custom-file-label" for="validatedCustomFile">Choose
                                                file...</label>
                                        </div>
                                        <img class="img-fluid mb-3" style="width:400px;object-fit:cover" src=""
                                            id="previewImage">
                                        @error('image')
                                        <span style="color: red" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Chức vụ</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <select class="form-control" name="role">
                                            <option value="2">Nhân viên quản lý đơn</option>
                                            <option value="3">Nhân viên quản lý kho</option>
                                        </select>
                                        {{-- <div class="form-check radio">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="role" id="input" value="2"></label>
                                        </div>
                                        <div class="form-check radio">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="role" id="input" value="3">Nhân viên quản lý kho</label>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary float-right">Submit</button>
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
</div>
@endsection
