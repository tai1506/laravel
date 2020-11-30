<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class KhachhangController extends Controller
{
   public function getDanhSach(){
       	$khachhang = Customer::all();
        return view('admin.khachhang.danhsach',['khachhang'=>$khachhang]);  
    }

    public function getXoa($id){
        $khachhang = Customer::find($id);
       $khachhang->delete();
        return redirect('admin/khachhang/danhsach')->with('thanhcong','Xóa thành công');
    }
}
