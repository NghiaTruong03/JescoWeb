@extends('shop_pages.master')
@section('content')

<!-- Blog Area Start -->
<div class="blog-grid pb-100px pt-100px main-blog-page single-blog-page">
    <div class="container">
        <div class="row">
            @foreach($blog as $blog_value)
            <div class="col-lg-6 col-md-6 col-xl-4 mb-50px">
                <div class="single-blog">
                    <div class="blog-image blog-img">
                        <a href="{{  route('blog.detail',$blog_value->id )}}"><img
                                src="{{ url('storage/'.$blog_value->blog_image) }}" style="height:250px;object-fit:cover;"
                                class="card-img-top"></a>
                    </div>
                    <div class="blog-text" style="height: 450px">
                        <div class="blog-athor-date">
                            <a class="blog-date height-shape" href="{{  route('blog.detail',$blog_value->id )}}"><i class="fa fa-calendar"
                                    aria-hidden="true"></i>{{ $blog_value->created_at->format('d/m/Y') }}</a>
                            <a class="blog-mosion" href="#"><i class="fa fa-commenting" aria-hidden="true"></i>{{
                                $blog_value->blog_view }}</a>
                        </div>
                        <div style="height: 300px">
                            <h5 class="blog-heading"><a class="blog-heading-link"
                                    href="{{  route('blog.detail',$blog_value->id )}}">{{ $blog_value->blog_title }}</a></h5>
                            <p>{{ $blog_value->blog_summary }}</p>
                        </div>

                        <a href="{{  route('blog.detail',$blog_value->id )}}" class="btn btn-primary blog-btn">Chi tiết<i
                                class="fa fa-arrow-right ml-5px" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- End single blog -->
        </div>

        <!--  Pagination Area Start -->
        {{-- <div class="pro-pagination-style text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="pages">
                <ul>
                    <li class="li"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li class="li"><a class="page-link active" href="#">1</a></li>
                    <li class="li"><a class="page-link" href="#">2</a></li>
                    <li class="li"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>
        </div> --}}
        <!--  Pagination Area End -->
    </div>
</div>
<!-- Blag Area End -->

@endsection