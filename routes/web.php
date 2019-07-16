<?php

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
    return view('pages.trangtru');
});
Route::get('admin/dangnhap','usercontroller@getdangnhapadmin');
Route::post('admin/dangnhap','usercontroller@postdangnhapadmin');
Route::get('admin/dangxuat','usercontroller@getdangxuatadmin');
Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){
	//admin/theloai/danhsach
	Route::get('home',function(){
		return view('layout.index');
	});
	Route::group(['prefix'=>'theloai'],function(){
		Route::get('danhsach','theloaicontroller@getdanhsach');

		Route::get('sua/{id}','theloaicontroller@getsua');
		Route::post('sua/{id}','theloaicontroller@postsua')->name('suatl');

		Route::get('them','theloaicontroller@getthem');
		Route::post('them','theloaicontroller@postthem')->name('themtl');
		//xóa thể loại
		Route::get('xoa/{id}','theloaicontroller@getxoa');
		
	});
		//loaitin
		Route::group(['prefix'=>'loaitin'],function(){
		Route::get('danhsach','loaitincontroller@getdanhsach');
		Route::get('sua/{id}','loaitincontroller@getsua');
		Route::post('sua/{id}','loaitincontroller@postsua')->name('sualt');
		Route::get('them','loaitincontroller@getthem');
		Route::post('them','loaitincontroller@postthem');
		Route::get('xoa/{id}','loaitincontroller@getxoa');
	});
		//tintuc
		Route::group(['prefix'=>'tintuc'],function(){
		Route::get('danhsach','tintuccontroller@getdanhsach');
		Route::get('sua/{id}','tintuccontroller@getsua');
		Route::post('sua/{id}','tintuccontroller@postsua');
		Route::get('them','tintuccontroller@getthem');
		Route::post('them','tintuccontroller@postthem');
		Route::get('xoa/{id}','tintuccontroller@getxoa');
	});
		//user
		Route::group(['prefix'=>'user'],function(){
		Route::get('danhsach','usercontroller@getdanhsach');
		Route::get('sua/{id}','usercontroller@getsua');
		Route::post('sua/{id}','usercontroller@postsua');
		Route::post('them','usercontroller@postthem');
		Route::get('them','usercontroller@getthem');
		Route::get('xoa/{id}','usercontroller@getxoa');
	});
		//slide
		Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach','slidecontroller@getdanhsach');
		Route::get('sua/{id}','slidecontroller@getsua');

		Route::post('sua/{id}','slidecontroller@postsua');
		Route::get('them','slidecontroller@getthem');
		Route::post('them','slidecontroller@postthem');
		Route::get('xoa/{id}','slidecontroller@getxoa');
	});
		// tạo 1 group xử lý 
		Route::group(['prefix'=>'ajax'],function(){
			Route::get('loaitin/{idtheloai}','ajaxcontroller@getloaitin');
			Route::get('theloai/{idloaitin}','ajaxcontroller@gettheloai');
		});
		//tạo group để xử lí các comment
		Route::group(['prefix'=>'comment'],function(){
				Route::get('xoa/{id}','commentcontroller@xoacomment');
		});

});

// trang chu
Route::get('trangchu','pagecontroller@trangtru');
Route::get('loaitin/{id}/{tenkhongdau}.html','pagecontroller@loaitin');
Route::get('tintuc/{id}/{tieudekhongdau}.html','pagecontroller@tintuc');
Route::get('lienhe','pagecontroller@lienhe');
Route::get('gioithieu','pagecontroller@gioithieu');
Route::get('dangnhap','pagecontroller@getdangnhap');
Route::post('dangnhap','pagecontroller@postdangnhap');
Route::get('dangxuat','pagecontroller@getdangxuat');
Route::post('comment/{id}','commentcontroller@postcomment');
Route::get('nguoidung','pagecontroller@getnguoidung');
Route::post('nguoidung','pagecontroller@postnguoidung');
Route::get('dangki','pagecontroller@getdangki');
Route::post('dangki','pagecontroller@postdangki');
Route::post('timkiem','pagecontroller@posttimkiem');

