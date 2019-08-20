<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class JenisTransaksiPenjualan
 * @package App\Models
 * @version September 22, 2018, 2:28 pm UTC
 *
 * @property \App\Models\Store store
 * @property \Illuminate\Database\Eloquent\Collection discount
 * @property \Illuminate\Database\Eloquent\Collection discountRules
 * @property \Illuminate\Database\Eloquent\Collection kategori
 * @property \Illuminate\Database\Eloquent\Collection konversiSatuanProduk
 * @property \Illuminate\Database\Eloquent\Collection koreksiStok
 * @property \Illuminate\Database\Eloquent\Collection mutasiKeluar
 * @property \Illuminate\Database\Eloquent\Collection pelanggan
 * @property \Illuminate\Database\Eloquent\Collection pembelianHasJenisPembayaran
 * @property \Illuminate\Database\Eloquent\Collection Penjualan
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection produkHasAtributBarang
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection stok
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string nama
 * @property integer margin_persen
 * @property integer store_id
 */
class JenisTransaksiPenjualan extends Model
{
    use SoftDeletes;

    public $table = 'jenis_transaksi_penjualan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'margin_persen',
        'store_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'margin_persen' => 'integer',
        'store_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function store()
    {
        return $this->belongsTo(\App\Models\Store::class,'store_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function penjualans()
    {
        return $this->hasMany(\App\Models\Penjualan::class);
    }
}
