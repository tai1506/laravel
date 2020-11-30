@extends('admin.layout.index')

@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa sản phẩm
                            <small>{{$sanpham->name}}</small>
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
                        <form action="admin/sanpham/sua/{{$sanpham->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" name="name" placeholder="Nhập tên sản phẩm" value="{{$sanpham->name}}"/>
                            </div>

                            <div class="form-group">
                                <label>Nhà cung cấp:</label>
								<select style="margin-left: 30px" type="id_supplier" class="wc-select" name="id_supplier" placeholder="nhập lại nhà cung cấp" value="{{$sanpham->id_supplier}}">
									<option value="1">Converse VN</option>
									<option value="2">Nike VN</option>
									<option value="3">Adidas VN</option>
									<option value="4">Vans VN</option>
									<option value="5">Yeezy VN</option>
									<option value="6">Authentic VN</option>
									<option value="7">Gucci VN</option>
								</select>
                            </div>
							
							<div class="form-group">
                                <label>Thể loại:</label>
								<select style="margin-left: 68px" type="id_type" class="wc-select" name="id_type" placeholder="nhập lại thể loại" value="{{$sanpham->id_type}}">
									<option value="1">Converse</option>
									<option value="2">Nike</option>
									<option value="3">Adidas</option>
									<option value="4">Vans</option>
									<option value="5">Yeezy</option>
									<option value="6">Dép Authentic</option>
									<option value="7">Gucci</option>
								</select>
                            </div>

							<div class="form-group">
                                <label>Mô tả</label>
								<textarea class="form-control" name="description" placeholder="Nhập mô tả"  rows="4" value="">{{$sanpham->description}}</textarea>
                            </div>
							
							<div class="form-group">
                                <label>Số lượng</label></br>
                                <input class="form-control" name="quantity" placeholder="Nhập số lượng" value="{{$sanpham->quantity}}"/>
                            </div>
							
							<div class="form-group">
                                <label>Giá</label></br>
                                <input class="form-control" name="unit_price" placeholder="Nhập giá" value="{{$sanpham->unit_price}}"/>
                            </div>
							
                            <div class="form-group">
                                <label>Giá giảm</label></br>
                                <input class="form-control" name="promotion_price" placeholder="Nhập giá giảm" value="{{$sanpham->promotion_price}}"/>
                            </div>
							
							<div class="form-group">
                                <label>Chi tiết</label>
                                <input class="form-control" name="detail" placeholder="Nhập chi tiết" value="{{$sanpham->detail}}"/>
                            </div>
							
							<div class="form-group">
                                <label>Hình ảnh</label>
                                <input class="form-control" name="image" placeholder="Chọn ảnh" value="{{$sanpham->image}}"/>
                            </div>
                            
							
                            <button type="submit" class="btn btn-default">Sửa sản phẩm</button>
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