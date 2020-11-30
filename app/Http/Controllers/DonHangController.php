<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;

class DonHangController extends Controller
{
   public function getDanhSach(){
       	$donhang = Bill::all();
        return view('admin.donhang.danhsach',['donhang'=>$donhang]);  
    }
	
	public function getSua($id){
       $donhang = Bill::find($id);
       return view('admin.donhang.sua',['donhang'=>$donhang]);
    }
    public function postSua(Request $req,$id){
        $donhang = Bill::find($id);
        $donhang->order_status = $req->order_status;
        $donhang->save();
        return redirect()->back()->with('thanhcong','Sửa thành công');

    }
	
    public function getXoa($id){
       $donhang = Bill::find($id);
       $donhang->delete();
        return redirect('admin/donhang/danhsach')->with('thanhcong','Xóa thành công');
    }
}
