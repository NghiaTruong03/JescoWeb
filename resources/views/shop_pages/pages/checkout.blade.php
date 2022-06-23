@extends('shop_pages.master')
@section('content')
    <!-- checkout area start -->
    <div class="checkout-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('checkout.add.order', ['id' => Auth::user()->id]) }}"
                        id="payment-form">
                        @csrf
                        <div class="billing-info-wrap">
                            <h3>Thông tin người nhận hàng</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Họ và Tên</label>
                                        <input type="text" name="order_name" value="{{ Auth::user()->name }}" />
                                        @error('order_name')
                                        <span style="color: red" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Số điện thoại</label>
                                        <input type="tel" name="order_phone" value="{{ Auth::user()->phoneNumber }}" />
                                        @error('order_phone')
                                            <span style="color: red" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-8">
                                    <div class="billing-info mb-4">
                                        <label>Địa chỉ Email</label>
                                        <input type="email" name="order_email" value="{{ Auth::user()->email }}" />
                                        @error('order_email')
                                            <span style="color: red" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-8">
                                    <div class="billing-info mb-4">
                                        <label>Địa chỉ nhận hàng</label>
                                        <input type="text" name="order_address" value="{{ Auth::user()->address }}" />
                                        @error('order_address')
                                            <span style="color: red" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="additional-info-wrap">
                                <h4>Thông tin thêm</h4>
                                <div class="additional-info">
                                    <label>Lời nhắn</label>
                                    <textarea placeholder="Lưu ý cho người bán..." name="order_note"></textarea>                                  
                                </div>
                            </div>
                        </div>

                </div>

                <div class="col-lg-6 mt-md-30px mt-lm-30px ">
                    <div class="your-order-area">
                        <h3>Đơn hàng của bạn</h3>
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-product-info">
                                <div class="your-order-top">
                                    <ul>
                                        <li>Sản phẩm</li>
                                        <li>Số tiền</li>
                                    </ul>
                                </div>
                                <div class="your-order-middle">
                                    <ul>
                                        <li>
                                           @php
                                                $grand_total = 0;
                                            @endphp 
                                            @foreach ($cartDetails as $item)
                                                @php
                                                    $grand_total += $item->total;
                                                @endphp
                                                <li>
                                                    <span class="order-middle-left">{{ $item->product->name }} x {{ $item->quantity }}</span>
                                                    <span class="order-price">₫
                                                        @if($item->product->sale_price == null)
                                                        {{number_format($item->product->price * $item->quantity,0,',','.') }}</span>
                                                        @else
                                                        {{number_format($item->product->sale_price * $item->quantity,0,',','.') }}</span>
                                                        @endif
                                                </li>
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                                <div class="your-order-total">
                                    <ul>       
                                        <li class="order-total">Tổng tiền</li>
                                        <li>₫ {{ number_format($cart->order_total,0,',','.') }}</li>
                                    </ul>
                                </div>
                                
                                <div class="your-order-bottom">
                                    <ul>
                                        <li class="your-order-shipping">Phí vận chuyển</li>
                                        <li>Miễn phí vận chuyển</li>
                                    </ul>
                                </div>
                                @if(Session::get('coupon_checked'))
                                    <div class="your-order-bottom">
                                        <ul>
                                            <li class="your-order-shipping">Mã khuyến mãi</li>
                                            <li>Đã áp dụng</li>
                                        </ul>
                                    </div>
                                @else
                                    <div class="your-order-bottom">
                                        <ul>
                                            <li class="your-order-shipping">Mã khuyến mãi</li>
                                            <li>Chưa áp dụng</li>
                                        </ul>
                                    </div>
                                @endif
                                @if($cart->order_totalDiscount != null)
                                <div class="your-order-total">
                                    <ul>       
                                        <li class="order-total">Giảm giá</li>
                                        <li>-₫ {{ number_format($cart->order_total - $cart->order_totalDiscount,0,',','.') }}</li>
                                    </ul>
                                </div>
                                @endif
                                <div class="your-order-total">
                                    <ul>       
                                        <li class="order-total">Thanh toán</li>
                                        <li>₫ {{ number_format($order_total,0,',','.') }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion element-mrg">
                                    <div id="faq" class="panel-group">
                                        {{-- <div class="title-wrap">
                                            <h5 class="cart-bottom-title section-bg-gray">Mã giảm giá</h5>
                                        </div>
                                        <div class="discount-code">
                                            <p>Nhập mã giảm giá tại đây</p>
                                            <form method="POST" action="{{route('check_coupon')}}">
                                                @csrf
                                                <input type="text" required="" name="coupon"/>
                                                <button class="btn" type="submit">Áp dụng</button>
                                                <a onclick="document.getElementById('coupon_form').submit();" class="btn">Áp dụng</a>
                                            </form>
                                        </div> --}}
                                        {{-- <div class="panel panel-default single-my-account m-0">
                                            <div class="panel-heading my-account-title">
                                                <h4 class="panel-title"><a data-bs-toggle="collapse" href="#my-account-1"
                                                        class="collapsed" aria-expanded="true">Direct bank transfer</a>
                                                </h4>
                                            </div>
                                            <div id="my-account-1" class="panel-collapse collapse show"
                                                data-bs-parent="#faq">

                                                <div class="panel-body">
                                                    <p>Please send a check to Store Name, Store Street, Store Town,
                                                        Store State / County, Store Postcode.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default single-my-account m-0">
                                            <div class="panel-heading my-account-title">
                                                <h4 class="panel-title"><a data-bs-toggle="collapse" href="#my-account-2"
                                                        aria-expanded="false" class="collapsed">Check payments</a></h4>
                                            </div>
                                            <div id="my-account-2" class="panel-collapse collapse" data-bs-parent="#faq">

                                                <div class="panel-body">
                                                    <p>Please send a check to Store Name, Store Street, Store Town,
                                                        Store State / County, Store Postcode.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default single-my-account m-0">
                                            <div class="panel-heading my-account-title">
                                                <h4 class="panel-title"><a data-bs-toggle="collapse"
                                                        href="#my-account-3">Cash on delivery</a></h4>
                                            </div>
                                            <div id="my-account-3" class="panel-collapse collapse" data-bs-parent="#faq">

                                                <div class="panel-body">
                                                    <p>Please send a check to Store Name, Store Street, Store Town,
                                                        Store State / County, Store Postcode.</p>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Place-order mt-25">
                            <h4>Chọn hình thức thanh toán:</h4>
                            <button class="btn checkout_btn" type="submit" id='cua-dat-hang'>Thanh toán COD</button>
                            <a style="color:#fff" onclick="document.getElementById('momo_form').submit();" class="btn checkout_btn mt-2 payment" name="payUrl">Thanh toán MoMo</a>
                            <a style="color:#fff" onclick="document.getElementById('vnpay_form').submit();" class="btn checkout_btn mt-2 payment" name="redirect">Thanh toán VNPay</a>
                            
                            {{-- <a onclick="document.getElementById('momo_form').submit();" class="payment" name="payUrl"><img src="{{ url('assets/shop_pages/assets') }}/images/logo/momo.png" alt=""></a> --}}
                            {{-- <a onclick="document.getElementById('vnpay_form').submit();" class="payment" name="redirect"><img src="{{ url('assets/shop_pages/assets') }}/images/logo/vnpay.png" alt=""></a> --}}
                            {{-- <a type="submit" class="btn-hover" href="{{route('checkout.add.order',['id' => Auth::user()->id])}}">Đặt hàng</a> --}}
                        </div>
                    </div>
                </div>
                </form>
                <form action="{{url('vnpay_payment')}}" method="POST" id="vnpay_form">
                    @csrf
                    <input type="hidden" name="total_vnpay" value="{{$order_total}}">
                    <input type="hidden" name="redirect" value="redirect">
                    <input type="hidden" name="order_name" value="{{ Auth::user()->name }}" />
                    <input type="hidden" name="order_phone" value="{{ Auth::user()->phoneNumber }}" />
                    <input type="hidden" name="order_email" value="{{ Auth::user()->email }}" />
                    <input type="hidden" name="order_address" value="{{ Auth::user()->address }}" />
                    <input type="hidden" name="order_note" value="" />
                </form>
                {{-- <a href="{{route('momo_payment')}}" class="btn-hover checkout_btn" type="submit" name="redirect">MÔMO</a> --}}
                <form action="{{url('momo_payment')}}" method="POST" id="momo_form">
                    @csrf
                    <input type="hidden" name="total_momo" value="{{$order_total }}" >
                    <input type="hidden" name="payUrl" value="payUrl">
                    <input type="hidden" name="order_name" value="{{ Auth::user()->name }}" />
                    <input type="hidden" name="order_phone" value="{{ Auth::user()->phoneNumber }}" />
                    <input type="hidden" name="order_email" value="{{ Auth::user()->email }}" />
                    <input type="hidden" name="order_address" value="{{ Auth::user()->address }}" />
                    <input type="hidden" name="order_note" value="" /> 
                </form>

                <form action="{{route('check_coupon')}}" method="POST"  id="coupon_form">
                    @csrf
                    <input type="hidden" name="coupon" value="" >                 
                </form>

            </div>
        </div>
    </div>
    <!-- checkout area end -->
@endsection
@push('scripts')
    <script>

    </script>
@endpush
