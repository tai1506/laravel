@extends('admin.layout.index')

@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đơn hàng
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
								<th>ID_Customer</th>
                                <th>Date_order</th>
                                <th>Order_status</th>
                                <th>Total</th>
								<th>Payment</th>
								<th>Note</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donhang as $dh)
                            <tr class="odd gradeX" align="center">
                                <td>{{$dh->id}}</td>
								<td>{{$dh->id_customer}}</td>
                                <td>{{$dh->date_order}}</td>
								<td>{{$dh->order_status}}</td>
                                <td>{{$dh->total}}</td>
                                <td>{{$dh->payment}}</td>
								<td>{{$dh->note}}</td>
								<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/donhang/xoa/{{$dh->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/donhang/sua/{{$dh->id}}">Edit</a></td>
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