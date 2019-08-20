<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Satuan
 * @package App\Models
 * @version November 12, 2018, 1:55 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection DetilKoreksiStok
 * @property \Illuminate\Database\Eloquent\Collection DetilMutasiKeluar
 * @property \Illuminate\Database\Eloquent\Collection DetilMutasiStok
 * @property \Illuminate\Database\Eloquent\Collection DetilPembelian
 * @property \Illuminate\Database\Eloquent\Collection DetilPenjualan
 * @property \Illuminate\Database\Eloquent\Collection discount
 * @property \Illuminate\Database\Eloquent\Collection discountRules
 * @property \Illuminate\Database\Eloquent\Collection kategori
 * @property \Illuminate\Database\Eloquent\Collection KonversiSatuanProduk
 * @property \Illuminate\Database\Eloquent\Collection koreksiStok
 * @property \Illuminate\Database\Eloquent\Collection mutasiKeluar
 * @property \Illuminate\Database\Eloquent\Collection pelanggan
 * @property \Illuminate\Database\Eloquent\Collection pembelianHasJenisPembayaran
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection Produk
 * @property \Illuminate\Database\Eloquent\Collection produkHasAtributBarang
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection stok
 * @property string nama
 * @property integer satuan_id
 */
class Satuan extends Model
{
    use SoftDeletes;

    public $table = 'satuan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'satuan_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'satuan_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detilKoreksiStoks()
    {
        return $this->hasMany(\App\Models\DetilKoreksiStok::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detilMutasiKeluars()
    {
        return $this->hasMany(\App\Models\DetilMutasiKeluar::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detilMutasiStoks()
    {
        return $this->hasMany(\App\Models\DetilMutasiStok::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detilPembelians()
    {
        return $this->hasMany(\App\Models\DetilPembelian::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detilPenjualans()
    {
        return $this->hasMany(\App\Models\DetilPenjualan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function konversiSatuanProduks()
    {
        return $this->hasMany(\App\Models\KonversiSatuanProduk::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function produks()
    {
        return $this->hasMany(\App\Models\Produk::class);
    }
}
