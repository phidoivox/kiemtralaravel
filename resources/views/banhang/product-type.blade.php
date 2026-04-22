@extends('banhang.layout.master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">{{ $loaisp->name ?? 'Tất cả sản phẩm' }}</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{ route('trangchu') }}">Trang chủ</a> / <span>{{ $loaisp->name ?? 'Sản phẩm' }}</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3">
					<ul class="aside-menu">
						@foreach($loai_sp as $loai)
						<li class="{{ isset($loaisp) && $loaisp->id == $loai->id ? 'is-active' : '' }}">
							<a href="{{ route('loaisanpham', $loai->id) }}">{{ $loai->name }}</a>
						</li>
						@endforeach
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="beta-products-list">
						<h4>{{ $loaisp->name ?? 'Sản phẩm' }}</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{ $products->total() }} sản phẩm</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($products as $sp)
							<div class="col-sm-4" style="margin-bottom:20px;">
								<div class="single-item">
									@if($sp->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{ route('chitietsanpham', $sp->id) }}"><img src="image/product/{{ $sp->image }}" alt="{{ $sp->name }}" height="200px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{ $sp->name }}</p>
										<p class="single-item-price" style="font-size: 18px">
											@if($sp->promotion_price == 0)
												<span class="flash-sale">{{ number_format($sp->unit_price) }} đồng</span>
											@else
												<span class="flash-del">{{ number_format($sp->unit_price) }} đồng</span>
												<span class="flash-sale">{{ number_format($sp->promotion_price) }} đồng</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption" style="margin-top:10px;">
										<a class="add-to-cart pull-left" href="{{ route('addToCart', $sp->id) }}" title="Thêm vào giỏ hàng"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{ route('chitietsanpham', $sp->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{ $products->links("pagination::bootstrap-4") }}</div>
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->
		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection
