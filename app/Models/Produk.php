<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Produk
 * @package App\Models
 * @version December 2, 2018, 1:05 pm UTC
 *
 * @property \App\Models\Distributor distributor
 * @property \App\Models\JenisBarang jenisBarang
 * @property \App\Models\Kategori kategori
 * @property \App\Models\Produsen produsen
 * @property \App\Models\Satuan satuan
 * @property \App\Models\Store store
 * @property \Illuminate\Database\Eloquent\Collection DetilKoreksiStok
 * @property \Illuminate\Database\Eloquent\Collection DetilMutasiKeluar
 * @property \Illuminate\Database\Eloquent\Collection DetilMutasiStok
 * @property \Illuminate\Database\Eloquent\Collection DetilPembelian
 * @property \Illuminate\Database\Eloquent\Collection DetilPenjualan
 * @property \Illuminate\Database\Eloquent\Collection Discount
 * @property \Illuminate\Database\Eloquent\Collection discountRules
 * @property \Illuminate\Database\Eloquent\Collection HargaJual
 * @property \Illuminate\Database\Eloquent\Collection KartuStok
 * @property \Illuminate\Database\Eloquent\Collection kategori
 * @property \Illuminate\Database\Eloquent\Collection konversiSatuanProduk
 * @property \Illuminate\Database\Eloquent\Collection koreksiStok
 * @property \Illuminate\Database\Eloquent\Collection mutasiKeluar
 * @property \Illuminate\Database\Eloquent\Collection pelanggan
 * @property \Illuminate\Database\Eloquent\Collection pembelianHasJenisPembayaran
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection produkHasAtributBarang
 * @property \App\Models\ProdukHasRaw produkHasRaw
 * @property \Illuminate\Database\Eloquent\Collection ProdukHasRaw
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection site
 * @property \Illuminate\Database\Eloquent\Collection stok
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string nama
 * @property string barcode
 * @property integer produsen_id
 * @property integer jenis_barang_id
 * @property integer kategori_barang_id
 * @property integer satuan_terkecil
 * @property decimal ppn_persen
 * @property decimal margin_persen
 * @property decimal diskon_persen
 * @property integer stok_minimal
 * @property integer default_input
 * @property integer distributor_id
 * @property integer store_id
 * @property smallInteger pembelian
 * @property smallInteger penjualan
 */
class Produk extends Model
{
    use SoftDeletes;

    public $table = 'produk';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'barcode',
        'produsen_id',
        'jenis_barang_id',
        'kategori_barang_id',
        'satuan_terkecil',
        'ppn_persen',
        'margin_persen',
        'diskon_persen',
        'stok_minimal',
        'default_input',
        'distributor_id',
        'store_id',
        'pembelian',
        'penjualan',
        'foto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'barcode' => 'string',
        'produsen_id' => 'integer',
        'jenis_barang_id' => 'integer',
        'kategori_barang_id' => 'integer',
        'satuan_terkecil' => 'integer',
        'stok_minimal' => 'integer',
        'default_input' => 'integer',
        'distributor_id' => 'integer',
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
    public function distributor()
    {
        return $this->belongsTo(\App\Models\Distributor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function jenisBarang()
    {
        return $this->belongsTo(\App\Models\JenisBarang::class,'jenis_barang_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kategori()
    {
        return $this->belongsTo(\App\Models\Kategori::class,'kategori_barang_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function produsen()
    {
        return $this->belongsTo(\App\Models\Produsen::class,'produsen_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function satuan()
    {
        return $this->belongsTo(\App\Models\Satuan::class);
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function atributBarangs()
    {
        return $this->belongsToMany(\App\Models\AtributBarang::class, 'produk_has_atribut_barang','produk_id','atribut_barang_id')->withPivot('value')->withTimestamps();
    }

    /*public function atributBarangs()
    {
        return $this->belongsToMany('\App\Models\AtributBarang')
                ->using('\App\Models\ProdukHasAtributBarang')
                ->withPivot("value")      
                ->withTimestamps();
    }*/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function produkHasRaw()
    {
        return $this->hasOne(\App\Models\ProdukHasRaw::class,'id','produk_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function produkHasRaws()
    {
        return $this->BelongsToMany(\App\Models\ProdukHasRaw::class,'produk_raw_id');
    }

    //buatan pak eko
    public function raws()
    {
        return $this->BelongsToMany(\App\Models\Produk::class,'produk_has_raw','produk_id','produk_raw_id')
        ->using(\App\Models\ProdukHasRaw::class)
        ->withPivot(['jumlah','users_id'])
        ->withTimestamps();
    }

    public function bahanJadi()
    {
        return $this->BelongsToMany(\App\Models\Produk::class,'produk_has_raw','produk_raw_id','produk_id')
        ->using(\App\Models\ProdukHasRaw::class)
        ->withPivot(['jumlah','users_id'])
        ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function sites()
    {
        return $this->belongsToMany(\App\Models\Site::class, 'stok','produk_id','site_id')
        ->withPivot('jumlah')
        ->withTimestamps();
    }

    /*public function atributs()
    {
        return $this->belongsToMany('App\Models\AtributBarang')
                                ->using('App\Models\ProdukHasAtributBarang')
                                ->withPivot([
                                    'value',
                                    'created_by',
                                    'updated_by'
                                ]);
    }*/
    /*public function atributs()
    {
        return $this->belongsToMany(App\Models\AtributBarang::class,'atribut_barang_id');
    }*/
}
