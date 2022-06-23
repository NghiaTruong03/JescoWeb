<!-- Footer Area Start -->
<div class="footer-area">
    <div class="footer-container">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <!-- Start single blog -->
                    <div class="col-md-6 col-lg-3 mb-md-30px mb-lm-30px">
                        <div class="single-wedge">
                            <div class="footer-logo">
                                <a href="index.html"><img src="{{ url('assets/shop_pages/assets') }}/images/logo/logo-white.png" alt=""></a>
                            </div>
                            <p class="about-text">Website thương mại điện tử 
                            </p>
                            <ul class="link-follow">
                                <li><a class="m-0" title="Twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a title="Tumblr" href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
                                <li><a title="Facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a title="Instagram" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <!-- Start single blog -->
                    <div class="col-md-3 col-sm-6 col-lg-3 mb-md-30px mb-lm-30px pl-lg-50px">
                        <div class="single-wedge">
                            <h4 class="footer-herading">Về Jesco</h4>
                            <div class="footer-links">
                                <div class="footer-row">
                                    <ul class="align-items-center">
                                        <li class="li"><a class="single-link" href="#">Thông tin</a></li>
                                        <li class="li"><a class="single-link" href="#">Danh sách cửa hàng</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <!-- Start single blog -->
                    <div class="col-md-3 col-lg-3 col-sm-6 mb-lm-30px pl-lg-50px">
                        <div class="single-wedge">
                            <h4 class="footer-herading">Trợ giúp</h4>
                            <div class="footer-links">
                                <div class="footer-row">
                                    <ul class="align-items-center">
                                        <li class="li"><a class="single-link" href="">FAQ</a></li>
                                        <li class="li"><a class="single-link" href="">Chính sách trả hàng</a></li>
                                        <li class="li"><a class="single-link" href="">Chính sách bảo mật</a></li>
                                        <li class="li"><a class="single-link" href="">Tiếp cận</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <!-- Start single blog -->
                    {{-- <div class="col-md-3 col-lg-2 col-sm-6 mb-lm-30px pl-lg-50px">
                        <div class="single-wedge">
                            <h4 class="footer-herading">Company</h4>
                            <div class="footer-links">
                                <div class="footer-row">
                                    <ul class="align-items-center">
                                        <li class="li"><a class="single-link" href="index.html">Jesco</a>
                                        </li>
                                        <li class="li"><a class="single-link"
                                                href="shop-left-sidebar.html">Shop</a></li>
                                        <li class="li"><a class="single-link" href="contact.html">Contact
                                                us</a></li>
                                        <li class="li"><a class="single-link" href="login.html">Log
                                                in</a></li>
                                        <li class="li"><a class="single-link" href="#">Help</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- End single blog -->
                    <!-- Start single blog -->
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="single-wedge">

                            <h4 class="footer-herading">Thông tin cửa hàng</h4>
                            <div class="footer-links">
                                <!-- News letter area -->
                                <p class="address">54 P. Triều Khúc, Thanh Xuân Nam<br>
                                    Thanh Xuân, Hà Nội, Việt Nam</p>
                                <p class="phone">SĐT/Fax:<a href="tel:0123456789">0923019015</a></p>
                                <p class="mail">Email:<a href="mailto:truongnghia6200@gmail.com">truongnghia6200@gmail.com</a></p>
                                <img src="{{ url('assets/shop_pages/assets') }}/images/icons/payment.png" alt="" class="payment-img img-fulid">

                                <!-- News letter area  End -->
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                </div>
            </div>
        </div>
        {{-- <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="copy-text"> © 2021 <strong>Jesco</strong> Made With <i class="fa fa-heart"
                                aria-hidden="true"></i> By <a class="company-name" href="https://hasthemes.com/">
                                <strong> HasThemes</strong></a>.</p>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
<!-- Footer Area End -->

<!-- Search Modal Start -->
<div class="modal popup-search-style" id="searchActive">
    <button type="button" class="close-btn" data-bs-dismiss="modal"><span
            aria-hidden="true">&times;</span></button>
    <div class="modal-overlay">
        <div class="modal-dialog p-0" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h2>Tìm kiếm</h2>
                    <form action="{{ route('search') }}" class="navbar-form position-relative" role="search" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Nhập từ khóa tìm kiếm...">
                        </div>
                        <button type="submit" class="submit-btn"><i class="pe-7s-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search Modal End -->

<!-- Login Modal Start -->
<div class="modal popup-login-style" id="loginActive">
    <button type="button" class="close-btn" data-bs-dismiss="modal"><span
            aria-hidden="true">&times;</span></button>
    <div class="modal-overlay">
        <div class="modal-dialog p-0" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="login-content">
                        <h2>Đăng nhập</h2>
                        <h3>Đăng nhập bằng tài khoản của bạn</h3>
                        <form action="{{ route('login') }}" method="POST" id="validate-loginActive" >
                            @csrf
                            <input type="email" name="email" placeholder="Tài khoản Email" value={{old('email')}}>
                            <span class="text-danger error-text email_error"></span>

                            <input type="password" name="password" placeholder="Mật khẩu">
                            <span class="text-danger error-text password_error"></span>
                            
                            <div class="remember-forget-wrap">
                                <div class="remember-wrap">
                                    <input type="checkbox">
                                    <p>Ghi nhớ</p>
                                    <span class="checkmark"></span>
                                </div>
                                <div class="forget-wrap">
                                    <a href="{{route('pass_reset')}}">Quên mật khẩu</a>
                                </div>
                            </div>
                            <button type="submit">Đăng nhập</button>
                            <div class="member-register">
                                <p> Chưa có tài khoản? <a href="{{ route('signin.index') }}"> Đăng ký</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Modal End -->

<!-- Modal -->
{{-- <div class="modal modal-2 fade" id="modal-quickview-{{$product_value->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                        <!-- Swiper -->
                        <div class="swiper-container zoom-top">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto"
                                        src="assets/images/product-image/zoom-image/1.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto"
                                        src="assets/images/product-image/zoom-image/2.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto"
                                        src="assets/images/product-image/zoom-image/3.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto"
                                        src="assets/images/product-image/zoom-image/4.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-container zoom-thumbs mt-3 mb-3">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto"
                                        src="assets/images/product-image/small-image/1.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto"
                                        src="assets/images/product-image/small-image/2.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto"
                                        src="assets/images/product-image/small-image/3.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto"
                                        src="assets/images/product-image/small-image/4.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-details-content quickview-content">
                            <h2>{{ $product_value->name}}</h2>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">$18.90</li>
                                </ul>
                            </div>
                            <div class="pro-details-rating-wrap">
                                <div class="rating-product">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <span class="read-review"><a class="reviews" href="#">( 5 Customer Review
                                        )</a></span>
                            </div>
                            <p class="mt-30px mb-0">Lorem ipsum dolor sit amet, consect adipisicing elit, sed do
                                eiusmod tempor incidi ut labore
                                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita ullamco
                                laboris nisi
                                ut aliquip ex ea commodo </p>
                            <div class="pro-details-quality">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                </div>
                                <div class="pro-details-cart">
                                    <button class="add-cart" href="#"> Add To
                                        Cart</button>
                                </div>
                                <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                    <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                                </div>
                                <div class="pro-details-compare-wishlist pro-details-compare">
                                    <a href="compare.html"><i class="pe-7s-refresh-2"></i></a>
                                </div>
                            </div>
                            <div class="pro-details-sku-info pro-details-same-style  d-flex">
                                <span>SKU: </span>
                                <ul class="d-flex">
                                    <li>
                                        <a href="#">Ch-256xl</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pro-details-categories-info pro-details-same-style d-flex">
                                <span>Categories: </span>
                                <ul class="d-flex">
                                    <li>
                                        <a href="#">Fashion.</a>
                                    </li>
                                    <li>
                                        <a href="#">eCommerce</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pro-details-social-info pro-details-same-style d-flex">
                                <span>Share: </span>
                                <ul class="d-flex">
                                    <li>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-google"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-youtube"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Modal end -->

<!-- Use the minified version files listed below for better performance and remove the files listed above -->
@stack('scripts')
<script src="{{ url('assets/shop_pages/assets') }}/js/vendor/vendor.min.js"></script>
<script src="{{ url('assets/shop_pages/assets') }}/js/plugins/plugins.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ url('assets/shop_pages/assets/js/plugins/jquery.min.js') }}"></script>
<!-- Main Js -->
<script src="{{ url('assets/shop_pages/assets') }}/js/main.js"></script>
<script src="{{ url('js/homepage.js') }}"></script>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace( 'editor1' );
</script>

    
