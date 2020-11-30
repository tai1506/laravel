<?php 

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin/dangnhap','UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','UserController@postDangnhapAdmin');
Route::get('admin/logout','UserController@getDangXuatAdmin');




Route::get('index',[
	'as'=>'trang-chu',
	'uses'=>'Pagecontroller@getIndex'
]);

Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'Pagecontroller@getLoaiSp'
]);

Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'Pagecontroller@getChitiet'
]);

Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'Pagecontroller@getLienHe'
]);

Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'Pagecontroller@getGioiThieu'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'themgioihang',
	'uses'=>'Pagecontroller@getAddtoCart'
]);

Route::get('del-cart/{id}',[
	'as'=>'xoagioihang',
	'uses'=>'Pagecontroller@getDelItemCart'
]);

Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'Pagecontroller@getCheckout'
]);

Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'Pagecontroller@getpostCheckout'
]);


Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'Pagecontroller@getLogin'
]);


Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'Pagecontroller@postLogin'
]);




Route::get('dang-ki',[
	'as'=>'signin',
	'uses'=>'Pagecontroller@getSignin'
]);


Route::post('dang-ki',[
	'as'=>'signin',
	'uses'=>'Pagecontroller@postSignin'
]);


Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'Pagecontroller@getLogout'
]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'Pagecontroller@getSearch'
]);

Route::group(['prefix'=>'admin'], function (){
	Route::group(['prefix'=>'theloai'], function (){
		Route::get('danhsach','TheLoaiController@getDanhSach');

		Route::get('sua/{id}','TheLoaiController@getSua');
		Route::post('sua/{id}','TheLoaiController@postSua');
		

		Route::get('them','TheLoaiController@getThem');

		Route::post('them','TheLoaiController@postThem');

		Route::get('xoa/{id}','TheLoaiController@getXoa');



	});




Route::group(['prefix'=>'user'], function (){
		Route::get('danhsach','UserController@getDanhSach');

		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');
		

		Route::get('them','UserController@getThem');

		Route::post('them','UserController@postThem');

		Route::get('xoa/{id}','UserController@getXoa');



	});


	Route::group(['prefix'=>'loaitin'], function (){
		Route::get('danhsach','TheLoaiController@getDanhSach');

		Route::get('sua','TheLoaiController@getSua');

		Route::get('them','TheLoaiController@getThem');



	});

	Route::group(['prefix'=>'tintuc'], function (){
		Route::get('danhsach','TheLoaiController@getDanhSach');

		Route::get('sua','TheLoaiController@getSua');

		Route::get('them','TheLoaiController@getThem');



	});

	Route::group(['prefix'=>'khachhang'], function (){
		Route::get('danhsach','KhachhangController@getDanhSach');

		Route::get('sua','KhachhangController@getSua');

		Route::get('them','KhachhangController@getThem');
		Route::get('xoa/{id}','KhachhangController@getXoa');



	});
});


