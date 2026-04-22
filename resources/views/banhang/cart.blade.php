@extends('banhang.layout.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Giỏ hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trangchu')}}">Trang chủ</a> / <span>Giỏ hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">

        {{-- Thông báo --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('error') }}
            </div>
        @endif

        @if(empty($cart))
            <div class="space20">&nbsp;</div>
            <div class="alert alert-info text-center">
                <i class="fa fa-shopping-cart" style="font-size:40px; display:block; margin-bottom:10px;"></i>
                Giỏ hàng của bạn đang trống.
                <br><br>
                <a href="{{route('trangchu')}}" class="beta-btn primary">Tiếp tục mua sắm <i class="fa fa-chevron-right"></i></a>
            </div>
        @else
            <div class="table-responsive">
                <!-- Shop Products Table -->
                <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="product-name">Sản phẩm</th>
                            <th class="product-price">Đơn giá</th>
                            <th class="product-status">Trạng thái</th>
                            <th class="product-quantity">Số lượng</th>
                            <th class="product-subtotal">Thành tiền</th>
                            <th class="product-remove">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $id => $item)
                        <tr class="cart_item">
                            <td class="product-name">
                                <div class="media">
                                    <img class="pull-left" src="image/product/{{ $item['image'] }}" alt="{{ $item['name'] }}" style="width:70px; height:70px; object-fit:cover;">
                                    <div class="media-body">
                                        <p class="font-large table-title">
                                            <a href="{{route('chitietsanpham', $id)}}">{{ $item['name'] }}</a>
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="product-price">
                                <span class="amount">{{ number_format($item['unit_price']) }} đ</span>
                            </td>

                            <td class="product-status">
                                Còn hàng
                            </td>

                            <td class="product-quantity">
                                <div style="display:flex; align-items:center; gap:6px;">
                                    <a href="{{route('giohang.reduce', $id)}}" class="beta-btn primary" style="padding:4px 10px;">-</a>
                                    <span style="font-weight:bold; min-width:20px; text-align:center;">{{ $item['qty'] }}</span>
                                    <a href="{{route('addToCart', $id)}}" class="beta-btn primary" style="padding:4px 10px;">+</a>
                                </div>
                            </td>

                            <td class="product-subtotal">
                                <span class="amount">{{ number_format($item['price']) }} đ</span>
                            </td>

                            <td class="product-remove">
                                <a href="{{route('giohang.remove', $id)}}" class="remove" title="Xóa sản phẩm này"
                                   onclick="return confirm('Bạn có muốn xóa sản phẩm này?')">
                                   <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="6" class="actions">
                                <div class="coupon">
                                    <label for="coupon_code">Mã giảm giá</label>
                                    <input type="text" name="coupon_code" value="" placeholder="Nhập mã giảm giá">
                                    <button type="submit" class="beta-btn primary" name="apply_coupon">Áp dụng <i class="fa fa-chevron-right"></i></button>
                                </div>

                                <a href="{{route('trangchu')}}" class="beta-btn primary">
                                    <i class="fa fa-chevron-left"></i> Tiếp tục mua sắm
                                </a>
                                <a href="{{route('dathang')}}" class="beta-btn primary">
                                    Tiến hành đặt hàng <i class="fa fa-chevron-right"></i>
                                </a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <!-- End of Shop Table Products -->
            </div>

            <!-- Cart Collaterals -->
            <div class="cart-collaterals">
                <div class="cart-totals pull-right">
                    <div class="cart-totals-row"><h5 class="cart-total-title">Tổng giỏ hàng</h5></div>
                    <div class="cart-totals-row">
                        <span>Tổng số lượng:</span>
                        <span>{{ $totalQty }} sản phẩm</span>
                    </div>
                    <div class="cart-totals-row">
                        <span>Phí vận chuyển:</span>
                        <span>Miễn phí</span>
                    </div>
                    <div class="cart-totals-row">
                        <span>Tổng tiền:</span>
                        <span style="font-weight:bold; color:#e44d26;">{{ number_format($totalPrice) }} đồng</span>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
            <!-- End of Cart Collaterals -->
            <div class="clearfix"></div>
        @endif

        <div class="space40">&nbsp;</div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
