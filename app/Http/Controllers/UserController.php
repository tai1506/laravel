<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
     public function getDanhSach(){
       	$user = User::all();
        return view('admin.user.danhsach',['user'=>$user]);
    }

    public function getThem(){
       	$user = User::all();
        return view('admin.user.them');
    }
    public function postThem(Request $req){
    	$this->validate($req,
    		[
    			'full_name'=>'required|min:3',
    			'email'=>'required|unique:users,email',
    			'password'=>'required|min:6|max:20',
    			'passwordre'=>'required|same:password',
    		],

    		[
    			'full_name.required'=>'Bạn chưa nhập tên người dùng',
    			'full_name.min'=>'Tên người dùng phải ít nhất có 3 ký tự',
    			'email.required'=>'Bạn chưa nhập email',
    			'email.email'=>'Bạn chưa nhập đúng email',
    			'email.unique'=>'email đã tồn tại',
    			'password.required'=>'Bạn chưa nhập password',
    			'password.min'=>'password người dùng phải ít nhất có 6 ký tự',
    			'password.max'=>'password người dùng không được quá 20 ký tự',
    			'passwordre.required'=>'Bạn chưa nhập lại password',
    			'passwordre.same'=>'Password không trùng khớp'
    		]
    	);
    	$user = new User;
    	$user ->full_name = $req->full_name;
    	$user->email = $req->email;
    	$user->password =bcrypt($req->password);
    	$user->quyen = $req->quyen;
    	$user->save();
    	return redirect('admin/user/them')->with('thanhcong','Thêm thành công');
	}
    public function getSua($id){
        $user = User::find($id);
        return view('admin/user/sua',['user'=>$user]);
    }
    public function postSua(Request $req,$id){
        $this->validate($req,
            [
                'full_name'=>'required|min:3',
               
                
            ],

            [
                'full_name.required'=>'Bạn chưa nhập tên người dùng',
                'full_name.min'=>'Tên người dùng phải ít nhất có 3 ký tự',
            ]

        );
        $user = User::find($id);
        $user ->full_name = $req->full_name;
        $user->quyen = $req->quyen;


        if($req->ChangePassword == "on")
        {
            $this->validate($req,
            [
                
                'password'=>'required|min:6|max:20',
                'passwordre'=>'required|same:password',
            ],

            [
                
                'password.required'=>'Bạn chưa nhập password',
                'password.min'=>'password người dùng phải ít nhất có 6 ký tự',
                'password.max'=>'password người dùng không được quá 20 ký tự',
                'passwordre.required'=>'Bạn chưa nhập lại password',
                'passwordre.same'=>'Password không trùng khớp'
            ]
        );
            $user->password =bcrypt($req->password);
        }
        




        $user->save();
        return redirect()->back()->with('thanhcong','Sửa thành công');

    }
    public function getXoa($id){
        $user = User::find($id);
         $user ->delete();
        return redirect('admin/user/danhsach')->with('thanhcong','Xóa thành công');
    }

     public function getDangnhapAdmin(){
        return view('admin.login');
     }

      public function postDangnhapAdmin(Request $req){

         $this->validate($req,
            [
                'email'=>'required',
                 'password'=>'required|min:6|max:20',
            ],
            [
                'email.required'=>'Bạn chưa nhập email',
                'password.required'=>'Bạn chưa nhập password',
                'password.min'=>'password người dùng phải ít nhất có 6 ký tự',
                'password.max'=>'password người dùng không được quá 20 ký tự',

            ]);
         if(Auth::attempt(['email'=>$req->email,'password'=>$req->password]))
         {
            return redirect('admin/theloai/danhsach');
         }
         else
         {
            return redirect('admin/dangnhap')->with('thongbao','Đăng nhập thành công');
         }

      }

       public function getDangXuatAdmin()
       {
        Auth::logout();
        return redirect('admin/dangnhap');
       }
        
}	
