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
    return redirect()->route('home');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
Route::group(['middleware' => ['role:admin|kasir']], function() {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('biodatas', 'BiodataController');

    Route::resource('stores', 'StoreController');

    Route::resource('sites', 'SiteController');

    Route::resource('produsens', 'ProdusenController');

    Route::resource('distributors', 'DistributorController');

    Route::resource('kategoris', 'KategoriController');

    Route::resource('jenisBarangs', 'JenisBarangController');

    Route::resource('atributBarangs', 'AtributBarangController');

    Route::resource('pelanggans', 'PelangganController');

    Route::resource('shiftKerjas', 'ShiftKerjaController');

    Route::resource('roles', 'RoleController');

    Route::resource('permissions', 'PermissionController');

    Route::resource('jenisTransaksiPenjualans', 'JenisTransaksiPenjualanController');

    Route::resource('banks', 'BankController');

    Route::resource('promosis', 'PromosiController');

    Route::resource('vouchers', 'VoucherController');

    Route::resource('daerahs', 'DaerahController');

    Route::resource('satuans', 'SatuanController');

    Route::resource('jenisPembayarans', 'JenisPembayaranController');

    Route::resource('produks', 'ProdukController');

    Route::resource('penjualans', 'PenjualanController');

    Route::resource('pembelians', 'PembelianController');

    Route::resource('returnPenjualans', 'ReturnPenjualanController');

    Route::resource('beritas', 'BeritaController');

    Route::resource('beritas', 'BeritaController');
    Route::resource('pelangganHasVouchers', 'PelangganHasVoucherController');
    Route::resource('users', 'UserController');
    Route::resource('produkHasAtributBarangs', 'ProdukHasAtributBarangController');
    Route::resource('produkHasRaws', 'ProdukHasRawController');
    
    Route::resource('user_role', 'UserRoleController', ['except' => [
    'create', 'store', 'show', 'destroy',


]]);
    Route::get('sync_data_kecamatan','KecamatanController@synct_data_api');
    Route::get('sync_data_kelurahan','KelurahanController@synct_data_api');
});
/*Route::group(['middleware' => ['role:pelanggan']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});*/
});


Route::resource('hargaJuals', 'HargaJualController');







Route::resource('stoks', 'StokController');

Route::resource('detilPenjualans', 'DetilPenjualanController');

Route::resource('kecamatans', 'KecamatanController');

Route::resource('kelurahans', 'KelurahanController');