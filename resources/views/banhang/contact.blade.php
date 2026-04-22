@extends('banhang.layout.master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Liên hệ</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{ route('trangchu') }}">Trang chủ</a> / <span>Liên hệ</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="beta-map">
	<div class="abs-fullwidth beta-map wow flipInX">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.517835073!2d106.6885!3d10.7726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3ae1a4f0b9%3A0x5b7bdb0e5c56db63!2zOTAtOTIgTMOqIFRo4buLIFJpw6puZywgUGjGsOG7nW5nIELhur9uIFRow6BuaCwgUXXhuq1uIDEsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1625000000000!" style="border:0; width:100%; height:400px;" allowfullscreen="" loading="lazy"></iframe>
	</div>
</div>
<div class="container">
	<div id="content" class="space-top-none">

		<div class="space50">&nbsp;</div>
		<div class="row">
			<div class="col-sm-8">
				<h2>Gửi tin nhắn cho chúng tôi</h2>
				<div class="space20">&nbsp;</div>
				<p>Nếu bạn có bất kỳ câu hỏi nào về sản phẩm, dịch vụ hoặc cần hỗ trợ, vui lòng điền vào biểu mẫu bên dưới. Chúng tôi sẽ phản hồi trong thời gian sớm nhất.</p>
				<div class="space20">&nbsp;</div>

				@if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
				@endif

				<form action="{{ route('lienhe.post') }}" method="post" class="contact-form">
					@csrf
					<div class="form-block">
						<input name="name" type="text" placeholder="Họ và tên (*)" value="{{ old('name') }}">
						@error('name')
						<span style="color:red; font-size:12px;">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-block">
						<input name="email" type="email" placeholder="Email (*)" value="{{ old('email') }}">
						@error('email')
						<span style="color:red; font-size:12px;">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-block">
						<input name="phone" type="text" placeholder="Số điện thoại" value="{{ old('phone') }}">
					</div>
					<div class="form-block">
						<input name="subject" type="text" placeholder="Tiêu đề" value="{{ old('subject') }}">
					</div>
					<div class="form-block">
						<textarea name="message" placeholder="Nội dung tin nhắn (*)">{{ old('message') }}</textarea>
						@error('message')
						<span style="color:red; font-size:12px;">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-block">
						<button type="submit" class="beta-btn primary">Gửi tin nhắn <i class="fa fa-chevron-right"></i></button>
					</div>
				</form>
			</div>
			<div class="col-sm-4">
				<h2>Thông tin liên hệ</h2>
				<div class="space20">&nbsp;</div>

				<h6 class="contact-title"><i class="fa fa-map-marker"></i> Địa chỉ</h6>
				<p>
					90-92 Lê Thị Riêng,<br>
					Phường Bến Thành, Quận 1<br>
					Thành phố Hồ Chí Minh
				</p>
				<div class="space20">&nbsp;</div>
				<h6 class="contact-title"><i class="fa fa-phone"></i> Điện thoại</h6>
				<p>
					Hotline: 0163 296 7751<br>
					Tư vấn: 0123 456 789
				</p>
				<div class="space20">&nbsp;</div>
				<h6 class="contact-title"><i class="fa fa-envelope"></i> Email</h6>
				<p>
					<a href="mailto:info@banhang.com">info@banhang.com</a><br>
					<a href="mailto:support@banhang.com">support@banhang.com</a>
				</p>
				<div class="space20">&nbsp;</div>
				<h6 class="contact-title"><i class="fa fa-clock-o"></i> Giờ làm việc</h6>
				<p>
					Thứ 2 - Thứ 6: 8:00 - 17:30<br>
					Thứ 7: 8:00 - 12:00<br>
					Chủ nhật: Nghỉ
				</p>
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection
