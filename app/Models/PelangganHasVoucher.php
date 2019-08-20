<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PelangganHasVoucher
 * @package App\Models
 * @version January 1, 2019, 2:02 am UTC
 *
 * @property \App\Models\Pelanggan pelanggan
 * @property \App\Models\Voucher voucher
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection discount
 * @property \Illuminate\Database\Eloquent\Collection discountRules
 * @property \Illuminate\Database\Eloquent\Collection kategori
 * @property \Illuminate\Database\Eloquent\Collection konversiSatuanProduk
 * @property \Illuminate\Database\Eloquent\Collection koreksiStok
 * @property \Illuminate\Database\Eloquent\Collection mutasiKeluar
 * @property \Illuminate\Database\Eloquent\Collection pembelianHasJenisPembayaran
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection produkHasAtributBarang
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection site
 * @property \Illuminate\Database\Eloquent\Collection stok
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string pelanggan_id
 * @property integer voucher_id
 * @property integer point
 * @property string users_id
 */
class PelangganHasVoucher extends Model
{
    use SoftDeletes;

    public $table = 'pelanggan_has_voucher';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'pelanggan_id',
        'voucher_id',
        'point',
        'users_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pelanggan_id' => 'string',
        'voucher_id' => 'integer',
        'point' => 'integer',
        'users_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'voucher_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pelanggan()
    {
        return $this->belongsTo(\App\Models\Pelanggan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function voucher()
    {
        return $this->belongsTo(\App\Models\Voucher::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
