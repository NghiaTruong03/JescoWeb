@extends('shop_pages.master')
@section('content')
<!-- Hero/Intro Slider Start -->
<div class="section ">
    <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
        <!-- Hero slider Active -->
        <div class="swiper-wrapper">
            <!-- Single slider item -->
            @foreach($banner as $banner_value)
            <div class="hero-slide-item-2 slider-height swiper-slide d-flex bg-color1">
                <div class="container align-self-center">
                    <div class="row">
                        <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5 align-self-center sm-center-view">
                            <div class="hero-slide-content hero-slide-content-2 slider-animated-1">
                                <span class="category">{{$banner_value->discount}}</span>
                                <h2 class="title-1">{{$banner_value->title}}</h2>
                                <a href="shop-left-sidebar.html" class="btn btn-lg btn-primary btn-hover-dark"> Mua
                                    ngay<i class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div
                            class="col-xl-6 col-lg-7 col-md-7 col-sm-7 d-flex justify-content-center position-relative">
                            <div class="show-case">
                                <div class="hero-slide-image">
                                    <img src="{{ url('storage/' . $banner_value->banner_img) }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Single slider item -->
            <div class="hero-slide-item-2 slider-height swiper-slide d-flex bg-color2">
                <div class="container align-self-center">
                    <div class="row">
                        <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5 align-self-center sm-center-view">
                            <div class="hero-slide-content hero-slide-content-2 slider-animated-1">
                                <span class="category">Sale 45% Off</span>
                                <h2 class="title-1">Exclusive New<br> Offer 2021</h2>
                                <a href="shop-left-sidebar.html" class="btn btn-lg btn-primary btn-hover-dark">Mua
                                    ngay<i class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div
                            class="col-xl-6 col-lg-7 col-md-7 col-sm-7 d-flex justify-content-center position-relative">
                            <div class="show-case">
                                <div class="hero-slide-image">
                                    <img src="{{url('assets/shop_pages/assets')}}/images/slider-image/slider-2-2.png" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Add Arrows -->
        <div class="swiper-buttons">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
<!-- Hero/Intro Slider End -->

<!-- Feature Area Srart -->
<div class="feature-area  mt-n-65px">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <!-- single item -->
                <div class="single-feature">
                    <div class="feature-icon">
                        <img src="{{ url('assets/shop_pages/assets') }}/images/icons/1.png" alt="">
                    </div>
                    <div class="feature-content">
                        <h4 class="title">Free Shipping</h4>
                        <span class="sub-title">Capped at $39 per order</span>
                    </div>
                </div>
            </div>
            <!-- single item -->
            <div class="col-lg-4 col-md-6 mb-md-30px mb-lm-30px mt-lm-30px">
                <div class="single-feature">
                    <div class="feature-icon">
                        <img src="{{ url('assets/shop_pages/assets') }}/images/icons/2.png" alt="">
                    </div>
                    <div class="feature-content">
                        <h4 class="title">Card Payments</h4>
                        <span class="sub-title">12 Months Installments</span>
                    </div>
                </div>
            </div>
            <!-- single item -->
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <div class="feature-icon">
                        <img src="{{ url('assets/shop_pages/assets') }}/images/icons/3.png" alt="">
                    </div>
                    <div class="feature-content">
                        <h4 class="title">Easy Returns</h4>
                        <span class="sub-title">Shop With Confidence</span>
                    </div>
                </div>
                <!-- single item -->
            </div>
        </div>
    </div>
</div>
<!-- Feature Area End -->

<!-- Product Area Start -->
<div class="product-area pt-100px pb-100px">
    <div class="container">
        <!-- Section Title & Tab Start -->
        <div class="row">
            <!-- Section Title Start -->
            <div class="col-12">
                <div class="section-title text-center mb-0">
                    <h2 class="title">Danh sách sản phẩm</h2>
                    <!-- Tab Start -->
                    <div class="nav-center">
                        <ul class="product-tab-nav nav align-items-center justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#tab-product--all">Tất cả</a>
                            </li>
                            @foreach ($all_category as $category_value)
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab"
                                    href="#tab-product--{{ $category_value->id }}">{{ $category_value->name }}</a>
                            </li>
                            @endforeach
                            {{-- <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                    href="#tab-product-men">Áo</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                    href="#tab-product-women">Mũ</a></li> --}}
                            {{-- <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                    href="#tab-product-kids">Kids</a></li> --}}
                        </ul>
                    </div>
                    <!-- Tab End -->
                </div>
            </div>
            <!-- Section Title End -->
        </div>
        <!-- Section Title & Tab End -->

        <div class="row">
            <div class="col">
                <div class="tab-content mb-30px0px">
                    <!-- 1st tab start -->
                    <div class="tab-pane fade show active" id="tab-product--all">
                        <div class="row">
                            @foreach ($all_product as $product_value)
                            <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                data-aos-delay="200">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="{{ Route('product_detail.show', $product_value->id) }}"
                                            class="image pro-img">
                                            <img src="{{ url('storage/' . $product_value->image) }}" />
                                            <img class="hover-image"
                                                src="{{ url('storage/' . $product_value->image) }}" />
                                        </a>
                                        <span class="badges">
                                            {{-- <span class="new"></span> --}}
                                            @if($product_value->sale_price > 0)
                                            <span class="sale">-{{ number_format((($product_value->price -
                                                $product_value->sale_price)/$product_value->price)*100,0) }}%</span>
                                            @endif
                                        </span>
                                        <div class="actions">
                                            @if(Auth::user())
                                            <a href="{{route('add_to_wishlist' , ['id' => $product_value->id]) }}"
                                                class="action wishlist add-to-wishlist" title="Wishlist">
                                                <i class="pe-7s-like"></i></a>
                                            @endif
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#modal-quickview-{{ $product_value->id }}">
                                                <i class="pe-7s-search"></i></a>
                                            {{-- <a href="" class="action compare" title="Compare">
                                                <i class="pe-7s-refresh-2"></i></a> --}}
                                        </div>
                                        @if($product_value->product_quantity == 0)
                                        <button title="Add To Cart" class="add-to-cart" disabled>Hết hàng </button>
                                        @elseif(!Auth::user())
                                        <button id="buyProduct" onclick="requireLogin()" title="Add To Cart"
                                            type="button" class="add-to-cart" data-id="">Mua ngay</button>
                                        @else
                                        <button title="Add To Cart" type="button" class="add-to-cart"
                                            data-id="{{$product_value->id}}">Mua ngay</button>
                                        @endif
                                        {{-- <a type="button" class="add-to-cart"
                                            href="{{route('add_to_cart',$product_value->id)}}">Mua
                                            hang</a> --}}
                                    </div>
                                    <div class="content">
                                        <span class="ratings">
                                            <span class="rating-wrap">
                                                <span class="star" style="width: 100%"></span>
                                            </span>
                                            <span class="rating-num">( 5 Đánh giá )</span>
                                        </span>
                                        <h5 class="title"><a
                                                href="{{ Route('product_detail.show', $product_value->id) }}">{{
                                                $product_value->name }}
                                            </a>
                                        </h5>
                                        @if($product_value->sale_price > 0)
                                        <span class="price">
                                            <span class="new">₫
                                                {{ number_format($product_value->sale_price,0,',','.') }}</span>
                                            <span class="old">₫
                                                {{ number_format($product_value->price,0,',','.') }}</span>
                                        </span>
                                        @else
                                        <span class="price">
                                            <span class="new">₫
                                                {{ number_format($product_value->price,0,',','.') }}</span>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!--Modal section-->
                            <div class="modal modal-2 fade" id="modal-quickview-{{ $product_value->id }}" tabindex="-1"
                                role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div
                                                    class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                                                    <!-- Swiper -->
                                                    <div class="swiper-container zoom-top">
                                                        <div class="swiper-wrapper">
                                                            <div class="swiper-slide">
                                                                <img class="img-responsive m-auto"
                                                                    src="{{ url('storage/' . $product_value->image) }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <img class="img-responsive m-auto"
                                                                    src="assets/images/product-image/zoom-image/2.jpg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="swiper-container zoom-thumbs mt-3 mb-3">
                                                        <div class="swiper-wrapper">
                                                            <div class="swiper-slide">
                                                                <img class="img-responsive m-auto"
                                                                    src="{{url('storage/'.$product_value->image)}}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up"
                                                    data-aos-delay="200">
                                                    <div class="product-details-content quickview-content">
                                                        <h2>{{ $product_value->name }}</h2>
                                                        <div class="pricing-meta">
                                                            <ul>
                                                                <li class="old-price not-cut">
                                                                    ₫ {{ number_format($product_value->price,0,',','.')
                                                                    }}</li>
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
                                                            <span class="read-review"><a class="reviews" href="#">( 5
                                                                    Đánh giá
                                                                    )</a></span>
                                                        </div>
                                                        <p class="mt-30px mb-0">Lorem ipsum dolor sit amet,
                                                            consect adipisicing elit, sed do
                                                            eiusmod tempor incidi ut labore
                                                            et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                            nostrud exercita ullamco
                                                            laboris nisi
                                                            ut aliquip ex ea commodo </p>
                                                        <div class="pro-details-quality">
                                                            <div class="cart-plus-minus">
                                                                <input class="cart-plus-minus-box" type="text"
                                                                    name="qtybutton" value="1" />
                                                            </div>
                                                            <div class="pro-details-cart">
                                                                {{-- <a
                                                                    href="{{ route('add_to_cart', ['id' => $product_value->id]) }}"
                                                                    title="Add To Cart" type="button"
                                                                    class=" add-cart">Mua ngay
                                                                </a> --}}
                                                                <button title="Add To Cart" type="button"
                                                                    class="add-to-cart"
                                                                    data-id="{{$product_value->id}}">Mua ngay
                                                                </button>
                                                            </div>
                                                            <div
                                                                class="pro-details-compare-wishlist pro-details-wishlist ">
                                                                <a href=""><i class="pe-7s-like"></i></a>
                                                            </div>
                                                            <div
                                                                class="pro-details-compare-wishlist pro-details-compare">
                                                                <a href=""><i class="pe-7s-refresh-2"></i></a>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="pro-details-sku-info pro-details-same-style  d-flex">
                                                            <span>ID:{{ $product_value->id }} </span>
                                                            <ul class="d-flex">
                                                                <li>
                                                                    <a href="#">Ch-256xl</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div
                                                            class="pro-details-categories-info pro-details-same-style d-flex">
                                                            <span>Categories: </span>
                                                            <ul class="d-flex">
                                                                <li>
                                                                    <a href="#">{{ $product_value->id }}</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div
                                                            class="pro-details-social-info pro-details-same-style d-flex">
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
                            </div>
                            <!--/Modal section-->
                            @endforeach
                        </div>
                        <div class="col-md-6 m-auto pro-pagination-style text-center">{{$all_product->links()}}</div>
                    </div>
                    <!-- 1st tab end -->
                    @foreach ($all_category as $category_value)
                    {{-- {{$category_value}} --}}
                    <!-- 2nd tab start -->
                    <div class="tab-pane fade" id="tab-product--{{ $category_value->id }}">
                        <div class="row">
                            @foreach ($all_product as $product_value)
                            {{-- {{$product_value}} --}}
                            @if($product_value->category_id == $category_value->id)
                            {{-- {{($category_value->id)}} --}}
                            <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                data-aos-delay="200">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <div class="thumb">
                                        <a href="{{ Route('product_detail.show', $product_value->id) }}"
                                            class="image pro-img">
                                            <img src="{{ url('storage/' . $product_value->image) }}" />
                                            <img class="hover-image"
                                                src="{{ url('storage/' . $product_value->image) }}" />
                                        </a>
                                        <span class="badges">
                                            {{-- <span class="new"></span> --}}
                                            @if($product_value->sale_price > 0)
                                            <span class="sale">-{{ number_format((($product_value->price -
                                                $product_value->sale_price)/$product_value->price)*100,0) }}%</span>
                                            @endif
                                        </span>
                                        <div class="actions">
                                            @if(Auth::user())
                                            <a href="{{route('add_to_wishlist' , ['id' => $product_value->id]) }}"
                                                class="action wishlist add-to-wishlist" title="Wishlist">
                                                <i class="pe-7s-like"></i></a>
                                            @endif
                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#modal-quickview-{{ $product_value->id }}">
                                                <i class="pe-7s-search"></i></a>
                                            {{-- <a href="" class="action compare" title="Compare">
                                                <i class="pe-7s-refresh-2"></i></a> --}}
                                        </div>
                                        @if($product_value->status == 0)
                                        <button title="Add To Cart" class="add-to-cart" disabled>Hết hàng </button>
                                        @elseif(!Auth::user())
                                        <button id="buyProduct" onclick="requireLogin()" title="Add To Cart"
                                            type="button" class="add-to-cart" data-id="">Mua ngay</button>
                                        @else
                                        <button title="Add To Cart" type="button" class="add-to-cart"
                                            data-id="{{$product_value->id}}">Mua ngay</button>
                                        @endif
                                        {{-- <a type="button" class="add-to-cart"
                                            href="{{route('add_to_cart',$product_value->id)}}">Mua
                                            hang</a> --}}
                                        {{-- @endif --}}
                                    </div>
                                    <div class="content">
                                        <span class="ratings">
                                            <span class="rating-wrap">
                                                <span class="star" style="width: 100%"></span>
                                            </span>
                                            <span class="rating-num">( 5 Đánh giá )</span>
                                        </span>
                                        <h5 class="title"><a
                                                href="{{ Route('product_detail.show', $product_value->id) }}">{{
                                                $product_value->name }}
                                            </a>
                                        </h5>
                                        @if($product_value->sale_price > 0)
                                        <span class="price">
                                            <span class="new">₫
                                                {{ number_format($product_value->sale_price,0,',','.') }}</span>
                                            <span class="old">₫
                                                {{ number_format($product_value->price,0,',','.') }}</span>
                                        </span>
                                        @else
                                        <span class="price">
                                            <span class="new">₫
                                                {{ number_format($product_value->price,0,',','.') }}</span>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--Modal section-->
                                <div class="modal modal-2 fade" id="modal-quickview-{{ $product_value->id }}" tabindex="-1"
                                    role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                                                        <!-- Swiper -->
                                                        <div class="swiper-container zoom-top">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="{{ url('storage/' . $product_value->image) }}"
                                                                        alt="">
                                                                </div>
                                                                {{-- <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="assets/images/product-image/zoom-image/2.jpg"
                                                                        alt="">
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                        {{-- <div class="swiper-container zoom-thumbs mt-3 mb-3">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="{{url('storage/'.$product_value->image)}}"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up"
                                                        data-aos-delay="200">
                                                        <div class="product-details-content quickview-content">
                                                            <h2>{{ $product_value->name }}</h2>
                                                            <div class="pricing-meta">
                                                                <ul>
                                                                    <li class="old-price not-cut">
                                                                        ₫ {{ number_format($product_value->price,0,',','.')
                                                                        }}</li>
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
                                                                <span class="read-review"><a class="reviews" href="#">( 5
                                                                        Đánh giá
                                                                        )</a></span>
                                                            </div>
                                                            <p class="mt-30px mb-0">Lorem ipsum dolor sit amet,
                                                                consect adipisicing elit, sed do
                                                                eiusmod tempor incidi ut labore
                                                                et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                                nostrud exercita ullamco
                                                                laboris nisi
                                                                ut aliquip ex ea commodo </p>
                                                            <div class="pro-details-quality">
                                                                <div class="cart-plus-minus">
                                                                    <input class="cart-plus-minus-box" type="text"
                                                                        name="qtybutton" value="1" />
                                                                </div>
                                                                <div class="pro-details-cart">
                                                                    {{-- <a
                                                                        href="{{ route('add_to_cart', ['id' => $product_value->id]) }}"
                                                                        title="Add To Cart" type="button"
                                                                        class=" add-cart">Mua ngay
                                                                    </a> --}}
                                                                    <button title="Add To Cart" type="button"
                                                                        class="add-to-cart"
                                                                        data-id="{{$product_value->id}}">Mua ngay
                                                                    </button>
                                                                </div>
                                                                <div
                                                                    class="pro-details-compare-wishlist pro-details-wishlist ">
                                                                    <a href=""><i class="pe-7s-like"></i></a>
                                                                </div>
                                                                <div
                                                                    class="pro-details-compare-wishlist pro-details-compare">
                                                                    <a href=""><i class="pe-7s-refresh-2"></i></a>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="pro-details-sku-info pro-details-same-style  d-flex">
                                                                <span>ID:{{ $product_value->id }} </span>
                                                                <ul class="d-flex">
                                                                    <li>
                                                                        <a href="#">Ch-256xl</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div
                                                                class="pro-details-categories-info pro-details-same-style d-flex">
                                                                <span>Categories: </span>
                                                                <ul class="d-flex">
                                                                    <li>
                                                                        <a href="#">{{ $product_value->id }}</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div
                                                                class="pro-details-social-info pro-details-same-style d-flex">
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
                                </div>
                            <!--/Modal section-->

                            @endif
                            @endforeach
                           

                        </div>
                    </div>
                    @endforeach
                    <!-- 2nd tab end -->
                </div>
                {{-- <a href="shop-left-sidebar.html" class="btn btn-lg btn-primary btn-hover-dark m-auto">Xem thêm <i
                        class="fa fa-arrow-right ml-15px" aria-hidden="true"></i></a> --}}
            </div>
        </div>
    </div>
</div>
<!-- Product Area End -->

<!-- Banner Area Start -->
<div class="banner-area pt-100px pb-100px plr-15px">
    <div class="row m-0">
        <div class="col-12 col-lg-4 mb-md-30px mb-lm-30px">
            <div class="single-banner-2">
                <img src="{{ url('assets/shop_pages/assets') }}/images/banner/4.jpg" alt="">
                <div class="item-disc">
                    <h4 class="title">Best Collection <br>
                        For Women</h4>
                    <a href="shop-left-sidebar.html" class="shop-link btn btn-primary ">Shop Now <i
                            class="fa fa-shopping-basket ml-5px" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 center-col mb-md-30px mb-lm-30px">
            <div class="single-banner-2">
                <img src="{{ url('assets/shop_pages/assets') }}/images/banner/5.jpg" alt="">
                <div class="item-disc">
                    <h4 class="title">Best Collection <br>
                        For Men</h4>
                    <a href="shop-left-sidebar.html" class="shop-link btn btn-primary">Shop Now <i
                            class="fa fa-shopping-basket ml-5px" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="single-banner-2">
                <img src="{{ url('assets/shop_pages/assets') }}/images/banner/6.jpg" alt="">
                <div class="item-disc">
                    <h4 class="title">New Collection <br>
                        For Kids</h4>
                    <a href="shop-left-sidebar.html" class="shop-link btn btn-primary">Shop Now <i
                            class="fa fa-shopping-basket ml-5px" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End -->

<!-- Product Area Start -->
<div class="product-area pt-100px pb-100px">
    <div class="container">
        <!-- Section Title & Tab Start -->
        <div class="row">
            <!-- Section Title Start -->
            <div class="col-lg col-md col-12">
                <div class="section-title mb-0">
                    <h2 class="title">Sản phẩm nổi bật</h2>
                </div>
            </div>
            <!-- Section Title End -->

            <!-- Tab Start -->
            <div class="col-lg-auto col-md-auto col-12">
                <ul class="product-tab-nav nav">
                    {{-- <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                            href="#tab-product-all">All</a></li> --}}
                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#tab-product-new">Mới</a>
                    </li>
                    {{-- <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                            href="#tab-product-bestsellers">Bestsellers</a></li> --}}
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-product-itemssale">Giảm
                            giá</a></li>
                </ul>
            </div>
            <!-- Tab End -->
        </div>
        <!-- Section Title & Tab End -->
        <div class="row">
            <div class="col">
                <div class="tab-content top-borber">
                    <!-- 1st tab start -->
                    {{-- <div class="tab-pane fade show active" id="tab-product-all">
                        <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
                            <div class="new-product-wrapper swiper-wrapper">
                                @foreach ($newProducts as $newArrivalProduct)
                                <div class="new-product-item swiper-slide"> --}}
                                    <!-- Single Prodect -->
                                    {{-- <div class="product">
                                        <div class="thumb">
                                            <a href="{{ Route('product_detail.show', $newArrivalProduct->id) }}"
                                                class="image new-product">
                                                <img src="{{ url('storage/' . $newArrivalProduct->image) }}"
                                                    alt="Product" />
                                                <img class="hover-image"
                                                    src="{{ url('storage/' . $newArrivalProduct->image) }}"
                                                    alt="Product" />
                                            </a>
                                            <span class="badges">
                                                <span class="new">Mới</span>
                                            </span>
                                            <div class="actions">
                                                <a href="" class="action wishlist" title="Wishlist"><i
                                                        class="pe-7s-like"></i></a>
                                                <a href="#" class="action quickview" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                                                <a href="" class="action compare" title="Compare"><i
                                                        class="pe-7s-refresh-2"></i></a>
                                            </div>
                                            <button title="Add To Cart" type="button" class="add-to-cart"
                                                data-id="{{$newArrivalProduct->id}}">Mua ngay
                                            </button>
                                        </div>
                                        <div class="content">
                                            <span class="ratings">
                                                <span class="rating-wrap">
                                                    <span class="star" style="width: 100%"></span>
                                                </span>
                                                <span class="rating-num">( 5 Review )</span>
                                            </span>
                                            <h5 class="title"><a href="single-product.html">{{ $newArrivalProduct->name
                                                    }}
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">₫ {{
                                                    number_format($newArrivalProduct->price,0,',','.') }}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div> --}}
                            <!-- Add Arrows -->
                            {{-- <div class="swiper-buttons">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- 1st tab end -->
                    <!-- 2nd tab start -->
                    <div class="tab-pane fade show active" id="tab-product-new">
                        <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
                            <div class="new-product-wrapper swiper-wrapper">
                                @foreach ($newProducts as $product_value)
                                {{-- @if ($product_value->product_quantity>0) --}}
                                <div class="new-product-item swiper-slide">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <div class="thumb">
                                            <a href="{{ Route('product_detail.show', $product_value->id) }}"
                                                class="image pro-img">
                                                <img src="{{ url('storage/' . $product_value->image) }}" />
                                                <img class="hover-image"
                                                    src="{{ url('storage/' . $product_value->image) }}" />
                                            </a>
                                            <span class="badges">
                                                @if($product_value->sale_price > 0)
                                                <span class="sale">-{{ number_format((($product_value->price -
                                                    $product_value->sale_price)/$product_value->price)*100,0) }}%</span>
                                                @endif
                                                {{-- <span class="new">{{$product_value->id}}</span> --}}
                                            </span>
                                            <div class="actions">
                                                @if(Auth::user())
                                                <a href="{{route('add_to_wishlist' , ['id' => $product_value->id]) }}"
                                                    class="action wishlist add-to-wishlist" title="Wishlist">
                                                    <i class="pe-7s-like"></i></a>
                                                @endif
                                                <a href="#" class="action quickview" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#modal-quickview-{{ $product_value->id }}">
                                                    <i class="pe-7s-search"></i></a>
                                                {{-- <a href="" class="action compare" title="Compare">
                                                    <i class="pe-7s-refresh-2"></i></a> --}}
                                            </div>
                                            @if($product_value->status == 0)
                                            <button title="Add To Cart" class="add-to-cart" disabled>Hết hàng </button>
                                            @elseif(!Auth::user())
                                            <button id="buyProduct" onclick="requireLogin()" title="Add To Cart"
                                                type="button" class="add-to-cart" data-id="">Mua ngay</button>
                                            @else
                                            <button title="Add To Cart" type="button" class="add-to-cart"
                                                data-id="{{$product_value->id}}">Mua ngay</button>
                                            @endif
                                            {{-- <a type="button" class="add-to-cart"
                                                href="{{route('add_to_cart',$product_value->id)}}">Mua
                                                hang</a> --}}
                                        </div>
                                        <div class="content">
                                            <span class="ratings">
                                                <span class="rating-wrap">
                                                    <span class="star" style="width: 100%"></span>
                                                </span>
                                                <span class="rating-num">( 5 Đánh giá )</span>
                                            </span>
                                            <h5 class="title"><a
                                                    href="{{ Route('product_detail.show', $product_value->id) }}">{{
                                                    $product_value->name }}
                                                </a>
                                            </h5>
                                            @if($product_value->sale_price > 0)
                                            <span class="price">
                                                <span class="new">₫
                                                    {{ number_format($product_value->sale_price,0,',','.') }}</span>
                                                <span class="old">₫
                                                    {{ number_format($product_value->price,0,',','.') }}</span>
                                            </span>
                                            @else
                                            <span class="price">
                                                <span class="new">₫
                                                    {{ number_format($product_value->price,0,',','.') }}</span>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!--Modal section-->
                                <div class="modal modal-2 fade" id="modal-quickview-{{ $product_value->id }}"
                                    tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                                                        <!-- Swiper -->
                                                        <div class="swiper-container zoom-top">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="{{ url('storage/' . $product_value->image) }}"
                                                                        alt="">
                                                                </div>
                                                                {{-- <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="assets/images/product-image/zoom-image/2.jpg"
                                                                        alt="">
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="assets/images/product-image/zoom-image/3.jpg"
                                                                        alt="">
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="assets/images/product-image/zoom-image/4.jpg"
                                                                        alt="">
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                        {{-- <div class="swiper-container zoom-thumbs mt-3 mb-3">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="{{url('storage/'.$product_value->image)}}"
                                                                        alt="">
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="assets/images/product-image/small-image/2.jpg"
                                                                        alt="">
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="assets/images/product-image/small-image/3.jpg"
                                                                        alt="">
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="assets/images/product-image/small-image/4.jpg"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up"
                                                        data-aos-delay="200">
                                                        <div class="product-details-content quickview-content">
                                                            <h2>{{ $product_value->name }}</h2>
                                                            <div class="pricing-meta">
                                                                <ul>
                                                                    <li class="old-price not-cut">
                                                                        ₫ {{
                                                                        number_format($product_value->price,0,',','.')
                                                                        }}</li>
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
                                                                <span class="read-review"><a class="reviews" href="#">(
                                                                        5
                                                                        Đánh giá
                                                                        )</a></span>
                                                            </div>
                                                            <p class="mt-30px mb-0">Lorem ipsum dolor sit amet,
                                                                consect adipisicing elit, sed do
                                                                eiusmod tempor incidi ut labore
                                                                et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                                nostrud exercita ullamco
                                                                laboris nisi
                                                                ut aliquip ex ea commodo </p>
                                                            <div class="pro-details-quality">
                                                                <div class="cart-plus-minus">
                                                                    <input class="cart-plus-minus-box" type="text"
                                                                        name="qtybutton" value="1" />
                                                                </div>
                                                                <div class="pro-details-cart">
                                                                    {{-- <a
                                                                        href="{{ route('add_to_cart', ['id' => $product_value->id]) }}"
                                                                        title="Add To Cart" type="button"
                                                                        class=" add-cart">Mua ngay
                                                                    </a> --}}
                                                                    <button title="Add To Cart" type="button"
                                                                        class="add-to-cart"
                                                                        data-id="{{$product_value->id}}">Mua ngay
                                                                    </button>
                                                                </div>
                                                                <div
                                                                    class="pro-details-compare-wishlist pro-details-wishlist ">
                                                                    <a href=""><i class="pe-7s-like"></i></a>
                                                                </div>
                                                                <div
                                                                    class="pro-details-compare-wishlist pro-details-compare">
                                                                    <a href=""><i class="pe-7s-refresh-2"></i></a>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="pro-details-sku-info pro-details-same-style  d-flex">
                                                                <span>ID:{{ $product_value->id }} </span>
                                                                <ul class="d-flex">
                                                                    <li>
                                                                        <a href="#">Ch-256xl</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div
                                                                class="pro-details-categories-info pro-details-same-style d-flex">
                                                                <span>Categories: </span>
                                                                <ul class="d-flex">
                                                                    <li>
                                                                        <a href="#">{{ $product_value->id }}</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div
                                                                class="pro-details-social-info pro-details-same-style d-flex">
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
                                </div>
                                <!--/Modal section-->
                                {{-- @endif --}}
                                @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-buttons">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    <!-- 2nd tab end -->
                    <!-- 3rd tab start -->
                    <div class="tab-pane fade" id="tab-product-bestsellers">
                        <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
                            <div class="new-product-wrapper swiper-wrapper">
                                <div class="new-product-item swiper-slide">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/8.jpg" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/6.jpg"
                                                    alt="Product" />
                                            </a>
                                            <span class="badges">
                                                <span class="new">New</span>
                                            </span>
                                            <div class="actions">
                                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                        class="pe-7s-like"></i></a>
                                                <a href="#" class="action quickview" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                                                <a href="" class="action compare" title="Compare"><i
                                                        class="pe-7s-refresh-2"></i></a>
                                            </div>
                                            <button title="Add To Cart" class=" add-to-cart">Add
                                                To Cart</button>
                                        </div>
                                        <div class="content">
                                            <span class="ratings">
                                                <span class="rating-wrap">
                                                    <span class="star" style="width: 100%"></span>
                                                </span>
                                                <span class="rating-num">( 5 Review )</span>
                                            </span>
                                            <h5 class="title"><a href="single-product.html">Women's Elizabeth
                                                    Coat
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-buttons">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    <!-- 3rd tab end -->
                    <!-- 4th tab start -->
                    <div class="tab-pane fade" id="tab-product-itemssale">
                        <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
                            <div class="new-product-wrapper swiper-wrapper">
                                @foreach ($saleProducts as $product_value)
                                @if ($product_value->product_quantity>0)
                                <div class="new-product-item swiper-slide">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <div class="thumb">
                                            <a href="{{ Route('product_detail.show', $product_value->id) }}"
                                                class="image pro-img">
                                                <img src="{{ url('storage/' . $product_value->image) }}" />
                                                <img class="hover-image"
                                                    src="{{ url('storage/' . $product_value->image) }}" />
                                            </a>
                                            <span class="badges">
                                                @if($product_value->sale_price > 0)
                                                <span class="sale">-{{ number_format((($product_value->price -
                                                    $product_value->sale_price)/$product_value->price)*100,0) }}%</span>
                                                @endif
                                                {{-- <span class="new">{{$product_value->id}}</span> --}}
                                            </span>
                                            <div class="actions">
                                                <a href="{{route('add_to_wishlist' , ['id' => $product_value->id]) }}"
                                                    class="action wishlist add-to-wishlist" title="Wishlist">
                                                    <i class="pe-7s-like"></i></a>
                                                <a href="#" class="action quickview" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#modal-quickview-{{ $product_value->id }}">
                                                    <i class="pe-7s-search"></i></a>
                                                <a href="" class="action compare" title="Compare">
                                                    <i class="pe-7s-refresh-2"></i></a>
                                            </div>
                                            @if($product_value->status == 0)
                                            <button title="Add To Cart" class="add-to-cart" disabled>Hết hàng </button>
                                            @elseif(!Auth::user())
                                            <button id="buyProduct" onclick="requireLogin()" title="Add To Cart"
                                                type="button" class="add-to-cart" data-id="">Mua ngay</button>
                                            @else
                                            <button title="Add To Cart" type="button" class="add-to-cart"
                                                data-id="{{$product_value->id}}">Mua ngay</button>
                                            @endif
                                            {{-- <a type="button" class="add-to-cart"
                                                href="{{route('add_to_cart',$product_value->id)}}">Mua
                                                hang</a> --}}
                                            {{-- @endif --}}
                                        </div>
                                        <div class="content">
                                            <span class="ratings">
                                                <span class="rating-wrap">
                                                    <span class="star" style="width: 100%"></span>
                                                </span>
                                                <span class="rating-num">( 5 Đánh giá )</span>
                                            </span>
                                            <h5 class="title"><a
                                                    href="{{ Route('product_detail.show', $product_value->id) }}">{{
                                                    $product_value->name }}
                                                </a>
                                            </h5>
                                            @if($product_value->sale_price > 0)
                                            <span class="price">
                                                <span class="new">₫
                                                    {{ number_format($product_value->sale_price,0,',','.') }}</span>
                                                <span class="old">₫
                                                    {{ number_format($product_value->price,0,',','.') }}</span>
                                            </span>
                                            @else
                                            <span class="price">
                                                <span class="new">₫
                                                    {{ number_format($product_value->price,0,',','.') }}</span>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!--Modal section-->
                                <div class="modal modal-2 fade" id="modal-quickview-{{ $product_value->id }}"
                                    tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                                                        <!-- Swiper -->
                                                        <div class="swiper-container zoom-top">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="{{ url('storage/' . $product_value->image) }}"
                                                                        alt="">
                                                                </div>
                                                                {{-- <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="assets/images/product-image/zoom-image/2.jpg"
                                                                        alt="">
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="assets/images/product-image/zoom-image/3.jpg"
                                                                        alt="">
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="assets/images/product-image/zoom-image/4.jpg"
                                                                        alt="">
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                        {{-- <div class="swiper-container zoom-thumbs mt-3 mb-3">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="{{url('storage/'.$product_value->image)}}"
                                                                        alt="">
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="assets/images/product-image/small-image/2.jpg"
                                                                        alt="">
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="assets/images/product-image/small-image/3.jpg"
                                                                        alt="">
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img class="img-responsive m-auto"
                                                                        src="assets/images/product-image/small-image/4.jpg"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up"
                                                        data-aos-delay="200">
                                                        <div class="product-details-content quickview-content">
                                                            <h2>{{ $product_value->name }}</h2>
                                                            <div class="pricing-meta">
                                                                <ul>
                                                                    <li class="old-price not-cut">
                                                                        ₫ {{
                                                                        number_format($product_value->price,0,',','.')
                                                                        }}</li>
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
                                                                <span class="read-review"><a class="reviews" href="#">(
                                                                        5
                                                                        Đánh giá
                                                                        )</a></span>
                                                            </div>
                                                            <p class="mt-30px mb-0">Lorem ipsum dolor sit amet,
                                                                consect adipisicing elit, sed do
                                                                eiusmod tempor incidi ut labore
                                                                et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                                nostrud exercita ullamco
                                                                laboris nisi
                                                                ut aliquip ex ea commodo </p>
                                                            <div class="pro-details-quality">
                                                                <div class="cart-plus-minus">
                                                                    <input class="cart-plus-minus-box" type="text"
                                                                        name="qtybutton" value="1" />
                                                                </div>
                                                                <div class="pro-details-cart">
                                                                    {{-- <a
                                                                        href="{{ route('add_to_cart', ['id' => $product_value->id]) }}"
                                                                        title="Add To Cart" type="button"
                                                                        class=" add-cart">Mua ngay
                                                                    </a> --}}

                                                                    @if($product_value->status == 0)
                                                                    <button title="Add To Cart" type="button"
                                                                        class="add-to-cart" disabled>Hết hàng
                                                                    </button>
                                                                    @else
                                                                    <button title="Add To Cart" type="button"
                                                                        class="add-to-cart"
                                                                        data-id="{{$product_value->id}}">Mua ngay
                                                                    </button>
                                                                    @endif
                                                                </div>
                                                                <div
                                                                    class="pro-details-compare-wishlist pro-details-wishlist ">
                                                                    <a href=""><i class="pe-7s-like"></i></a>
                                                                </div>
                                                                <div
                                                                    class="pro-details-compare-wishlist pro-details-compare">
                                                                    <a href=""><i class="pe-7s-refresh-2"></i></a>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="pro-details-sku-info pro-details-same-style  d-flex">
                                                                <span>ID:{{ $product_value->id }} </span>
                                                                <ul class="d-flex">
                                                                    <li>
                                                                        <a href="#">Ch-256xl</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div
                                                                class="pro-details-categories-info pro-details-same-style d-flex">
                                                                <span>Categories: </span>
                                                                <ul class="d-flex">
                                                                    <li>
                                                                        <a href="#">{{ $product_value->id }}</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div
                                                                class="pro-details-social-info pro-details-same-style d-flex">
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
                                </div>
                                <!--/Modal section-->
                                @endif
                                @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-buttons">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    <!-- 4th tab end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End -->

<!-- Deal Area Start -->
<div class="deal-area deal-bg deal-bg-2"
    data-bg-image="{{ url('assets/shop_pages/assets') }}/images/deal-img/deal-bg-2.jpg">
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <div class="deal-inner position-relative pt-100px pb-100px">
                    <div class="deal-wrapper">
                        <span class="category">#FASHION SHOP</span>
                        <h3 class="title">Deal Of The Day</h3>
                        <div class="deal-timing">
                            <div data-countdown="2023/05/15"></div>
                        </div>
                        <a href="shop-left-sidebar.html" class="btn btn-lg btn-primary btn-hover-dark m-auto"> Shop
                            Now <i class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>
                    </div>
                    <div class="deal-image">
                        <img class="img-fluid" src="{{ url('assets/shop_pages/assets') }}/images/deal-img/woman.png"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Deal Area End -->

<!--  Blog area Start -->
<div class="main-blog-area pb-100px pt-100px">
    <div class="container">
        <!-- section title start -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mb-30px0px">
                    <h2 class="title">Bài viết</h2>
                    </p>
                </div>
            </div>
        </div>
        <!-- section title start -->
        <div class="row">
            @foreach($blog as $blog_value)
            <div class="col-lg-4 mb-md-30px mb-lm-30px">
                <div class="single-blog">
                    <div class="blog-image blog-img">
                        <a href="{{ route('blog.detail',$blog_value->id )}}">
                            <img src="{{ url('storage/' . $blog_value->blog_image) }}" class="img-responsive w-100">
                        </a>
                    </div>
                    <div class="blog-text blog-content">
                        <div class="blog-athor-date">
                            <a class="blog-date height-shape" href="{{ route('blog.detail',$blog_value->id )}}"><i
                                    class="fa fa-calendar" aria-hidden="true"></i>{{
                                $blog_value->created_at->format('d/m/Y') }}</a>
                            <a class="blog-mosion" href="#"><i class="fa fa-commenting" aria-hidden="true"></i>{{
                                $blog_value->blog_view }}</a>
                        </div>
                        <h5 class="blog-heading blog-title"><a class="blog-heading-link"
                                href="{{ route('blog.detail',$blog_value->id )}}">{{
                                $blog_value->blog_title }}</a></h5>
                        <a href="{{ route('blog.detail',$blog_value->id )}}" class="btn btn-primary blog-btn">Chi tiết<i
                                class="fa fa-arrow-right ml-5px" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <!-- End single blog -->
            @endforeach
        </div>
    </div>
</div>
<!--  Blog area End -->

@endsection
@push('scripts')
<script>
    const addCartUrl = '{{ route('add_to_cart', ['id' => '__id__']) }}'
</script>
@endpush