@extends('admin.layout.index')

@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chi tiết đơn hàng
                            <small>Chi tiết đơn hàng</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID_Bill</th>
								<th>ID_Product</th>
                                <th>Quantity</th>
                                <th>Unit_Price</th>
                                <th>Delete</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ctdonhang as $ctdh)
                            <tr class="odd gradeX" align="center">
                                <td>{{$ctdh->id}}</td>
								<td>{{$ctdh->id_product}}</td>
								<td>{{$ctdh->quantity}}</td>
								<td>{{$ctdh->unit_price}}</td>
								<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/chitietdonhang/xoa/{{$ctdh->id}}">Delete</a></td>
                                
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