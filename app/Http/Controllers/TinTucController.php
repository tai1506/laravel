<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class TinTucController extends Controller
{
    public function getDanhSach(){
       	$tintuc = News::all();
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }

    public function getThem(){
        return view('admin.tintuc.them');
    }

    public function postThem(Request $req){

        $this->validate($req,
    		[
				'id_user'=>'required',
    			'title'=>'required',
    			'content'=>'required',
    			'image'=>'required',
    		],

    		[
				'id_user.required'=>'Bạn chưa nhập id người thêm',
    			'title.required'=>'Bạn chưa nhập tiêu đề',
    			'content.required'=>'Bạn chưa nhập nôi dung',
    			'image.required'=>'bạn chưa nhập hình ảnh',
    		]
    	);
        $tintuc = new News;
		$tintuc->id_user = $reg->id_user;
        $tintuc->title = $req->title;
        $tintuc->content = $req->content;
        $tintuc->image = $req->image;
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thanhcong','Thêm thành công');
    }

    public function getSua($id){
       $tintuc = News::find($id);
       return view('admin.tintuc.sua',['tintuc'=>$tintuc]);
    }
    public function postSua(Request $req,$id){
        $tintuc = News::find($id);
         $this->validate($req,
    		[
    			'title'=>'required|unique:News,title',
    			'content'=>'required',
    			'image'=>'required|unique:News,image',
    		],

    		[
    			'title.required'=>'Bạn chưa nhập tiêu đề',
				'title.unique'=>'Tiêu đề đã tồn tại',
    			'content.required'=>'Bạn chưa nhập nôi dung',
    			'image.required'=>'bạn chưa nhập hình ảnh',
				'image.unique'=>'Hình ảnh đã tồn tại',
    		]
    	);
        $tintuc->title = $req->title;
        $tintuc->content = $req->content;
        $tintuc->image = $req->image;
        $tintuc->save();
        return redirect()->back()->with('thanhcong','Sửa thành công');

    }
    public function getXoa($id){
        $tintuc = News::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('thanhcong','Xóa thành công');
    }
}
