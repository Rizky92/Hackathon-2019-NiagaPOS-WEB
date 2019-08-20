<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;
/**
 * Class ProdukHasRaw
 * @package App\Models
 * @version April 5, 2019, 6:34 am UTC
 *
 * @property \App\Models\Produk produk
 * @property \App\Models\Produk produkRaw
 * @property \App\Models\User users
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
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property integer produk_raw_id
 * @property integer jumlah
 * @property string users_id
 */
class ProdukHasRaw extends Pivot
{

    public $table = 'produk_has_raw';

    public $fillable = [
        'produk_id',
        'produk_raw_id',
        'jumlah',
        'users_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'produk_id' => 'integer',
        'produk_raw_id' => 'integer',
        'jumlah' => 'integer',
        'users_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'produk_id' => 'required',
        'produk_raw_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function produk()
    {
        return $this->belongsTo(\App\Models\Produk::class, 'produk_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function produkRaw()
    {
        return $this->belongsTo(\App\Models\Produk::class, 'produk_raw_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id');
    }
}
