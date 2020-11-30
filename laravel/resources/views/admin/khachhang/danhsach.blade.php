 @extends('admin.layout.index')

@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách hàng
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(Session::has('thanhcong'))
                        <div class="alert alert-success">
                            {{Session::get('thanhcong')}}
                        </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th> 
                                <th>Gới tính</th> 
                                <th>Email</th>
                                <th>Địa chỉ</th> 
                                <th>Điện thoại</th> 
                                 <th>Delete</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($khachhang as $kh)
                            <tr class="odd gradeX" align="center">
                                <td>{{$kh->id}}</td>
                                <td>{{$kh->name}}</td>
                                <td>{{$kh->gender}}</td>
                                <td>{{$kh->email}}</td>
                                <td>{{$kh->address}}</td>
                                <td>{{$kh->phone_number}}</td>      
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/khachhang/xoa/{{$kh->id}}"> Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
         @endsection