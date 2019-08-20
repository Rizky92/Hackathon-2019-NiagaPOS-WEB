<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetilPenjualan
 * @package App\Models
 * @version June 3, 2019, 7:33 am UTC
 *
 * @property \App\Models\Produk produk
 * @property \App\Models\Penjualan penjualan
 * @property \App\Models\Satuan satuan
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection returnPenjualans
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property string penjualan_id
 * @property integer satuan_id
 * @property integer produk_id
 * @property integer harga_beli
 * @property integer jumlah
 * @property integer ppn
 * @property integer margin
 * @property integer harga_jual
 * @property integer diskon
 * @property integer sub_total
 * @property string racikan
 */
class DetilPenjualan extends Model
{
    use SoftDeletes;

    public $table = 'detil_penjualan';
    
/*    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';*/


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'penjualan_id',
        'satuan_id',
        'produk_id',
        'harga_beli',
        'jumlah',
        'ppn',
        'margin',
        'harga_jual',
        'diskon',
        'sub_total',
        'racikan',
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
        'penjualan_id' => 'string',
        'satuan_id' => 'integer',
        'produk_id' => 'integer',
        'harga_beli' => 'integer',
        'jumlah' => 'integer',
        'ppn' => 'integer',
        'margin' => 'integer',
        'harga_jual' => 'integer',
        'diskon' => 'integer',
        'sub_total' => 'integer',
        'racikan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'penjualan_id' => 'required',
        'satuan_id' => 'required',
        'produk_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function produk()
    {
        return $this->belongsTo(\App\Models\Produk::class,'produk_id')->withTrashed();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function penjualan()
    {
        return $this->belongsTo(\App\Models\Penjualan::class, 'penjualan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function satuan()
    {
        return $this->belongsTo(\App\Models\Satuan::class, 'satuan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function returnPenjualans()
    {
        return $this->hasMany(\App\Models\ReturnPenjualan::class);
    }
}
