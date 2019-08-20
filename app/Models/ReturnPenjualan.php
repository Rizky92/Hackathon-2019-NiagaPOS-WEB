<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid as Generator;

/**
 * Class ReturnPenjualan
 * @package App\Models
 * @version December 2, 2018, 1:10 pm UTC
 *
 * @property \App\Models\DetilPenjualan detilPenjualan
 * @property \App\Models\Site site
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection discount
 * @property \Illuminate\Database\Eloquent\Collection discountRules
 * @property \Illuminate\Database\Eloquent\Collection kategori
 * @property \Illuminate\Database\Eloquent\Collection konversiSatuanProduk
 * @property \Illuminate\Database\Eloquent\Collection koreksiStok
 * @property \Illuminate\Database\Eloquent\Collection mutasiKeluar
 * @property \Illuminate\Database\Eloquent\Collection pelanggan
 * @property \Illuminate\Database\Eloquent\Collection pembelianHasJenisPembayaran
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection produkHasAtributBarang
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection site
 * @property \Illuminate\Database\Eloquent\Collection stok
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string detil_penjualan_id
 * @property integer jumlah_return
 * @property integer total_return
 * @property string alasan
 * @property string kode_admin
 * @property integer site_id
 * @property string users_id
 */
class ReturnPenjualan extends Model
{
    use SoftDeletes;

    public $table = 'return_penjualan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $incrementing = false;


    public $fillable = [
        'id',
        'detil_penjualan_id',
        'jumlah_return',
        'total_return',
        'alasan',
        'kode_admin',
        'site_id',
        'users_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'detil_penjualan_id' => 'string',
        'jumlah_return' => 'integer',
        'total_return' => 'integer',
        'alasan' => 'string',
        'kode_admin' => 'string',
        'site_id' => 'integer',
        'users_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


 // UUID
        /*protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            try {
                $model->id = Generator::uuid4()->toString();
            } catch (UnsatisfiedDependencyException $e) {
                abort(500, $e->getMessage());
            }
        });
    }*/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function detilPenjualan()
    {
        return $this->belongsTo(\App\Models\DetilPenjualan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function site()
    {
        return $this->belongsTo(\App\Models\Site::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
