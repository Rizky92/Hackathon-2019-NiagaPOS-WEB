<?php

use Illuminate\Http\Request; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('token','AuthenticateController@authenticate');

Route::post('pelanggan/token','AuthenticateController@authenticatePelanggan');
Route::post('pelanggan', 'PelangganAPIController@store');

Route::post('pelanggan/aktivasi','AuthenticateController@aktifasiPelanggan');

Route::post('pelanggan/remove','AuthenticateController@removeUser');

//Route::get('pesan/{kontak}/{pesan}', 'PelangganAPIController@test');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'AuthenticateController@getAuthenticatedUser'); 

    Route::post('users/update','UserAPIController@update');
    Route::post('users/password','UserAPIController@changePassword');
    Route::get('pelanggan', 'AuthenticateController@getAuthenticatedPelanggan');

    Route::post('token_device','UserAPIController@storeTokenDevice');

    
    Route::resource('satuans', 'SatuanAPIController');
    Route::resource('jenis_pembayarans', 'JenisPembayaranAPIController');

    //promosi
    Route::get('promosi', 'PromosiAPIController@index');
    //Voucher
    Route::get('vouchers', 'VoucherAPIController@indexVoucherPelanggan');
    Route::get('vouchers/{id}', 'VoucherAPIController@show');
    //site
    Route::get('sites', 'SiteAPIController@index');
    Route::get('sites/{id}', 'SiteAPIController@show');

    Route::get('histori_penjualan','PenjualanAPIController@indexPenjualanPelanggan');

    Route::resource('beritas', 'BeritaAPIController');

    Route::post('pelanggan_has_vouchers', 'PelangganHasVoucherAPIController@store');
    Route::get('pelanggan_has_vouchers', 'PelangganHasVoucherAPIController@index');
    Route::post('use_voucher/{id}', 'PelangganHasVoucherAPIController@useVoucher');

    //pelanggan
    Route::get('pelangganindex', 'PelangganAPIController@index');

    //stok
    Route::get('stoks', 'StokAPIController@index');
    //harga jual
    Route::get('harga_juals', 'HargaJualAPIController@index');
    //produk
    Route::get('produks','ProdukAPIController@index');
    Route::get('produks/{id}','ProdukAPIController@show');
    //kategori
    Route::get('kategori', 'KategoriAPIController@index');
    //PENJUALAN
    Route::post('penjualans', 'PenjualanAPIController@storepenjualan');
    Route::get('penjualans','PenjualanAPIController@index');
    //user
    Route::get('indexuser','UserAPIController@indexuser');

    Route::resource('return_penjualans', 'ReturnPenjualanAPIController');

    //Kasir
    Route::get('pelanggan/{id}', 'PelangganAPIController@show');
    Route::post('penjualan_kasir', 'PenjualanAPIController@storeKasir');
    Route::get('penjualan_kasir','PenjualanAPIController@indexPenjualanKasir');
    Route::resource('kelurahans', 'KelurahanAPIController');
});
            Route::resource('detil_penjualans', 'DetilPenjualanAPIController');
//Route::resource('produks', 'ProdukAPIController');



/*Route::resource('pembelians', 'PembelianAPIController');*/
















