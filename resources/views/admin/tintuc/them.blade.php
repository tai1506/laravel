@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>Thêm</small>
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
						<form action="admin/tintuc/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>ID của người thêm</label>
                                <input class="form-control" name="id_user" placeholder="Nhập id người thêm" />
                            </div>
							<div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="title" placeholder="Nhập tên tiêu đề" />
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <input class="form-control" name="content" rows="3" placeholder="Nhập tên tiêu đề" />
                            </div>
							
							<div class="form-group">
                                <label>Hình ảnh</label>
                                <input class="form-control" name="image" placeholder="Nhập hình ảnh" />
                            </div>
							
                            <button type="submit" class="btn btn-default">Thêm tin tức</button>
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