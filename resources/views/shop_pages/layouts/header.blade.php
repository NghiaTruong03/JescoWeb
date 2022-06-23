<!-- Header Area Start -->
<header>
    <div class="cua-none" id="loader">
    </div>
    <div class="header-main sticky-nav ">
        <div class="container position-relative">
            <div class="row">
                <div class="col-auto align-self-center">
                    <div class="header-logo">
                        <a href="{{ route('shop.index') }}"><img
                                src="{{ url('assets/shop_pages/assets') }}/images/logo/logo.png"
                                alt="Site Logo" /></a>
                    </div>
                </div>
                <div class="col align-self-center d-none d-lg-block">
                    <div class="main-menu">
                        <ul>
                            <li class="dropdown"><a href="{{ route('shop.index') }}">Home</a>
                                {{-- <ul class="sub-menu">
                                        <li><a href="index.html">Home 1</a></li>
                                        <li><a href="index-2.html">Home 2</a></li>
                                    </ul> --}}
                            </li>
                            {{-- <li class="dropdown position-static"><a href="#">Shop <i class="pe-7s-angle-down"></i></a>
                                 <ul class="mega-menu d-block">
                                        <li class="d-flex">
                                            <ul class="d-block">

                                            <li class="title"><a href="#">Shop Page</a></li>
                                            <li><a href="shop-3-column.html">Shop 3 Column</a></li>
                                            <li><a href="shop-4-column.html">Shop 4 Column</a></li>
                                            <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                            <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                            <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a>
                                            </li>
                                            <li><a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a>
                                            </li>
                                        </ul>
                                        <ul class="d-block">
                                            <li class="title"><a href="#">product Details Page</a></li>
                                            <li><a href="single-product.html">Product Single</a></li>
                                            <li><a href="single-product-variable.html">Product Variable</a></li>
                                            <li><a href="single-product-affiliate.html">Product Affiliate</a></li>
                                            <li><a href="single-product-group.html">Product Group</a></li>
                                            <li><a href="single-product-tabstyle-2.html">Product Tab 2</a></li>
                                            <li><a href="single-product-tabstyle-3.html">Product Tab 3</a></li>
                                        </ul>
                                        <ul class="d-block">
                                            <li class="title"><a href="#">Single Product Page</a></li>
                                            <li><a href="single-product-slider.html">Product Slider</a></li>
                                            <li><a href="single-product-gallery-left.html">Product Gallery Left</a>
                                            </li>
                                            <li><a href="single-product-gallery-right.html">Product Gallery
                                                    Right</a>
                                            </li>
                                            <li><a href="single-product-sticky-left.html">Product Sticky Left</a>
                                            </li>
                                            <li><a href="single-product-sticky-right.html">Product Sticky Right</a>
                                            </li>
                                        </ul>
                                        <ul class="d-block">
                                            <li class="title"><a href="#">Other Shop Pages</a></li>
                                            <li><a href="cart.html">Cart Page</a></li>
                                            <li><a href="checkout.html">Checkout Page</a></li>
                                            <li><a href="compare.html">Compare Page</a></li>
                                            <li><a href="wishlist.html">Wishlist Page</a></li>
                                            <li><a href="my-account.html">Account Page</a></li>
                                            <li><a href="{{ Route('signin.index') }}">Login & Register Page</a>
                            </li>
                        </ul>
                        <ul class="d-block">
                            <li class="title"><a href="#">Pages</a></li>
                            <li><a href="404.html">404 Page</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="faq.html">Faq Page</a></li>
                            <li><a href="coming-soon.html">Coming Soon Page</a></li>

                        </ul>
                        </li>
                        <li>
                            <ul class="menu-banner w-100">
                                <li>
                                    <a class="p-0" href="shop-left-sidebar.html"><img class="img-responsive w-100"
                                            src="assets/images/banner/7.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a class="p-0" href="shop-left-sidebar.html"><img class="img-responsive w-100"
                                            src="assets/images/banner/8.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a class="p-0" href="shop-left-sidebar.html"><img class="img-responsive w-100"
                                            src="assets/images/banner/9.jpg" alt=""></a>
                                </li>
                            </ul>
                        </li>
                        </ul>
                        </li> --}}
                            <li class="dropdown "><a href="#">Danh mục<i class="pe-7s-angle-down"></i></a>
                                <ul class="sub-menu">
                                    @foreach ($all_category as $category_value)
                                        <li><a
                                                href="{{ route('category.select', $category_value->id) }}">{{ $category_value->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Nhãn hiệu<i class="pe-7s-angle-down"></i></a>
                                <ul class="sub-menu">
                                    @foreach ($all_brand as $brand_value)
                                        <li><a
                                                href="{{ route('brand.select', $brand_value->id) }}">{{ $brand_value->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{ route('blog.index') }}">Bài viết</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Action Start -->
                <div class="col col-lg-auto align-self-center pl-0">
                    <div class="header-actions">
                        @if (Auth::user())
                            <ul>
                                <li class="dropdown login-btn username-custom"><a href="#">{{ Auth::user()->name }}<i
                                            class="pe-7s-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('user.profile') }}" class="header-action-btn login-btn">
                                                Thông tin cá nhân</a></li>
                                        @if (Auth::user()->role != 0)
                                            <li><a href="{{ route('admin.index') }}"
                                                    class="header-action-btn login-btn">
                                                    Trang quản trị</a></li>
                                        @endif
                                        <li><a href="{{ route('logout') }}" class="header-action-btn login-btn">
                                                <span>Đăng xuất</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        @endif
                        @if (!Auth::user())
                            <a href="{{ route('login') }}" class="header-action-btn login-btn" data-bs-toggle="modal"
                                data-bs-target="#loginActive">{{ Auth::user() ? Auth::user()->name : 'Đăng nhập' }}</a>
                        @endif
                        <!-- Single Wedge Start -->
                        <a href="#" class="header-action-btn" data-bs-toggle="modal" data-bs-target="#searchActive">
                            <i class="pe-7s-search"></i>
                        </a>
                        <!-- Single Wedge End -->
                        <!-- Single Wedge Start -->
                        @if (!Auth::user())
                            <a onclick="requireLogin()" class="header-action-btn">
                                <i class="pe-7s-like"></i>
                            </a>
                        @else
                            <a href="{{ route('wishlist.index') }}" class="header-action-btn">
                                <i class="pe-7s-like"></i>
                            </a>
                        @endif
                        <!-- Single Wedge End -->
                        @if (!Auth::user())
                            <a onclick="requireLogin()" class="header-action-btn header-action-btn-cart pr-0">
                                <i class="pe-7s-shopbag"></i>
                                <span class="header-action-num">0</span>

                            </a>
                        @else
                            <a href="{{ route('cart') }}" class="header-action-btn header-action-btn-cart pr-0">
                                <i class="pe-7s-shopbag"></i>
                                <span class="header-action-num">{{ $cart_count_product }}</span>

                            </a>
                        @endif
                        <a href="#offcanvas-mobile-menu"
                            class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                            <i class="pe-7s-menu"></i>
                        </a>
                    </div>
                    <!-- Header Action End -->
                </div>
            </div>
        </div>
        <div class="toasts position-fixed end-0 p-3" style="z-index: 11">
            <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-success">
                    <img src="{{ url('upload/toast.jpg') }}" class="rounded me-2"
                        style="width:20px; height: 20px; object-fit: cover;">
                    <strong class="me-auto text-white">Thông báo</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-light">
                    Thêm sản phẩm vào giỏ hàng thành công!
                </div>
            </div>
        </div>
</header>
<!-- Header Area End -->



<!-- OffCanvas Wishlist Start -->
<div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist">
    <div class="inner">
        <div class="head">
            <span class="title">Wishlist</span>
            <button class="offcanvas-close">×</button>
        </div>
        <div class="body customScroll">
            <ul class="minicart-product-list">
                {{-- <li>
                        <a href="single-product.html" class="image"><img
                                src="assets/images/product-image/1.jpg" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.html" class="title">Women's Elizabeth Coat</a>
                            <span class="quantity-price">1 x <span class="amount">$21.86</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li> --}}
            </ul>
        </div>
        <div class="foot">
            <div class="buttons">
                <a href="wishlist.html" class="btn btn-dark btn-hover-primary mt-30px">view wishlist</a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- OffCanvas Wishlist End -->
<!-- OffCanvas Cart Start -->
{{-- <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
    <div class="inner">
        <div class="head">
            <span class="title">Cart</span>
            <button class="offcanvas-close">×</button>
        </div>
        <div class="body customScroll">
            <ul class="minicart-product-list">
                @if (!empty($cartDetails))
                @foreach ($cartDetails as $item)
                <li>
                    <a href="single-product.html" class="image"><img src="{{ url('storage/' . $item->product->image) }}"
                            alt="Cart product Image"></a>
                    <div class="content">
                        <a href="{{ route('product_detail.show', $item->product->id) }}" class="title"
                            style="display: block;">{{ $item->product->name }}</a>
                        <span class="quantity-price" data-product_id="{{ $item->product->id }}"
                            data-quantity="{{ $item->quantity }}" id="quantity-product-{{ $item->product->id }}"
                            style="display: inline;">{{ $item->quantity }}</span>
                        <span class="amount"> x {{ $item->product->price }}</span>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
        <div class="foot">
            <div class="buttons mt-30px">
                <a href="" class="btn btn-dark btn-hover-primary mb-30px">Giỏ hàng</a>
            </div>
        </div>
    </div>
</div> --}}
<!-- OffCanvas Cart End -->

<!-- OffCanvas Menu Start -->
<div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
    <button class="offcanvas-close"></button>

    <div class="inner customScroll">

        <div class="offcanvas-menu mb-4">
            <ul>
                <li><a href="{{ route('shop.index') }}"><span class="menu-text">Home</span></a>
                    {{-- <ul class="sub-menu">
                            <li><a href="index.html"><span class="menu-text">Home 1</span></a></li>
                            <li><a href="index-2.html"><span class="menu-text">Home 2</span></a></li>
                        </ul> --}}
                </li>
                <li><a href="#"><span class="menu-text">Shop</span></a>
                    <ul class="sub-menu">
                        {{-- <li>
                                <a href="#"><span class="menu-text">Shop Page</span></a>
                                <ul class="sub-menu">
                                    <li class="title"><a href="#">Shop Page</a></li>
                                    <li><a href="shop-3-column.html">Shop 3 Column</a></li>
                                    <li><a href="shop-4-column.html">Shop 4 Column</a></li>
                                    <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                    <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                    <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a></li>
                                    <li><a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a></li>
                                </ul>
                            </li>                           
                            <li>
                                <a href="#"><span class="menu-text">product Details Page</span></a>
                                <ul class="sub-menu">
                                    <li><a href="single-product.html">Product Single</a></li>
                                    <li><a href="single-product-variable.html">Product Variable</a></li>
                                    <li><a href="single-product-affiliate.html">Product Affiliate</a></li>
                                    <li><a href="single-product-group.html">Product Group</a></li>
                                    <li><a href="single-product-tabstyle-2.html">Product Tab 2</a></li>
                                    <li><a href="single-product-tabstyle-3.html">Product Tab 3</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="menu-text">Single Product Page</span></a>
                                <ul class="sub-menu">
                                    <li><a href="single-product-slider.html">Product Slider</a></li>
                                    <li><a href="single-product-gallery-left.html">Product Gallery Left</a>
                                    </li>
                                    <li><a href="single-product-gallery-right.html">Product Gallery Right</a>
                                    </li>
                                    <li><a href="single-product-sticky-left.html">Product Sticky Left</a></li>
                                    <li><a href="single-product-sticky-right.html">Product Sticky Right</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="menu-text">Other Shop Pages</span></a>
                                <ul class="sub-menu">
                                    <li><a href="cart.html">Cart Page</a></li>
                                    <li><a href="checkout.html">Checkout Page</a></li>
                                    <li><a href="compare.html">Compare Page</a></li>
                                    <li><a href="wishlist.html">Wishlist Page</a></li>
                                    <li><a href="my-account.html">Account Page</a></li>
                                    <li><a href="login.html">Login & Register Page</a></li>
                                    <li><a href="empty-cart.html">Empty Cart Page</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="menu-text">Pages</span></a>
                                <ul class="sub-menu">
                                    <li><a href="404.html">404 Page</a></li>
                                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="faq.html">Faq Page</a></li>
                                    <li><a href="coming-soon.html">Coming Soon Page</a></li>
                                </ul>
                            </li> --}}
                    </ul>
                </li>
                <li><a href="#"><span class="menu-text">Bài viết</span></a>
                    {{-- <ul class="sub-menu">
                            <li><a href="blog-grid.html">Blog Grid Page</a></li>
                            <li><a href="blog-grid-left-sidebar.html">Grid Left Sidebar</a></li>
                            <li><a href="blog-grid-right-sidebar.html">Grid Right Sidebar</a></li>
                            <li><a href="blog-single.html">Blog Single Page</a></li>
                            <li><a href="blog-single-left-sidebar.html">Single Left Sidebar</a></li>
                            <li><a href="blog-single-right-sidebar.html">Single Right Sidbar</a>
                        </ul> --}}
                </li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </div>
        <!-- OffCanvas Menu End -->
        <div class="offcanvas-social mt-auto">
            <ul>
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
<!-- OffCanvas Menu End -->
