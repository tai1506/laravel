<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;

class TheLoaiController extends Controller
{
    public function getDanhSach(){
       	$theloai = ProductType::all();
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }

    public function getThem(){
        return view('admin.theloai.them');
    }

    public function postThem(Request $req){

        $this->validate($req,
            [
                'name'=>'required|min:3|max:100|unique:type_products,name',
                'description'=>'required',
                'image'=>'required',
            ],
            [
                'name.required'=>'Bạn chưa nhập thể loại',
                'name.min'=>'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
                'name.max'=>'Mật khẩu không quá 100 ký tự',
                'description.required'=>'Bạn chưa nhập mô tả',
                'image.required'=>'Bạn chưa nhập hình ảnh',
                'name.unique'=>'Thể loại đã tồn tại',
                
            ]);
        $theloai = new ProductType;
        $theloai->name = $req->name;
        $theloai->description = $req->description;
        $theloai->image = $req->image;
        $theloai->save();
        return redirect('admin/theloai/them')->with('thanhcong','Thêm thành công');
    }

    public function getSua($id){
       $theloai = ProductType::find($id);
       return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    public function postSua(Request $req,$id){
        $theloai = ProductType::find($id);
         $this->validate($req,
            [
                'name'=>'required|unique:type_products,name|min:3|max:100',
            ],
            [
                'name.required'=>'Bạn chưa nhập thể loại',
                'name.unique'=>'Thể loại đã tồn tại',
                'name.min'=>'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
                'name.max'=>'Mật khẩu không quá 100 ký tự',
            ]
        );

         $theloai->name = $req->name;
        $theloai->save();
        return redirect()->back()->with('thanhcong','Sửa thành công');

    }
    public function getXoa($id){
        $theloai = ProductType::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thanhcong','Xóa thành công');
    }
}
