<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BillDetail;
use App\Bill;

class CTDonHangController extends Controller
{
   public function getDanhSach(){
       	$ctdonhang = BillDetail::all();
        return view('admin.chitietdonhang.danhsach',['ctdonhang'=>$ctdonhang]);  
    }
	
	/*public function getSua($id){
       $ctdonhang = BillDetail::find($id);
       return view('admin.chitietdonhang.sua',['chitietdonhang'=>$ctdonhang]);
    }
    public function postSua(Request $req,$id){
        $donhang = Bill::find($id);
        $donhang->order_status = $req->order_status;
        $donhang->save();
        return redirect()->back()->with('thanhcong','Sửa thành công');

    }
	*/
    public function getXoa($id){
       $ctdonhang = BillDetail::find($id);
	   $ctdonhang->delete();
        return redirect('admin/chitietdonhang/danhsach')->with('thanhcong','Xóa thành công');
    }
}
