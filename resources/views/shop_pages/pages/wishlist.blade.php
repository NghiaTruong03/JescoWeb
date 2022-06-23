 
@extends('shop_pages.master')
@section('content')
    <!-- Wishlist Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <h3 class="cart-page-title">Sản phẩm yêu thích</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="#">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ảnh</th>
                                        <th>Tên Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Tình Trạng</th>
                                        <th>Thao tác</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product_wishlist as $wishlist_item)
                                    <tr>
                                        <td class="product-price-cart">{{$wishlist_item->products->id}}</td>
                                        <td class="product-thumbnail">
                                            
                                            <a href="{{Route('product_detail.show', $wishlist_item->products->id)}}"><img class="img-responsive ml-15px"
                                                    src="{{ url('storage/' . $wishlist_item->products->image) }}" alt="" /></a>
                                        </td>
                                        <td class="product-name"><a href="#">{{$wishlist_item->products->name}}</a></td>
                                        <td class="product-price-cart"><span class="amount">{{$wishlist_item->products->price}}</span> VNĐ</td>
                                        <td class="product-subtotal">
                                            {{$wishlist_item->products->status == 1 ? "Còn hàng" : "Hết hàng"}}
                                        </td>
                                        <td class="product-remove">
                                            <a href="{{route('wishlist.delete.product', ['id' => $wishlist_item->id])}}"><i class="fa fa-times"></i></a>
                                        </td>
                                      
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Wishlist Area End -->
@endsection