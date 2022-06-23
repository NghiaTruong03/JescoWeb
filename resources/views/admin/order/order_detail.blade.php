@extends('admin.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Đơn hàng #BK-00{{$cart->id}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('order.update',$cart->id) }}" method="POST">
                        @csrf
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        {{-- <i class="fas fa-globe"></i> AdminLTE, Inc. --}}
                                        <small class="">Tòa Nhà HTC, 238 Hoàng Quốc Việt, Cổ Nhuế, Cầu Giấy,<br>
                                            Hà Nội, Việt Nam</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <hr>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    <address>
                                        <strong>DATE</strong><br>
                                        {{ $cart->created_at->format('d/m/Y') }}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>INVOICE NO<br></b>
                                    #{{ $cart->id }}
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">

                                    <address>
                                        <strong>Invoice To</strong><br>
                                        {{ $cart->order_name }}<br>
                                        {{ $cart->order_address }}<br>
                                        {{ $cart->order_phone }}<br>
                                        {{ $cart->order_email }}
                                    </address>
                                </div>
                                <!-- /.col -->

                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Sản phẩm</th>
                                                <th>Mô tả sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Đơn giá</th>
                                                <th>Tổng tiền gốc</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($cart_detail as $value)
                                            <tr>
                                                <td>{{ $value->product_id }}</td>
                                                <td>{{ $value->product->name }}</td>
                                                <td>{{ $value->description }}</td>
                                                <td>{{ $value->quantity }}</td>
                                                <td>₫
                                                    {{ number_format($value->product->sale_price??$value->product->price,0,',','.') }}
                                                </td>
                                                @if($value->product->sale_price>0)
                                                <td>₫
                                                    {{ number_format($value->quantity * $value->product->sale_price ,0,',','.') }}
                                                </td>
                                                @else
                                                <td>₫
                                                    {{ number_format($value->quantity * $value->product->price ,0,',','.') }}
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <p class="lead">Lưu Ý:</p>
                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                        {{ $cart->order_note }}
                                    </p>
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    {{-- <p class="lead">Amount Due 2/22/2014</p> --}}

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:75%">Tổng tiền:</th>
                                                {{-- @php
                                                $grand_total = 0;
                                                $sale_total = 0;
                                                foreach ($cart_detail as $value) {
                                                if($value->product->sale_price > 0){
                                                $sale_total += $value->total;
                                                $grand_total += $value->quantity * $value->product->sale_price;
                                                }else{
                                                $sale_total += $value->total;
                                                $grand_total += $value->quantity * $value->product->price;
                                                }
                                                }
                                                @endphp --}}
                                                <td>₫<span class="float-right">{{ number_format($cart->order_total,0,',','.') }}</span></td>
                                            </tr>
                                            {{-- <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr> --}}
                                            <tr>
                                                <th>Phí vận chuyển:</th>
                                                <td>₫ <span class="float-right">0.0</span></td>
                                            </tr>
                                            <tr>
                                                <th>Giảm giá:</th>
                                                @if($cart->order_totalDiscount != null)
                                                <td>₫ <span class="float-right">- {{ number_format($cart->order_total - $cart->order_totalDiscount,0,',','.') }}</span></td>
                                                @else
                                                <td>₫ <span class="float-right">0</span></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>Tổng thanh toán:</th>
                                                @if($cart->order_totalDiscount != null)
                                                <td>₫ <span class="float-right">{{ number_format($cart->order_totalDiscount,0,',','.') }}</span></td>
                                                @else
                                                <td>₫ <span class="float-right">{{ number_format($cart->order_total,0,',','.') }}</span></td>
                                                @endif

                                             
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control" name="status">
                                            {{-- @if ($cart->status ==  $value)
                                        <option class="order-status-{{Str::lower($key)}}"
                                            value="{{$cart->status}}">{{__('order_status.ORDER.STATUS'.'.'.Str::lower($key))}}
                                            </option>
                                            @endif --}}
                                            <option value="2">Chờ giao hàng</option>
                                            <option value="3">Đang vận chuyển</option>
                                            <option value="4">Đã giao hàng</option>
                                            <option value="5">Đã hủy</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-primary float-right">Lưu</button>
                                </div>
                            </div>
                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                   <button type="button"
                                        class="btn btn-default" id='print-pdf'><i class="fas fa-print"></i> In hóa đơn</button>
                                    {{-- <button type="button" class="btn btn-success float-right"><i
                                            class="far fa-credit-card"></i> Submit
                                        Payment
                                    </button>
                                    <button type="button" class="btn btn-primary float-right"
                                        style="margin-right: 5px;">
                                        <i class="fas fa-download"></i> Generate PDF
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection


