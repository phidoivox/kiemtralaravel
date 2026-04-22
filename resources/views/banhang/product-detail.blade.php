@extends('banhang.layout.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm {{$sanpham->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trangchu')}}">Trang chủ</a> / <span>Sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        <img src="image/product/{{$sanpham->image}}" alt="" style="width:100%;">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title">{{$sanpham->name}}</p>
                            <p class="single-item-price" style="font-size: 18px">
                                @if($sanpham->promotion_price==0)
                                    <span class="flash-sale">{{number_format($sanpham->unit_price)}} đồng</span>
                                @else
                                    <span class="flash-del">{{number_format($sanpham->unit_price)}} đồng</span>
                                    <span class="flash-sale">{{number_format($sanpham->promotion_price)}} đồng</span>
                                @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{$sanpham->description}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <p>Tùy chọn:</p>
                        <div class="single-item-options">
                            <select class="wc-select" name="size">
                                <option>Kích cỡ</option>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            <select class="wc-select" name="color">
                                <option>Màu sắc</option>
                                <option value="Red">Đỏ</option>
                                <option value="Green">Xanh lá</option>
                                <option value="Yellow">Vàng</option>
                                <option value="Black">Đen</option>
                                <option value="White">Trắng</option>
                            </select>
                            <select class="wc-select" name="qty">
                                <option>Số lượng</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <a class="add-to-cart" href="{{route('addToCart', $sanpham->id)}}" title="Thêm vào giỏ hàng"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Mô tả</a></li>
                        <li><a href="#tab-reviews">Đánh giá (0)</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{$sanpham->description}}</p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>Chưa có đánh giá</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Sản phẩm tương tự</h4>

                    <div class="row">
                        @foreach($sp_tuongtu as $sptt)
                        <div class="col-sm-4">
                            <div class="single-item">
                                @if($sptt->promotion_price!=0)
                                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                @endif
                                <div class="single-item-header">
                                    <a href="{{route('chitietsanpham', $sptt->id)}}"><img src="image/product/{{$sptt->image}}" alt="" height="250px"></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$sptt->name}}</p>
                                    <p class="single-item-price" style="font-size: 18px">
                                        @if($sptt->promotion_price==0)
                                            <span class="flash-sale">{{number_format($sptt->unit_price)}} đồng</span>
                                        @else
                                            <span class="flash-del">{{number_format($sptt->unit_price)}} đồng</span>
                                            <span class="flash-sale">{{number_format($sptt->promotion_price)}} đồng</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{{route('addToCart', $sptt->id)}}" title="Thêm vào giỏ hàng"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{route('chitietsanpham', $sptt->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">{{$sp_tuongtu->links("pagination::bootstrap-4")}}</div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm bán chạy</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($best_sellers as $bs)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('chitietsanpham', $bs->id)}}"><img src="image/product/{{$bs->image}}" alt=""></a>
                                <div class="media-body">
                                    {{$bs->name}}
                                    <span class="beta-sales-price" style="font-size: 16px">{{number_format($bs->unit_price)}} đồng</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm mới</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($new_product as $new)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('chitietsanpham', $new->id)}}"><img src="image/product/{{$new->image}}" alt=""></a>
                                <div class="media-body">
                                    {{$new->name}}
                                    <span class="beta-sales-price" style="font-size: 16px">{{number_format($new->unit_price)}} đồng</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- new products widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
