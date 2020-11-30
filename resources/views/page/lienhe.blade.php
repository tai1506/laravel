@extends('master')
@section('content')
<div style="background-color: #ccccff">
<div class="inner-header" style="background-color: #ccccff">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Liên hệ</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Liên hệ</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.8575610708003!2d106.68530841411678!3d10.82221066130785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174deb3ef536f31%3A0x8b7bb8b7c956157b!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBUUC5IQ00!5e0!3m2!1svi!2s!4v1592416522866!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Các chi nhánh cửa hàng</h2>
					<div class="space20">&nbsp;</div>
					<p>
						Chi nhánh 1: 466 Tân Kỳ Tân Quý, P.Sơn Kỳ, Q.Tân Phú, Tp.HCM</br>
						Chi nhánh 2: 12 Nguyễn Văn Bảo, Q.Gò Vấp, Tp.HCM </br>
						Chi nhánh 3: 815 Lũy Bán Bích, P.Tân Thành, Q.Tân Phú, Tp.HCM </br>
						Chi nhánh 4: 21 Tô Ký, Q.12, Tp.HCM </br>
						Chi nhánh 5: 468 Tân Kỳ Tân Quý, P.Sơn Kỳ, Q.Tân Phú, Tp.HCM</br>
					</p>
					</br></br>
					<h2>Hổ trợ</h2>
					<p>
						<strong>Sản phẩm mới mua bị lỗi:</strong> Khách hàng có thể gọi điện hay ra trực tiếp cửa hàng để được hoàn trả hoặc đổi mới sản phẩm </br>  
						<strong>Sản phẩm mới mua bị lỗi sẽ được xử lý trong vòng 48 tiếng nếu qua 48 tiếng shop không chịu trách nhiệm. Xin cảm ơn quý khách.</strong></br>
					</p>
					<div class="space20">&nbsp;</div>
					
				</div>
				<div class="col-sm-4">
					<h2>Thông tin liên hệ</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Số điện thoại</h6>
					<p>
						Hotline		   : 18008541<br>
						SDT Quản lý    : 090 686 64 05 (Mr.Tài)<br>
						SDT nhân viên 1: 093 409 43 11 (Mr.Phú</br>
						SDT nhân viên 2: 094 656 24 67 (Ms.Sang)</br>
						SDT nhân viên 3: 033 963 67 91 (Mr.Trí)
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Địa chỉ mail</h6>
					<p>
						Gmail Congty: shopesport@gmail.com </br>
						<a href="http://gmail.com">Hỏi đáp xin hãy gửi mail</a>
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Trang web</h6>
					<p>
						http://localhost:88/laravel/public/index </br>
						<a href="http://localhost:88/laravel/public/index">EsportVN.com</a>
					</p>
				</div>
			</div>
		</div> <!-- #content -->
@endsection
