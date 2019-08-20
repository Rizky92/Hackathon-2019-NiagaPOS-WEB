<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Penjualan
 * @package App\Models
 * @version December 2, 2018, 1:08 pm UTC
 *
 * @property \App\Models\JenisTransaksiPenjualan jenisTransaksiPenjualan
 * @property \App\Models\Pelanggan pelanggan
 * @property \App\Models\Site site
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection DetilPenjualan
 * @property \Illuminate\Database\Eloquent\Collection discount
 * @property \Illuminate\Database\Eloquent\Collection discountRules
 * @property \Illuminate\Database\Eloquent\Collection kategori
 * @property \Illuminate\Database\Eloquent\Collection konversiSatuanProduk
 * @property \Illuminate\Database\Eloquent\Collection koreksiStok
 * @property \Illuminate\Database\Eloquent\Collection mutasiKeluar
 * @property \Illuminate\Database\Eloquent\Collection pembelianHasJenisPembayaran
 * @property \App\Models\PenjualanHasJenisPembayaran penjualanHasJenisPembayaran
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection produkHasAtributBarang
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection stok
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string faktur_penjualan
 * @property string pelanggan_id
 * @property integer site_id
 * @property string nomor_resep
 * @property date tanggal_jatuh_tempo
 * @property integer ppn
 * @property integer diskon
 * @property integer total
 * @property integer jenis_transaksi_penjualan_id
 * @property integer bayar
 * @property string users_id
 * @property integer point
 */
class Penjualan extends Model
{
    use SoftDeletes;

    public $table = 'penjualan';
    
   /* const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
*/
    public $incrementing = false;
    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'faktur_penjualan',
        'pelanggan_id',
        'site_id',
        'nomor_resep',
        'tanggal_jatuh_tempo',
        'ppn',
        'diskon',
        'total',
        'jenis_transaksi_penjualan_id',
        'bayar',
        'users_id',
        'point',
        'scan_bukti',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'faktur_penjualan' => 'string',
        'pelanggan_id' => 'string',
        'site_id' => 'integer',
        'nomor_resep' => 'string',
        'tanggal_jatuh_tempo' => 'date',
        'ppn' => 'integer',
        'diskon' => 'integer',
        'total' => 'integer',
        'jenis_transaksi_penjualan_id' => 'integer',
        'bayar' => 'integer',
        'users_id' => 'string',
        'point' => 'integer',
        'scan_bukti'=>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public static $rulesPenjualanKasir = [
        'pelanggan_id' => 'required',
        'scan_bukti'=>'required|mimes:jpeg,jpg,png,bmp,tiff |max:4096',
        'total'=>'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function jenisTransaksiPenjualan()
    {
        return $this->belongsTo(\App\Models\JenisTransaksiPenjualan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pelanggan()
    {
        return $this->belongsTo(\App\Models\Pelanggan::class,'pelanggan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function site()
    {
        return $this->belongsTo(\App\Models\Site::class,'site_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class,'users_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detilPenjualans()
    {
        return $this->hasMany(\App\Models\DetilPenjualan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function penjualanHasJenisPembayaran()
    {
        return $this->hasOne(\App\Models\PenjualanHasJenisPembayaran::class);
    }
}
