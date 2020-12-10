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
Route::group(['middleware' => ['checkNhanVien']], function () {
        Route::group(['prefix' => 'loai-san-pham'], function(){
            Route::get('/','LoaiSanPhamController@index')->name('danh-sach-loai');
            Route::post('/xu-ly-them-loai','LoaiSanPhamController@store')->name('xu-ly-them-loai');

            Route::get('/sua-loai-san-pham/{id}','LoaiSanPhamController@edit')->name('sua-loai-san-pham');
            Route::post('/xu-ly-sua-loai/{id}','LoaiSanPhamController@update')->name('xu-ly-sua-loai');

            Route::get('/xoa-loai-san-pham/{id}','LoaiSanPhamController@destroy')->name('xoa-loai-san-pham');
        });

        Route::group(['prefix' => 'san-pham'], function(){
            Route::get('/san-pham','SanPhamController@index')->name('san-pham');
            Route::post('/xu-ly-them-sp','SanPhamController@store')->name('xu-ly-them-sp');

            Route::get('/sua-san-pham/{id}','SanPhamController@edit')->name('sua-san-pham');
            Route::post('/xu-ly-sua-sp/{id}','SanPhamController@update')->name('xu-ly-sua-sp');

            Route::get('/xoa-san-pham/{id}','SanPhamController@destroy')->name('xoa-san-pham');


            Route::get('/chi-tiet-san-pham/{id}','SanPhamController@show')->name('chi-tiet-san-pham');
        });

        Route::get('/logout','AuthController@logout')->name('logout');
    });



Route::get('/dang-ky','AuthController@viewDangKy')->name('dang-ky');
Route::post('/xu-ly-dang-ky','AuthController@xuLyDangKy')->name('xu-ly-dang-ky');

Route::get('/login','AuthController@viewDangNhap')->name('login');
Route::post('xu-ly-dang-nhap','AuthController@xulyDangNhap')->name('xu-ly-dang-nhap');

Route::get('/','TrangChuController@index')->name('trang-chu');

Route::get('/tim-kiem-san-pham','LoaiSanPhamController@timKiem')->name('tim-kiem-san-pham');

Route::get('/chi-tiet-san-pham-kh/{id}','TrangChuController@show')->name('chi-tiet-san-pham-kh');

Route::get('/gio-hang','TrangChuController@cart')->name('gio-hang');

Route::post('/them-vao-gio-hang/{idProduct}','TrangChuController@addtoCart')->name('them-vao-gio-hang');

Route::get('/xoa-gio-hang','TrangChuController@ClearCart')->name('xoa-gio-hang');

Route::get('/xoa-mot-sp-trong-cart/{idProduct}','TrangChuController@clearOneProduct')->name('xoa-mot-sp-trong-cart');

Route::get('/get-product-in-category/{idCategory}','TrangChuController@getProduct')->name('get-product-in-category');

Route::post('/gio-hang.them-nhieu-san-pham/{idProduct}','TrangChuController@addMoreProductToCart')->name('gio-hang.them-nhieu-san-pham');

Route::post('xu-ly-dang-nhap-kh','KhachHangController@xulyDangNhap')->name('xu-ly-dang-nhap-kh');

Route::get('logout-kh','KhachHangController@logout')->name('logout-kh');

Route::get('/thanh-toan','KhachHangController@payment')->name('thanh-toan');

Route::post('/dat-hang','KhachHangController@datHang')->name('dat-hang');

Route::post('/capnhat-soluong','KhachHangController@updateSoLuong')->name('capnhat-soluong');

Route::get('/don-hang','DonHangController@donHang')->name('don-hang');

Route::get('/chi-tiet-don/{idDonHang}','DonHangController@chiTietDonHang')->name('chi-tiet-don');

Route::get('/donhang-kh/{idCus}','KhachHangController@donHang')->name('donhang-kh');

Route::get('/cap-nhat-trang-thai/{idDonHang}','DonHangController@capNhatTrangThai')->name('cap-nhat-trang-thai');

Route::get('/tim-kiem-don-hang','DonHangController@timKiem')->name('tim-kiem-don-hang');

Route::get('/khach-hang', 'KhachHangController@kh')->name('khach-hang');

Route::get('/thong-ke', 'ThongKeController@index')->name('thong-ke');

Route::get('/banner','TrangChuController@banner')->name('banner');

Route::post('/xu-ly-banner','TrangChuController@store')->name('xu-ly-banner');
