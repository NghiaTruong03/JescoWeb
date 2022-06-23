@extends('shop_pages.master')
@section('content')
    <!-- Product Details Area Start -->
    <div class="product-details-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                    <!-- Swiper -->
                    <div class="swiper-container zoom-top">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide zoom-image-hover">
                                <img class="img-responsive m-auto" src="{{ url('storage/' . $product->image) }}" alt="">
                            </div>
                            @foreach ($child_img as $value)
                                <div class="swiper-slide zoom-image-hover">
                                    <img class="img-responsive m-auto" src="{{ url('storage/' . $value->child_img) }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-container zoom-thumbs mt-3 mb-3">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img class="img-responsive m-auto" src="{{ url('storage/' . $product->image) }}" alt="">
                            </div>
                            @foreach ($child_img as $value)
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="{{ url('storage/' . $value->child_img) }}"
                                        alt="">
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-details-content quickview-content">
                        <h2>{{ $product->name }}</h2>
                        <div class="pricing-meta">
                            <ul>
                                <li class="old-price not-cut">₫ {{ number_format($product->price, 0, ',', '.') }}</li>
                            </ul>
                        </div>

                        {{-- rating --}}
                        <div class="pro-details-rating-wrap">
                            <div class="rating-product">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <span class="read-review"><a class="reviews" href="#">( 5 Lượt đánh giá )</a></span>
                        </div>

                        {{-- color --}}
                        {{-- <div class="pro-details-color-info d-flex align-items-center">
                          <span>Color</span>
                          <div class="pro-details-color">
                              <ul>
                                  <li><a class="active-color yellow" href="#"></a></li>
                                  <li><a class="black" href="#"></a></li>
                                  <li><a class="red" href="#"></a></li>
                                  <li><a class="pink" href="#"></a></li>
                              </ul>
                          </div>
                      </div> --}}


                        <!-- Sidebar single item -->
                        <div class="pro-details-size-info d-flex align-items-center">
                            <span>Size</span>
                            <div class="pro-details-size">
                                <ul>
                                    <li><a class="active-size gray" href="#">S</a></li>
                                    <li><a class="gray" href="#">M</a></li>
                                    <li><a class="gray" href="#">L</a></li>
                                    <li><a class="gray" href="#">XL</a></li>
                                </ul>
                            </div>
                        </div>
                        <p class="m-0">{!! $product->description !!} </p>
                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="qtybutton-{{ $product->id }}"
                                    value="1" />
                            </div>
                            
                            <div class="pro-details-cart">
                                @if(!Auth::user())
                                        @if ($product->status == 0)
                                        <button title="Add To Cart"  class="add-to-cart" disabled>Hết hàng </button>
                                        @else
                                        <button id="buyProduct" onclick="requireLogin()" title="Add To Cart"
                                            type="button" class="add-to-cart" data-id="">Mua ngay
                                        </button>
                                        @endif
                                    @elseif($product->status == 0)
                                        <button title="Add To Cart"  class="add-to-cart" disabled>Hết hàng </button>
                                        @else
                                        <button title="Add To Cart" type="button" class="add-to-cart"
                                        data-id="{{$product->id}}">Mua ngay</button>
                                    @endif  
                                {{-- <a href="{{route("add_to_cart", ['id' => $product->id])}}" title="Add To Cart" type="button" class=" add-cart">Mua ngay</a> --}}
                            </div>
                            @if(Auth::user())
                            <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                <a href="{{route('add_to_wishlist' , ['id' => $product->id]) }}"><i
                                        class="pe-7s-like"></i></a>
                            </div>
                            @endif
                            {{-- <div class="pro-details-compare-wishlist pro-details-compare">
                              <a href="compare.html"><i class="pe-7s-refresh-2"></i></a>
                          </div> --}}
                        </div>
                        <div class="pro-details-sku-info pro-details-same-style  d-flex">
                            <span>ID sản phẩm: </span>
                            <ul class="d-flex">
                                <li>
                                    <a href="#">{{ $product->id }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="pro-details-categories-info pro-details-same-style d-flex">
                            <span>Danh mục: </span>
                            <ul class="d-flex">
                                <li>
                                    <a href="#">{{ $product->category->name }}</a>

                                </li>
                                {{-- <li>
                                  <a href="#">eCommerce</a>
                              </li> --}}
                            </ul>
                        </div>
                        <div class="pro-details-categories-info pro-details-same-style d-flex">
                            <span>Kho: </span>
                            <ul class="d-flex">
                                <li>
                                    <a href="#">{{ $product->product_quantity }} sản phẩm có sẵn</a>

                                </li>
                            </ul>
                        </div>
                        <div class="pro-details-categories-info pro-details-same-style d-flex">
                            <span>Lượt xem: </span>
                            <ul class="d-flex">
                                <li>
                                    <a href="#">{{ $product->view }} lượt</a>

                                </li>
                            </ul>
                        </div>
                        <div class="pro-details-social-info pro-details-same-style d-flex">
                            <span>Chia sẻ: </span>
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



    <!-- product details description area start -->
    <div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="description-review-wrapper">
                <div class="description-review-topbar nav">
                    <a data-bs-toggle="tab" href="#des-details2">Chính sách đổi trả</a>
                    <a data-bs-toggle="tab" href="#des-details1">Mô tả</a>
                    <a class="active" data-bs-toggle="tab" href="#des-details3">Bình luận</a>
                </div>
                <div class="tab-content description-review-bottom">
                    <div id="des-details2" class="tab-pane">
                        <div class="product-anotherinfo-wrapper text-start">
                            <ul>
                                <li>Hỗ trợ đổi nếu nhầm size nhanh chóng</li>
                                <li>Được đổi sản phẩm mới nếu lỗi từ nhà sản xuất</li>
                                <li>Cam kết sản phẩm 100% chính hãng</li>
                            </ul>
                        </div>
                    </div>
                    <div id="des-details1" class="tab-pane">
                        <div class="product-description-wrapper">
                            
                                {!! $product->description !!}
                            
                        </div>
                    </div>
                    <div id="des-details3" class="tab-pane active">
                        <div class="row">
                            <div class="col-lg-7">
                                <form>
                                    @csrf
                                    <input class="product_id" type="hidden" name="product_id"
                                        value="{{ $product->id }}">
                                    <div id="comment_show">


                                    </div>
                                    <div class="review-wrapper">

                                        <input class="product_id" type="hidden" name="product_id"
                                            value="{{ $product->id }}">
                                        @foreach ($comments as $user_info)
                                            <div class="single-review">
                                                <div class="review-img review-avatar">
                                                    <img src="{{ url('storage/' . $user_info->user->avatar) }}" alt="" />
                                                </div>
                                                <div class="review-content">
                                                    <div class="review-top-wrap">
                                                        <div class="review-left">
                                                            <div class="review-name">
                                                                <h4>{{ $user_info->user->name }}</h4>
                                                            </div>
                                                        </div>
                                                        <div class="review-left">
                                                            @if (Auth::check() == 1)
                                                                @if (Auth::user()->id == $user_info->user->id || Auth::user()->role != 0) 
                                                                    <a
                                                                        href="{{ route('comment.delete', ['id' => $user_info->id]) }}"><i
                                                                            class="fa fa-times"></i></a>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="review-bottom comment">
                                                        <p>
                                                            {{ $user_info->content }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-5">
                                <div class="ratting-form-wrapper pl-50">
                                    <h3>Bình luận của bạn</h3>
                                    <div class="ratting-form">
                                        <form action="{{ route('comment.add', ['id' => $product->id]) }}" method="POST">
                                            @csrf
                                            <div class="star-box">
                                                <span>Đánh giá:</span>
                                                <div class="rating-product">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="rating-form-style form-submit">
                                                        <textarea id="comment-content" name="content" placeholder="bình luận tại đây..."></textarea>
                                                        <button class="btn btn-primary btn-hover-color-primary  "
                                                            id="btn-comment" type="submit">Gửi</button>
                                                    </div>
                                                </div>
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
    <!-- product details description area end -->




    <!-- Related product Area Start -->
    <div class="related-product-area pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-30px0px line-height-1">
                        <h2 class="title m-0">Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">

                <div class="new-product-wrapper swiper-wrapper">
                    @foreach ($related_product as $related_product_value)
                        <div class="new-product-item swiper-slide">
                            <!-- Single Prodect -->
                            <div class="product">
                                <div class="thumb">
                                    <a href="{{ Route('product_detail.show', $related_product_value->id) }}"
                                        class="image pro-img">
                                        <img src="{{ url('storage/' . $related_product_value->image) }}" alt="Product" />
                                        <img class="hover-image"
                                            src="{{ url('storage/' . $related_product_value->image) }}" alt="Product" />
                                    </a>
                                    <span class="badges">
                                        <span class="new">{{ $related_product_value->id }}</span>
                                    </span>
                                    <div class="actions">
                                        @if(Auth::user())
                                        <a href="{{route('add_to_wishlist' , ['id' => $related_product_value->id]) }}"
                                            class="action wishlist add-to-wishlist" title="Wishlist">
                                            <i class="pe-7s-like"></i></a>
                                        @endif
                                        <a href="#" class="action quickview" data-link-action="quickview"
                                        title="Quick view" data-bs-toggle="modal"
                                        data-bs-target="#modal-quickview-{{ $related_product_value->id }}">
                                        <i class="pe-7s-search"></i></a>                                        
                                        {{-- <a href="compare.html" class="action compare" title="Compare"><i
                                                class="pe-7s-refresh-2"></i></a> --}}
                                    </div>
                                    @if(!Auth::user())
                                        @if ($related_product_value->status == 0)
                                        <button title="Add To Cart"  class="add-to-cart" disabled>Hết hàng </button>
                                        @else
                                        <button id="buyProduct" onclick="requireLogin()" title="Add To Cart"
                                            type="button" class="add-to-cart" data-id="">Mua ngay
                                        </button>
                                        @endif
                                    @elseif($related_product_value->status == 0)
                                        <button title="Add To Cart"  class="add-to-cart" disabled>Hết hàng </button>
                                        @else
                                        <button title="Add To Cart" type="button" class="add-to-cart"
                                        data-id="{{$related_product_value->id}}">Mua ngay</button>
                                    @endif                                   
                                </div>
                                <div class="content">
                                    <span class="ratings">
                                        <span class="rating-wrap">
                                            <span class="star" style="width: 100%"></span>
                                        </span>
                                        <span class="rating-num">( 5 Review )</span>
                                    </span>
                                    <h5 class="title"><a
                                            href="{{ Route('product_detail.show', $related_product_value->id) }}">{{ $related_product_value->name }}
                                        </a>
                                    </h5>
                                    <span class="price">
                                        <span class="new">₫
                                            {{ number_format($related_product_value->price, 0, ',', '.') }}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Add Arrows -->
                <div class="swiper-buttons">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Related product Area End -->
@endsection
@push('scripts')
    <script>
        const addCartUrl = '{{ route('add_to_cart', ['id' => '__id__']) }}';
        const cua = '{{ route('loadComment') }}';
    </script>
@endpush
