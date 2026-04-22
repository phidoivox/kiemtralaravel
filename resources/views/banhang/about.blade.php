@extends('banhang.layout.master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Giới thiệu</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{ route('trangchu') }}">Trang chủ</a> / <span>Giới thiệu</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div id="content">
		<div class="our-history">
			<h2 class="text-center wow fadeInDown">Lịch sử hình thành</h2>
			<div class="space35">&nbsp;</div>

			<div class="history-slider">
				<div class="history-navigation">
					<a data-slide-index="0" href="#" class="circle"><span class="auto-center">2003</span></a>
					<a data-slide-index="1" href="#" class="circle"><span class="auto-center">2005</span></a>
					<a data-slide-index="2" href="#" class="circle"><span class="auto-center">2008</span></a>
					<a data-slide-index="3" href="#" class="circle"><span class="auto-center">2011</span></a>
					<a data-slide-index="4" href="#" class="circle"><span class="auto-center">2015</span></a>
					<a data-slide-index="5" href="#" class="circle"><span class="auto-center">2020</span></a>
					<a data-slide-index="6" href="#" class="circle"><span class="auto-center">2024</span></a>
				</div>

				<div class="history-slides">
					<div>
						<div class="row">
						<div class="col-sm-5">
							<img src="assets/dest/images/history.jpg" alt="">
						</div>
						<div class="col-sm-7">
							<h5 class="other-title">Khởi đầu</h5>
							<p>
								90-92 Lê Thị Riêng, Bến Thành, Quận 1<br />
								Thành phố Hồ Chí Minh<br />
								Việt Nam
							</p>
							<div class="space20">&nbsp;</div>
							<p>Chúng tôi bắt đầu từ một cửa hàng nhỏ với niềm đam mê mang đến những sản phẩm chất lượng nhất cho khách hàng. Với sự nỗ lực không ngừng, chúng tôi đã từng bước xây dựng thương hiệu và tạo dựng niềm tin với hàng nghìn khách hàng trên khắp cả nước.</p>
						</div>
						</div>
					</div>
					<div>
						<div class="row">
						<div class="col-sm-5">
							<img src="assets/dest/images/history.jpg" alt="">
						</div>
						<div class="col-sm-7">
							<h5 class="other-title">Phát triển</h5>
							<p>
								90-92 Lê Thị Riêng, Bến Thành, Quận 1<br />
								Thành phố Hồ Chí Minh<br />
								Việt Nam
							</p>
							<div class="space20">&nbsp;</div>
							<p>Sau hai năm hoạt động, chúng tôi mở rộng quy mô kinh doanh với đội ngũ nhân viên chuyên nghiệp. Hệ thống phân phối được nâng cấp để đáp ứng nhu cầu ngày càng tăng của khách hàng trên toàn quốc.</p>
						</div>
						</div>
					</div>
					<div>
						<div class="row">
						<div class="col-sm-5">
							<img src="assets/dest/images/history.jpg" alt="">
						</div>
						<div class="col-sm-7">
							<h5 class="other-title">Thương mại điện tử</h5>
							<p>
								90-92 Lê Thị Riêng, Bến Thành, Quận 1<br />
								Thành phố Hồ Chí Minh<br />
								Việt Nam
							</p>
							<div class="space20">&nbsp;</div>
							<p>Chúng tôi mở rộng sang lĩnh vực thương mại điện tử, mang đến trải nghiệm mua sắm trực tuyến thuận tiện cho khách hàng. Website được xây dựng với giao diện thân thiện và hệ thống thanh toán an toàn.</p>
						</div>
						</div>
					</div>
					<div>
						<div class="row">
						<div class="col-sm-5">
							<img src="assets/dest/images/history.jpg" alt="">
						</div>
						<div class="col-sm-7">
							<h5 class="other-title">Đổi mới</h5>
							<p>
								90-92 Lê Thị Riêng, Bến Thành, Quận 1<br />
								Thành phố Hồ Chí Minh<br />
								Việt Nam
							</p>
							<div class="space20">&nbsp;</div>
							<p>Chúng tôi không ngừng đổi mới và cải tiến sản phẩm, áp dụng công nghệ hiện đại vào quản lý và vận hành. Đội ngũ nghiên cứu phát triển luôn tìm kiếm những giải pháp sáng tạo nhất.</p>
						</div>
						</div>
					</div>
					<div>
						<div class="row">
						<div class="col-sm-5">
							<img src="assets/dest/images/history.jpg" alt="">
						</div>
						<div class="col-sm-7">
							<h5 class="other-title">Mở rộng</h5>
							<p>
								90-92 Lê Thị Riêng, Bến Thành, Quận 1<br />
								Thành phố Hồ Chí Minh<br />
								Việt Nam
							</p>
							<div class="space20">&nbsp;</div>
							<p>Hệ thống cửa hàng mở rộng ra nhiều tỉnh thành trên cả nước. Dịch vụ giao hàng nhanh chóng và chăm sóc khách hàng chuyên nghiệp giúp chúng tôi giữ vững vị thế trên thị trường.</p>
						</div>
						</div>
					</div>
					<div>
						<div class="row">
						<div class="col-sm-5">
							<img src="assets/dest/images/history.jpg" alt="">
						</div>
						<div class="col-sm-7">
							<h5 class="other-title">Chuyển đổi số</h5>
							<p>
								90-92 Lê Thị Riêng, Bến Thành, Quận 1<br />
								Thành phố Hồ Chí Minh<br />
								Việt Nam
							</p>
							<div class="space20">&nbsp;</div>
							<p>Chúng tôi tiên phong trong chuyển đổi số, ứng dụng AI và Big Data vào phân tích nhu cầu khách hàng. Trải nghiệm mua sắm được cá nhân hóa, mang đến sự hài lòng tối đa cho người dùng.</p>
						</div>
						</div>
					</div>
					<div>
						<div class="row">
						<div class="col-sm-5">
							<img src="assets/dest/images/history.jpg" alt="">
						</div>
						<div class="col-sm-7">
							<h5 class="other-title">Hiện tại</h5>
							<p>
								90-92 Lê Thị Riêng, Bến Thành, Quận 1<br />
								Thành phố Hồ Chí Minh<br />
								Việt Nam
							</p>
							<div class="space20">&nbsp;</div>
							<p>Ngày nay, chúng tôi tự hào là một trong những đơn vị hàng đầu trong lĩnh vực kinh doanh trực tuyến. Cam kết mang đến sản phẩm chất lượng với giá cả hợp lý và dịch vụ khách hàng xuất sắc.</p>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="space50">&nbsp;</div>
		<hr />
		<div class="space50">&nbsp;</div>
		<h2 class="text-center wow fadeInDown">Sứ mệnh và tầm nhìn</h2>
		<div class="space20">&nbsp;</div>
		<p class="text-center wow fadeInLeft">Chúng tôi cam kết mang đến những sản phẩm chất lượng nhất với giá cả hợp lý nhất.<br /> Sự hài lòng của khách hàng là niềm vui và động lực phát triển của chúng tôi.</p>
		<div class="space35">&nbsp;</div>

		<div class="row">
			<div class="col-sm-2 col-sm-push-2">
				<div class="beta-counter">
					<p class="beta-counter-icon"><i class="fa fa-user"></i></p>
					<p class="beta-counter-value timer numbers" data-to="19855" data-speed="2000">19855</p>
					<p class="beta-counter-title">Khách hàng</p>
				</div>
			</div>

			<div class="col-sm-2 col-sm-push-2">
				<div class="beta-counter">
					<p class="beta-counter-icon"><i class="fa fa-picture-o"></i></p>
					<p class="beta-counter-value timer numbers" data-to="3568" data-speed="2000">3568</p>
					<p class="beta-counter-title">Sản phẩm</p>
				</div>
			</div>

			<div class="col-sm-2 col-sm-push-2">
				<div class="beta-counter">
					<p class="beta-counter-icon"><i class="fa fa-clock-o"></i></p>
					<p class="beta-counter-value timer numbers" data-to="258934" data-speed="2000">258934</p>
					<p class="beta-counter-title">Giờ hỗ trợ</p>
				</div>
			</div>

			<div class="col-sm-2 col-sm-push-2">
				<div class="beta-counter">
					<p class="beta-counter-icon"><i class="fa fa-pencil"></i></p>
					<p class="beta-counter-value timer numbers" data-to="150" data-speed="2000">150</p>
					<p class="beta-counter-title">Đối tác</p>
				</div>
			</div>
		</div> <!-- .beta-counter block end -->

		<div class="space50">&nbsp;</div>
		<hr />
		<div class="space50">&nbsp;</div>

		<h2 class="text-center wow fadeInDown">Đội ngũ của chúng tôi</h2>
		<div class="space20">&nbsp;</div>
		<h5 class="text-center other-title wow fadeInLeft">Ban lãnh đạo</h5>
		<p class="text-center wow fadeInRight">Đội ngũ lãnh đạo giàu kinh nghiệm và tâm huyết, <br />luôn dẫn dắt công ty phát triển bền vững.</p>
		<div class="space20">&nbsp;</div>
		<div class="row">
			<div class="col-sm-6 wow fadeInLeft">
				<div class="beta-person media">
					<img class="pull-left" src="assets/dest/images/person2.jpg" alt="">
					<div class="media-body beta-person-body">
						<h5>Nguyễn Văn A</h5>
						<p class="font-large">Giám đốc điều hành</p>
						<p>Với hơn 15 năm kinh nghiệm trong lĩnh vực thương mại điện tử, anh luôn tìm kiếm những giải pháp sáng tạo để mang đến trải nghiệm mua sắm tốt nhất cho khách hàng.</p>
						<a href="#">Xem chi tiết <i class="fa fa-chevron-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-sm-6 wow fadeInRight">
				<div class="beta-person media ">
					<img class="pull-left" src="assets/dest/images/person3.jpg" alt="">
					<div class="media-body beta-person-body">
						<h5>Trần Thị B</h5>
						<p class="font-large">Giám đốc Marketing</p>
						<p>Chuyên gia marketing với tầm nhìn chiến lược, cô đã xây dựng thành công thương hiệu và đưa công ty đến gần hơn với hàng triệu khách hàng trên khắp Việt Nam.</p>
						<a href="#">Xem chi tiết <i class="fa fa-chevron-right"></i></a>
					</div>
				</div>
			</div>
		</div>

		<div class="space60">&nbsp;</div>
		<h5 class="text-center other-title wow fadeInDown">Đội ngũ chuyên gia</h5>
		<p class="text-center wow fadeInUp">Những chuyên gia giỏi nhất trong lĩnh vực, <br />luôn nỗ lực mang đến giá trị tốt nhất.</p>
		<div class="space20">&nbsp;</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="beta-person beta-person-full">
					<div class="bets-img-hover">
						<img src="assets/dest/images/person1.jpg" alt="">
					</div>
					<div class="beta-person-body">
						<h5>Lê Văn C</h5>
						<p class="font-large">Lập trình viên</p>
						<p>Chuyên gia phát triển web với đam mê tạo ra những sản phẩm công nghệ xuất sắc.</p>
						<a href="#">Xem chi tiết <i class="fa fa-chevron-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="beta-person beta-person-full">
					<div class="bets-img-hover">
						<img src="assets/dest/images/person2.jpg" alt="">
					</div>
					<div class="beta-person-body">
						<h5>Phạm Văn D</h5>
						<p class="font-large">Thiết kế</p>
						<p>Designer tài năng với phong cách sáng tạo, mang đến giao diện đẹp mắt và trải nghiệm tuyệt vời.</p>
						<a href="#">Xem chi tiết <i class="fa fa-chevron-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="beta-person beta-person-full">
					<div class="bets-img-hover">
						<img src="assets/dest/images/person3.jpg" alt="">
					</div>
					<div class="beta-person-body">
						<h5>Hoàng Thị E</h5>
						<p class="font-large">Chăm sóc KH</p>
						<p>Luôn lắng nghe và hỗ trợ khách hàng một cách tận tâm, mang đến sự hài lòng tuyệt đối.</p>
						<a href="#">Xem chi tiết <i class="fa fa-chevron-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="beta-person beta-person-full">
					<div class="bets-img-hover">
						<img src="assets/dest/images/person4.jpg" alt="">
					</div>
					<div class="beta-person-body">
						<h5>Đỗ Văn F</h5>
						<p class="font-large">Kho vận</p>
						<p>Quản lý kho vận chuyên nghiệp, đảm bảo sản phẩm đến tay khách hàng nhanh chóng và an toàn.</p>
						<a href="#">Xem chi tiết <i class="fa fa-chevron-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection
