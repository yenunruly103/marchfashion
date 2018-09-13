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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Login and Logout
Route::get('dangnhap','Admin\UserController@getDangnhap');
Route::post('dangnhap','Admin\UserController@postDangnhap');
Route::get('dangxuat','Admin\UserController@getDangxuat');

//Login and Logout Admin
Route::get('admin/dangnhap','Admin\UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','Admin\UserController@postDangnhapAdmin');
Route::get('admin/dangxuat','Admin\UserController@getDangxuatAdmin');

//Register
Route::get('dangki','Admin\UserController@getDangki');
Route::post('dangki', 'Admin\UserController@postDangki');

//Route group admin
Route::group(['prefix'=>'admin', 'middleware'=>'dangnhap'], function(){

	Route::get('', 'Admin\ProductController@getProductList');

	Route::group(['prefix'=>'category'], function(){

		Route::get('','Admin\CategoryController@getCategoryList');

		Route::get('add','Admin\CategoryController@getCategoryAdd');
		Route::post('add','Admin\CategoryController@postCategoryAdd');

		Route::get("edit/{id}",'Admin\CategoryController@getCategoryEdit');
		Route::post("edit/{id}",'Admin\CategoryController@postCategoryEdit');

		Route::get("delete/{id}",'Admin\CategoryController@getCategoryDelete');
	});

	Route::group(['prefix'=>'product'], function(){

		Route::get('','Admin\ProductController@getProductList');

		Route::get('add','Admin\ProductController@getProductAdd');
		Route::post('add','Admin\ProductController@postProductAdd');

		Route::get("edit/{id}",'Admin\ProductController@getProductEdit');
		Route::post("edit/{id}",'Admin\ProductController@postProductEdit');

		Route::get("delete/{id}",'Admin\ProductController@getProductDelete');
	});

	Route::group(['prefix'=>'news'], function(){

		Route::get('','Admin\NewsController@getNewsList');

		Route::get('add','Admin\NewsController@getNewsAdd');
		Route::post('add','Admin\NewsController@postNewsAdd');

		Route::get('edit/{id}','Admin\NewsController@getNewsEdit');
		Route::post('edit/{id}','Admin\NewsController@postNewsEdit');

		Route::get('delete/{id}','Admin\NewsController@getNewsDelete');
	});

	Route::get('user', 'Admin\UserController@getUserList');

	Route::get('order','Admin\OrderController@getOrderList');
	Route::get('order/orderdetail','Admin\OrderController@getOderDetail');
});


//Website
Route::get('/', 'PageController@index')->name('trangchu');

Route::group(['prefix'=>'sanpham'], function(){
	Route::get('sanphammoi', 'PageController@getSPMoi')->name('sanphammoi');
	Route::get('sanphamnoibat', 'PageController@getSPNoiBat')->name('sanphamnoibat');
	Route::get('ao', 'PageController@getSPAo')->name('ao');
	Route::get('quan', 'PageController@getSPQuan')->name('quan');
	Route::get('vay', 'PageController@getSPVay')->name('vay');
	Route::get('phukien', 'PageController@getSPPhuKien')->name('phukien');
	Route::get('{id}/{unsigned_name}', 'PageController@getSPChiTiet')->name('sanphamchitiet');
});

Route::group(['prefix'=>'vechungtoi'], function(){
	Route::get('gioithieu', 'PageController@getGioiThieuNews')->name('gioithieu');
	Route::get('tuyendung', 'PageController@getTuyenDungNews')->name('tuyendung');
	Route::get('caccuahang', 'PageController@getCacCuaHangNews')->name('caccuahang');
	Route::get('lienhe', 'PageController@getLienHeNews')->name('lienhe');
});

Route::get('xuhuong', 'PageController@getXuHuong')->name('xuhuong');
Route::get('xuhuong/{id}/{unsigned_title}', 'PageController@getXuHuongChiTiet')->name('xuhuongchitiet');
Route::post('timkiem', 'PageController@timKiem')->name('timkiem');