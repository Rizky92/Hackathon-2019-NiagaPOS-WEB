<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Site
 * @package App\Models
 * @version December 19, 2018, 12:35 pm UTC
 *
 * @property \App\Models\Daerah daerah
 * @property \App\Models\Store store
 * @property \Illuminate\Database\Eloquent\Collection Discount
 * @property \Illuminate\Database\Eloquent\Collection discountRules
 * @property \Illuminate\Database\Eloquent\Collection HargaJual
 * @property \Illuminate\Database\Eloquent\Collection KartuStok
 * @property \Illuminate\Database\Eloquent\Collection kategori
 * @property \Illuminate\Database\Eloquent\Collection konversiSatuanProduk
 * @property \Illuminate\Database\Eloquent\Collection KoreksiStok
 * @property \Illuminate\Database\Eloquent\Collection MutasiKeluar
 * @property \Illuminate\Database\Eloquent\Collection MutasiStok
 * @property \Illuminate\Database\Eloquent\Collection Pelanggan
 * @property \Illuminate\Database\Eloquent\Collection Pembelian
 * @property \Illuminate\Database\Eloquent\Collection pembelianHasJenisPembayaran
 * @property \Illuminate\Database\Eloquent\Collection Penjualan
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection produkHasAtributBarang
 * @property \Illuminate\Database\Eloquent\Collection ReturnPembelian
 * @property \Illuminate\Database\Eloquent\Collection ReturnPenjualan
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection stok
 * @property \Illuminate\Database\Eloquent\Collection User
 * @property string kode
 * @property integer store_id
 * @property string nama
 * @property string kontak
 * @property string alamat
 * @property integer daerah_id
 * @property string foto
 */
class Site extends Model
{
    use SoftDeletes;

    public $table = 'site';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'kode',
        'store_id',
        'nama',
        'kontak',
        'alamat',
        'daerah_id',
        'foto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode' => 'string',
        'store_id' => 'integer',
        'nama' => 'string',
        'kontak' => 'string',
        'alamat' => 'string',
        'daerah_id' => 'integer',
        'foto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'kode' => 'required',
        'nama' => 'required',
        'kontak' => 'required',
        'alamat' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function daerah()
    {
        return $this->belongsTo(\App\Models\Daerah::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function store()
    {
        return $this->belongsTo(\App\Models\Store::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function discounts()
    {
        return $this->hasMany(\App\Models\Discount::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function hargaJuals()
    {
        return $this->hasMany(\App\Models\HargaJual::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kartuStoks()
    {
        return $this->hasMany(\App\Models\KartuStok::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function koreksiStoks()
    {
        return $this->hasMany(\App\Models\KoreksiStok::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function mutasiKeluars()
    {
        return $this->hasMany(\App\Models\MutasiKeluar::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function mutasiStoks()
    {
        return $this->hasMany(\App\Models\MutasiStok::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pelanggans()
    {
        return $this->hasMany(\App\Models\Pelanggan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pembelians()
    {
        return $this->hasMany(\App\Models\Pembelian::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function penjualans()
    {
        return $this->hasMany(\App\Models\Penjualan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function returnPembelians()
    {
        return $this->hasMany(\App\Models\ReturnPembelian::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function returnPenjualans()
    {
        return $this->hasMany(\App\Models\ReturnPenjualan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function produks()
    {
        return $this->belongsToMany(\App\Models\Produk::class, 'stok');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\User::class);
    }
}
