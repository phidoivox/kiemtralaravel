@extends('banhang.layout.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đặt hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('trangchu')}}">Trang chủ</a> / <span>Đặt hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @php
            $cart = session('cart', []);
            $totalQty = 0;
            $totalPrice = 0;
            foreach($cart as $ci){
                $totalQty += $ci['qty'];
                $totalPrice += $ci['price'];
            }
        @endphp

        @if(empty($cart))
            <div class="space20">&nbsp;</div>
            <div class="alert alert-warning text-center">
                Giỏ hàng trống! Vui lòng thêm sản phẩm trước khi đặt hàng.
                <br><br>
                <a href="{{route('trangchu')}}" class="beta-btn primary">Quay về trang chủ <i class="fa fa-chevron-right"></i></a>
            </div>
        @else
        <form action="{{ route('dathang.post') }}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <h4>Đặt hàng</h4>
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="name">Họ tên*</label>
                        <input type="text" id="name" name="name" placeholder="Họ tên" required>
                    </div>
                    <div class="form-block">
                        <label>Giới tính </label>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
                        <input id="gender2" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
                    </div>

                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="email" required placeholder="expample@gmail.com">
                    </div>

                    <div class="form-block">
                        <label for="address">Địa chỉ*</label>
                        <input type="text" id="address" name="address" placeholder="Địa chỉ giao hàng" required>
                    </div>

                    <div class="form-block">
                        <label for="phone">Điện thoại*</label>
                        <input type="text" id="phone" name="phone" required>
                    </div>

                    <div class="form-block">
                        <label for="notes">Ghi chú</label>
                        <textarea id="notes" name="notes"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="your-order-item">
                                <div>
                                @foreach($cart as $id => $item)
                                <!--  one item -->
                                    <div class="media" style="margin-bottom:10px; padding-bottom:10px; border-bottom:1px solid #eee;">
                                        <img width="25%" src="image/product/{{ $item['image'] }}" alt="" class="pull-left" style="max-width:80px; margin-right:10px;">
                                        <div class="media-body">
                                            <p class="font-large">{{ $item['name'] }}</p>
                                            <span class="color-gray your-order-info">Đơn giá: {{ number_format($item['unit_price']) }} đ</span>
                                            <span class="color-gray your-order-info">Số lượng: {{ $item['qty'] }}</span>
                                            <span class="color-gray your-order-info" style="font-weight:bold;">Thành tiền: {{ number_format($item['price']) }} đ</span>
                                        </div>
                                    </div>
                                <!-- end one item -->
                                @endforeach
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Tổng số lượng:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{ $totalQty }} sản phẩm</h5></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Phí vận chuyển:</p></div>
                                <div class="pull-right"><h5 class="color-black">Miễn phí</h5></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                <div class="pull-right"><h5 style="color:#e44d26;">{{ number_format($totalPrice) }} đồng</h5></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked">
                                    <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                    <div class="payment_box payment_method_bacs" style="display: block;">
                                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                    </div>
                                </li>

                                <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM">
                                    <label for="payment_method_cheque">Chuyển khoản </label>
                                    <div class="payment_box payment_method_cheque" style="display: none;">
                                        Chuyển tiền đến tài khoản sau:
                                        <br>- Số tài khoản: 123 456 789
                                        <br>- Chủ TK: Nguyễn A
                                        <br>- Ngân hàng ACB, Chi nhánh TPHCM
                                    </div>
                                </li>

                            </ul>
                        </div>

                        <div class="text-center"><button type="submit" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
        @endif
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection