@extends('admin.master')

@section('title')
    <title>Sửa thông tin tài khoản</title>
@endsection

@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6 mx-auto">
                    <h1>Sửa thông tin tài khoản #{{ $user_account->id }}</h1>
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
                            <form action="{{route('account.edit.user',$user_id)}}" method="POST" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                {{ method_field('put') }}
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Tên</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="text" class="form-control" name="name" value="{{$user_account->name}}">
                                        @error('name')
                                        <span style="color: red" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Tài khoản email</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input type="email" class="form-control" name="email" value="{{$user_account->email}}">
                                        @error('email')
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
                                        <input type="tel" class="form-control" name="phoneNumber" value="{{$user_account->phoneNumber}}">
                                        @error('phoneNumber')
                                        <span style="color: red" role="alert">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                @if($user_account->role==2 || $user_account->role==3)
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Chức vụ</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <div class="form-check radio">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="role" id="input"
                                                    value="2" {{($user_account->role==2)?'checked':''}}>
                                                Nhân viên kinh doanh
                                            </label>
                                        </div>
                                        <div class="form-check radio">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="role" id="input"
                                                    value="3" {{($user_account->role==3)?'checked':''}}>
                                                Nhân viên kho
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($user_account->role==0)
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="">Trạng thái</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <div class="form-check radio">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status" id="input"
                                                    value="1" {{($user_account->deleted_at)?'checked':''}}>
                                                Khóa
                                            </label>
                                        </div>
                                        <div class="form-check radio">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status" id="input"
                                                    value="2" {{(!$user_account->deleted_at)?'checked':''}}>
                                                Hoạt Động
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary float-right">Lưu</button>
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
