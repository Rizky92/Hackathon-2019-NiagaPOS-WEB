<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class JenisPembayaran
 * @package App\Models
 * @version November 12, 2018, 1:56 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection discount
 * @property \Illuminate\Database\Eloquent\Collection discountRules
 * @property \Illuminate\Database\Eloquent\Collection kategori
 * @property \Illuminate\Database\Eloquent\Collection konversiSatuanProduk
 * @property \Illuminate\Database\Eloquent\Collection koreksiStok
 * @property \Illuminate\Database\Eloquent\Collection mutasiKeluar
 * @property \Illuminate\Database\Eloquent\Collection pelanggan
 * @property \Illuminate\Database\Eloquent\Collection pembelianHasJenisPembayaran
 * @property \Illuminate\Database\Eloquent\Collection PenjualanHasJenisPembayaran
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection produkHasAtributBarang
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection stok
 * @property string nama
 * @property decimal diskon_persen
 * @property decimal margin_persen
 * @property smallInteger tunai
 */
class JenisPembayaran extends Model
{
    use SoftDeletes;

    public $table = 'jenis_pembayaran';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'diskon_persen',
        'margin_persen',
        'tunai'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'diskon_persen' => 'float',
        'margin_persen' => 'float',
        'tunai' => 'smallInteger'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function pembelians()
    {
        return $this->belongsToMany(\App\Models\Pembelian::class, 'pembelian_has_jenis_pembayaran');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function penjualanHasJenisPembayarans()
    {
        return $this->hasMany(\App\Models\PenjualanHasJenisPembayaran::class);
    }
}
