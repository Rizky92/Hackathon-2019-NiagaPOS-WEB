<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid as Generator;


/**
 * Class Pembelian
 * @package App\Models
 * @version December 2, 2018, 1:09 pm UTC
 *
 * @property \App\Models\Site site
 * @property \App\Models\User user
 * @property \App\Models\Distributor distributor
 * @property \Illuminate\Database\Eloquent\Collection DetilPembelian
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
 * @property string faktur_pembelian
 * @property string faktur_distributor
 * @property integer site_id
 * @property date tanggal_jatuh_tempo
 * @property integer ppn
 * @property integer diskon
 * @property integer total
 * @property integer distributor_id
 * @property date tanggal_faktur
 * @property string users_id
 */
class Pembelian extends Model
{
    use SoftDeletes;

    public $table = 'pembelian';
    public $incrementing = false;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'faktur_pembelian',
        'faktur_distributor',
        'site_id',
        'tanggal_jatuh_tempo',
        'ppn',
        'diskon',
        'total',
        'distributor_id',
        'tanggal_faktur',
        'users_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'faktur_pembelian' => 'string',
        'faktur_distributor' => 'string',
        'site_id' => 'integer',
        'tanggal_jatuh_tempo' => 'date',
        'ppn' => 'integer',
        'diskon' => 'integer',
        'total' => 'integer',
        'distributor_id' => 'integer',
        'tanggal_faktur' => 'date',
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
        protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            try {
                $model->id = Generator::uuid4()->toString();
            } catch (UnsatisfiedDependencyException $e) {
                abort(500, $e->getMessage());
            }
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function site()
    {
        return $this->belongsTo(\App\Models\Site::class,'site_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function distributor()
    {
        return $this->belongsTo(\App\Models\Distributor::class,'distributor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detilPembelians()
    {
        return $this->hasMany(\App\Models\DetilPembelian::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function jenisPembayarans()
    {
        return $this->belongsToMany(\App\Models\JenisPembayaran::class, 'pembelian_has_jenis_pembayaran');
    }
}
