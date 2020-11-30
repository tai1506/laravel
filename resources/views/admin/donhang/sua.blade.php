@extends('admin.layout.index')

@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đơn hàng
                            <small>Đơn hàng</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                   <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(Session::has('thanhcong'))
                        <div class="alert alert-success">
                            {{Session::get('thanhcong')}}
                        </div>
                        @endif
						<form action="admin/donhang/sua/{{$donhang->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
							
							<div class="form-group">
                                <label>Ngày đặt hàng</label>
                                <input type="date_order" class="form-control" name="date_order" placeholder="Nhập lại date_order" value="{{$donhang->date_order}}" readonly="" />
                            </div>
							
							<div class="form-group">
                                <label>Tình trạng đơn hang</label>
								<select  type="order_status" class="wc-select" name="order_status" placeholder="Nhập lại order_status">
									<option value="{{$donhang->order_status}}">Đang xử lý</option>
									<option value="Đang chờ lấy hàng">Đang chờ lấy hàng</option>
									<option value="Chờ thanh toán">Chờ thanh toán</option>
									<option value="Hoàn thành">Hoàn thành</option>
								</select>
							</div>
							
							<div class="form-group">
                                <label>Tổng tiền</label>
                                <input type="total" class="form-control" name="total" placeholder="total" value="{{$donhang->total}}" readonly="" />
                            </div>
							
							<div class="form-group">
                                <label>Hình thức thanh toán</label>
                                <input type="payment" class="form-control" name="payment" placeholder="payment" value="{{$donhang->payment}}" readonly="" />
                            </div>
							
                            <button type="submit" class="btn btn-default">Xử lý</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
         @endsection