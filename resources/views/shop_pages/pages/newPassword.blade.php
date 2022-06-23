@extends('shop_pages.master');
@section('content')
<div class="login-register-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-bs-toggle="tab" href="#lg1">
                            <h4>Quên mật khẩu</h4>
                        </a>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                    @endif
                    @if (session('requireLogin'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"
                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{!! session('requireLogin') !!}</strong>
                    </div>
                    @endif
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="" method="POST">
                                        @csrf
                                        <input type="email" name="email" placeholder="Nhập email" />
                                            @error('email')
                                            <span style="color: red" role="alert">
                                                {{$message}}
                                            </span>
                                            @enderror
                                        <input type="password" name="newPassword" placeholder="Nhập mật khẩu mới" />
                                            @error('password')
                                            <span style="color: red" role="alert">
                                                {{$message}}
                                            </span>
                                            @enderror
                                        <input type="email" name="confirm_newPassword" placeholder="Nhập lại mật khẩu" />
                                            @error('password')
                                            <span style="color: red" role="alert">
                                                {{$message}}
                                            </span>
                                            @enderror
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                {{-- <input type="checkbox" />
                                                <a class="flote-none" href="javascript:void(0)">Ghi nhớ</a>
                                                <a href="#">Quên mật khẩu?</a> --}}
                                            </div>
                                            <button type="submit"><span>Xác nhận</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection