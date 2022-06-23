@extends('shop_pages.master')
@section('content')

<!-- Cart area start -->
<div class="empty-cart-area pb-100px pt-100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="empty-text-contant text-center">
                    <i class="pe-7s-check"></i>
                    <h2>Chúc mừng! Bạn đã đặt hàng thành công!</h2>
                    <a class="empty-cart-btn" href="{{ route("shop.index") }}">
                        <i class="fa fa-arrow-left"> </i> Tiếp tục mua sắm</a>
                    <a class="empty-cart-btn" href="{{ route("user.profile") }}">
                        Xem lịch sử mua hàng <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart area end -->

@endsection
