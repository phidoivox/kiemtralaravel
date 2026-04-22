<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check())
                        <li><a href="#"><i class="fa fa-user"></i>Chào bạn {{Auth::user()->full_name}}</a></li>
                        @if(Auth::user()->level == 1)
                            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-cog"></i> Quản trị</a></li>
                        @endif
                        <li>
                            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li><a href="{{route('signin')}}">Đăng kí</a></li>
                        <li><a href="{{route('login')}}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{ route('trangchu') }}" id="logo"><img src="assets/dest/images/logo-cake.png" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('search')}}">
                        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    @php
                        $cartItems = session('cart', []);
                        $cartTotalQty = 0;
                        $cartTotalPrice = 0;
                        foreach($cartItems as $ci){
                            $cartTotalQty += $ci['qty'];
                            $cartTotalPrice += $ci['price'];
                        }
                    @endphp
                    <div class="cart">
                        <div class="beta-select">
                            <a href="{{ route('giohang') }}" style="color:inherit; text-decoration:none;">
                                <i class="fa fa-shopping-cart"></i>
                                Giỏ hàng
                                @if($cartTotalQty > 0)
                                    ({{ $cartTotalQty }})
                                @else
                                    (Trống)
                                @endif
                                <i class="fa fa-chevron-down"></i>
                            </a>
                        </div>
                        <div class="beta-dropdown cart-body">
                            @if(count($cartItems) > 0)
                                @foreach($cartItems as $id => $item)
                                <div class="cart-item">
                                    <a class="cart-item-delete" href="{{ route('giohang.remove', $id) }}"><i class="fa fa-times"></i></a>
                                    <div class="media">
                                        <a class="pull-left" href="{{ route('chitietsanpham', $id) }}">
                                            <img src="image/product/{{ $item['image'] }}" alt="" style="width:50px; height:50px; object-fit:cover;">
                                        </a>
                                        <div class="media-body">
                                            <span class="cart-item-title">{{ $item['name'] }}</span>
                                            <span class="cart-item-amount">{{ $item['qty'] }} x <span>{{ number_format($item['unit_price']) }}đ</span></span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif

                            <div class="cart-caption">
                                <div class="cart-total text-right">
                                    Tổng tiền:
                                    <span class="cart-total-value">{{ number_format($cartTotalPrice) }} đ</span>
                                </div>
                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="{{ route('giohang') }}" class="beta-btn primary text-center">Xem giỏ hàng <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .cart -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{ route('trangchu') }}">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach($loai_sp as $loai)
                            <li><a href="{{ route('loaisanpham', $loai->id) }}">{{ $loai->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('giohang') }}">Giỏ hàng</a></li>
                    <li><a href="{{ route('gioithieu') }}">Giới thiệu</a></li>
                    <li><a href="{{ route('lienhe') }}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->
