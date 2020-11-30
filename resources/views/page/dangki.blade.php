@extends('master')
@section('content')
<div style="background-color: #ccccff">
<div class="inner-header" style="background-color: #ccccff">
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="http://localhost:88/laravel/public/index">Trang chủ</a> / <span>Đăng ký</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('signin')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					@if(count($errors)>0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
							{{$err}}
							@endforeach
						</div>
					@endif
					@if(Session::has('thanhcong'))
						<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
					@endif
                    <title> Đăng Ký</title>
					<div class="col-sm-6" style="margin-right: 500px; margin-left: 200px">
						<h3>Đăng ký</h3>
						<div class="space50">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Địa chỉ Email*</label>
							<input type="email" name="email" required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Họ và Tên*</label>
							<input type="text" name="fullname" required>
						</div>
						
						<div class="form-block">
							<label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
						</div>

						<div class="form-block">
						<label>Quyền người dùng</label>
                               <label class="radio-inline">
                               <input name="quyen" value="0" type="radio" style="width: 30%">Khách hàng</span>
                            </label>
						</div>

						<div class="form-block">
							<label for="adress">Địa Chỉ*</label>
							<input type="text" name="address" value="Địa chỉ" required>
						</div>


						<div class="form-block">
							<label for="phone">Số điện thoại*</label>
							<input type="text" name="phone" required>
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" name="password" required>
						</div>
						<div class="form-block">
							<label for="phone">Nhập lại password*</label>
							<input type="password" name="re_password" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng Ký</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection
	</div>