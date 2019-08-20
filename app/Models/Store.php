<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Store
 * @package App\Models
 * @version September 22, 2018, 2:21 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection AtributBarang
 * @property \Illuminate\Database\Eloquent\Collection Bank
 * @property \Illuminate\Database\Eloquent\Collection discount
 * @property \Illuminate\Database\Eloquent\Collection discountRules
 * @property \Illuminate\Database\Eloquent\Collection DiscountRulesCategory
 * @property \Illuminate\Database\Eloquent\Collection HargaJual
 * @property \Illuminate\Database\Eloquent\Collection JenisBarang
 * @property \Illuminate\Database\Eloquent\Collection JenisTransaksiPenjualan
 * @property \Illuminate\Database\Eloquent\Collection Kategori
 * @property \Illuminate\Database\Eloquent\Collection konversiSatuanProduk
 * @property \Illuminate\Database\Eloquent\Collection koreksiStok
 * @property \Illuminate\Database\Eloquent\Collection mutasiKeluar
 * @property \Illuminate\Database\Eloquent\Collection pelanggan
 * @property \Illuminate\Database\Eloquent\Collection pembelianHasJenisPembayaran
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection Produk
 * @property \Illuminate\Database\Eloquent\Collection produkHasAtributBarang
 * @property \Illuminate\Database\Eloquent\Collection Produsen
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection Site
 * @property \Illuminate\Database\Eloquent\Collection stok
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string kode
 * @property string nama
 * @property string kontak
 * @property string alamat
 */
class Store extends Model
{
    use SoftDeletes;

    public $table = 'store';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'kode',
        'nama',
        'kontak',
        'alamat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode' => 'string',
        'nama' => 'string',
        'kontak' => 'string',
        'alamat' => 'string'
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
    public function atributBarangs()
    {
        return $this->hasMany(\App\Models\AtributBarang::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function banks()
    {
        return $this->hasMany(\App\Models\Bank::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function discountRulesCategories()
    {
        return $this->hasMany(\App\Models\DiscountRulesCategory::class);
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
    public function jenisBarangs()
    {
        return $this->hasMany(\App\Models\JenisBarang::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function jenisTransaksiPenjualans()
    {
        return $this->hasMany(\App\Models\JenisTransaksiPenjualan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kategoris()
    {
        return $this->hasMany(\App\Models\Kategori::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function produks()
    {
        return $this->hasMany(\App\Models\Produk::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function produsens()
    {
        return $this->hasMany(\App\Models\Produsen::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function sites()
    {
        return $this->hasMany(\App\Models\Site::class,'store_id');
    }
}
