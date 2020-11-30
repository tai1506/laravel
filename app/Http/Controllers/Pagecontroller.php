<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Illuminate\Http\Request;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use App\Supplier;
use Hash;
use Auth;





class Pagecontroller extends Controller
{
    public function getIndex(){
        $slide =Slide::all();
    	//return view('page.trangchu',['slide'=>$slide])
        $new_product =Product::where('new',1)->paginate(4);
        $sanpham_khuyenmai =Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }
    public function getLoaiSp($type){
        $sp_theoloai =Product::where('id_type',$type)->get();
        $sp_khac =Product::where('id_type','<>',$type)->paginate(3);
        $loai =ProductType::all();
        $loai_sp =ProductType::where('id',$type)->first();
    	return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }
    public function getChitiet(Request $req){
        $sanpham =Product::where('id',$req->id)->first();
        $sp_tuongtu =Product::where('id_type',$sanpham ->id_type)->paginate(6);
        $sp_new =Product::where('id_type',$sanpham ->id_type)->paginate(4);
        $sp_sale =Product::where('id_type',$sanpham ->id_type)->paginate(4);
        $new_product =Product::where('new',1)->paginate(4);
		//$loai_sp =ProductType::where('id',$sanpham)->first();
    	return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu','sp_new','sp_sale','new_product'));

    }
    public function getLienHe(){
    	return view('page.lienhe');
    }
    public function getGioiThieu(){
    	return view('page.gioithieu');
    }
    public function getAddtoCart(Request $red,$id){
        $product =Product::find($id);
        $oldCart =Session('cart')?Session::get('cart'):null;
        $cart =new Cart($oldCart);
        $cart->add($product,$id);
        $red->Session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getDelItemCart($id){
        $oldCart =Session('cart')?Session::get('cart'):null;
        $cart =new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getCheckout(){
        $oldCart =Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $product_cart = $cart->items;
        $totalPrice = $cart->totalPrice;
        return view('page.dat_hang',['product_cart'=>$product_cart,'cart'=>$cart,'oldCart'=>$oldCart,'totalPrice'=>$totalPrice]);
    }

    public function getpostCheckout(Request $red){
        $cart =Session::get('cart');        
       
	   $customer = new Customer;
        $customer->name = $red->name;
        $customer->gender = $red->gender;
        $customer->email = $red->email;
        $customer->address = $red->address;
        $customer->phone_number = $red->phone;
        $customer->note = $red->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
		$bill->order_status = "Đang xử lý";
        $bill->total = $cart->totalPrice;
        $bill->payment = $red->payment_method;
        $bill->note = $red->notes;
        $bill->save();

        foreach($cart->items as $key => $value){
            $bill_detail = new BillDetail;
            $bill_detail->id = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }  
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }
    public function getLogin(){
        return view('page.trangchu');
    }
    public function getSignin(){
        return view('page.dangki');
    }
    public function postSignin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'quyen'=>'required',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'

            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'email đã có người sử dụng',
                'password.unique'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 ký tự'
            ]);
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->quyen = $req->quyen;
        $user->password =Hash::make($req->password);
		$user->gender = $req->gender;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }
    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20',
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 ký tự',
                'password.max'=>'Mật khẩu không quá 20 ký tự'
            ]
        );
        $credentials =  array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials )){
             return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
    }
    public function getLogout(){
        Auth::logout();
         return redirect()->route('trang-chu');
    }
     public function getSearch(Request $req){
        $product = Product::where('name','like','%'.$req->key.'%')
            ->orwhere('unit_price',$req->key)
            ->get();
            return view('page.search',compact('product'));
     }


   
}

