@extends('shop_pages.master')
@section('content')
<!-- Blog Area Start -->
<div class="blog-grid pb-100px pt-100px main-blog-page single-blog-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 offset-lg-2">
                <div class="blog-posts">
                    <div class="single-blog-post blog-grid-post">
                        <div class="blog-image single-blog" data-aos="fade-up" data-aos-delay="200">
                            <img class="img-fluid h-auto" src="{{ url('storage/'.$blog->blog_image) }}" alt="blog" />
                        </div>
                        <div class="blog-post-content-inner mt-30px" data-aos="fade-up" data-aos-delay="400">
                            <div class="blog-athor-date">
                                <a class="blog-date height-shape" href="#"><i class="fa fa-calendar"
                                        aria-hidden="true"></i>{{ $blog->created_at->format('d/m/Y') }}</a>
                                <a class="blog-mosion" href="#"><i class="fa fa-commenting" aria-hidden="true"></i>
                                    {{$blog->blog_view}}</a>
                            </div>
                            <h4 class="blog-title">{{ $blog->blog_title }}</h4>
                            <p data-aos="fade-up">
                                {{ $blog->blog_summary }}
                            </p>
                        </div>
                        <div class="single-post-content">
                            <p data-aos="fade-up" data-aos-delay="200">{!!$blog->blog_content!!}</p>
                        </div>
                    </div>
                    <!-- single blog post -->
                </div>
                <div class="blog-single-tags-share d-sm-flex justify-content-between">
                    <div class="blog-single-share mb-xs-15px d-flex" data-aos="fade-up" data-aos-delay="200">
                        <ul class="social">
                            <li class="m-0"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google"></i></a></li>
                        </ul>
                        <span class="title"><a class="ml-10px" href="#"> 2 <i class="fa fa-comments m-0"></i></a></span>
                    </div>
                    {{-- <div class="blog-single-tags d-flex" data-aos="fade-up" data-aos-delay="200">
                        <span class="title">Tags: </span>
                        <ul class="tag-list">
                            <li><a href="#">Fashion,</a></li>
                            <li><a href="#">eCommerce,</a></li>
                            <li><a href="#">Dress</a></li>
                        </ul>
                    </div> --}}
                </div>
                {{-- <div class="blog-nav">
                    <div class="row">
                        <div class="col-6">
                            <a class="nav-left" href="#"><i class="fa fa-angle-left"></i></a>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <a class="nav-right" href="#"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="comment-area">
                    <h2 class="comment-heading" data-aos="fade-up" data-aos-delay="200">Comments (03)</h2>
                    <div class="review-wrapper">
                        <div class="single-review" data-aos="fade-up" data-aos-delay="200">
                            <div class="review-img">
                                <img src="assets/images/comment-image/1.png" alt="" />
                            </div>
                            <div class="review-content">
                                <div class="review-top-wrap">
                                    <div class="review-left">
                                        <div class="review-name">
                                            <h4 class="title">Maxine Singleton </h4>
                                            <span class="date">21 July 2021</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-bottom">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incidid ut labore et dolor magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercita ullamc laboris nisi ut aliquip ex ea comm consequat.
                                    </p>
                                    <div class="review-left">
                                        <a href="#">Reply <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-review child-review" data-aos="fade-up" data-aos-delay="200">
                            <div class="review-img">
                                <img src="assets/images/comment-image/2.png" alt="" />
                            </div>
                            <div class="review-content">
                                <div class="review-top-wrap">
                                    <div class="review-left">
                                        <div class="review-name">
                                            <h4 class="title">Winston Goodwin </h4>
                                            <span class="date">21 July 2021</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-bottom">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodk
                                        tempor incidid ut labore et dolor magna aliqua. Ut enim ad minim veniam quis
                                        nostrud exercita ullamc laboris</p>
                                    <div class="review-left">
                                        <a href="#">Reply <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-review" data-aos="fade-up" data-aos-delay="200">
                            <div class="review-img">
                                <img src="assets/images/comment-image/1.png" alt="" />
                            </div>
                            <div class="review-content">
                                <div class="review-top-wrap">
                                    <div class="review-left">
                                        <div class="review-name">
                                            <h4 class="title">Maxine Singleton </h4>
                                            <span class="date">21 July 2021</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-bottom">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incidid ut labore et dolor magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercita ullamc laboris nisi ut aliquip ex ea comm consequat.
                                    </p>
                                    <div class="review-left">
                                        <a href="#">Reply <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-comment-form">
                    <h2 class="comment-heading" data-aos="fade-up" data-aos-delay="200">Leave a Comment</h2>
                    <div class="row">
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="single-form mb-lm-15px">
                                <input type="text" placeholder="Name *" />
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="single-form mb-lm-15px">
                                <input type="email" placeholder="Email *" />
                            </div>
                        </div>
                        <div class="col-md-12" data-aos="fade-up" data-aos-delay="500">
                            <div class="single-form mb-lm-15px">
                                <input type="email" placeholder="Subject (Optinal)" />
                            </div>
                        </div>
                        <div class="col-md-12" data-aos="fade-up" data-aos-delay="200">
                            <div class="single-form">
                                <textarea placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12" data-aos="fade-up" data-aos-delay="200">
                            <button class="btn btn-primary btn-hover-dark border-0 mt-30px" type="submit">Post Comment
                                <i class="fa fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
<!-- Blag Area End -->

@endsection