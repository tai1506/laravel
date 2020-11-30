<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SanPhamController extends Controller
{
    public function getDanhSach(){
       	$sanpham = Product::all();
        return view('admin.sanpham.danhsach',['sanpham'=>$sanpham]);
    }
	
	public function getThem(){
        return view('admin.sanpham.them');
    }

    public function postThem(Request $req){
        $this->validate($req,
            [
				'name'=>'required|min:3|max:100',
                'id_supplier'=>'required',
				'id_type'=>'required',
				'description'=>'required',
                'image'=>'required',
            ],
            [
                'name.required'=>'Bạn chưa nhập tên sản phẩm',
                'name.min'=>'Tên sản phẩm phải có độ dài từ 3 cho đến 100 ký tự',
                'name.max'=>'Tên sản phẩm không quá 100 ký tự',
				'id_supplier.required'=>'Bạn chưa chọn nhà cung cấp',
				'id_type.required'=>'Bạn chưa chọn thể loại',
                'description.required'=>'Bạn chưa nhập mô tả',
                'image.required'=>'Bạn chưa nhập hình ảnh',
                
            ]);
        $sanpham = new Product;
        $sanpham->name = $req->name;
		$sanpham->id_supplier = $req->id_supplier;
		$sanpham->id_type = $req->id_type;
		$sanpham->description = $req->description;
        $sanpham->quantity = $req->quantity;
		$sanpham->unit_price = $req->unit_price;
		$sanpham->promotion_price = $req->promotion_price;
		$sanpham->image = $req->image;
        $sanpham->save();
        return redirect('admin/sanpham/them')->with('thanhcong','Thêm thành công');
    }
	
	public function getSua($id){
       $sanpham = Product::find($id);
       return view('admin.sanpham.sua',['sanpham'=>$sanpham]);
    }
    public function postSua(Request $req,$id){
        $sanpham = Product::find($id);
         $this->validate($req,
            [
                'name'=>'required|min:3|max:100',
				'description'=>'required',
                'image'=>'required',
            ],
            [
                'name.required'=>'Bạn chưa nhập tên sản phẩm',
                'name.min'=>'Tên sản phẩm phải có độ dài từ 3 cho đến 100 ký tự',
                'name.max'=>'Mật khẩu không quá 100 ký tự',
                'description.required'=>'Bạn chưa nhập mô tả',
                'image.required'=>'Bạn chưa nhập hình ảnh',
            ]
        );

        $sanpham->name = $req->name;
		$sanpham->id_supplier = $req->id_supplier;
		$sanpham->id_type = $req->id_type;
		$sanpham->description = $req->description;
        $sanpham->quantity = $req->quantity;
		$sanpham->unit_price = $req->unit_price;
		$sanpham->promotion_price = $req->promotion_price;
		$sanpham->image = $req->image;
        $sanpham->save();
        return redirect()->back()->with('thanhcong','Sửa thành công');	
	}

	public function getXoa($id){
        $sanpham = Product::find($id);
        $sanpham->delete();
        return redirect('admin/sanpham/danhsach')->with('thanhcong','Xóa thành công');
    }
}