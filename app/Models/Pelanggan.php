<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid as Generator;

/**
 * Class Pelanggan
 * @package App\Models
 * @version December 19, 2018, 5:42 am UTC
 *
 * @property \App\Models\Site site
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection discount
 * @property \Illuminate\Database\Eloquent\Collection discountRules
 * @property \Illuminate\Database\Eloquent\Collection kategori
 * @property \Illuminate\Database\Eloquent\Collection konversiSatuanProduk
 * @property \Illuminate\Database\Eloquent\Collection koreksiStok
 * @property \Illuminate\Database\Eloquent\Collection mutasiKeluar
 * @property \App\Models\PelangganHasVoucher pelangganHasVoucher
 * @property \Illuminate\Database\Eloquent\Collection pembelianHasJenisPembayaran
 * @property \Illuminate\Database\Eloquent\Collection Penjualan
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection produkHasAtributBarang
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection stok
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string nama
 * @property string jenis_kelamin
 * @property date tanggal_lahir
 * @property string pekerjaan
 * @property string alamat
 * @property string kontak
 * @property integer site_id
 * @property string users_id
 * @property integer point
 */
class Pelanggan extends Model
{
    use SoftDeletes;

    public $table = 'pelanggan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $incrementing = false;

    public $fillable = [
        'id',
        'jenis_kelamin',
        'tanggal_lahir',
        'pekerjaan',
        'alamat',
        'site_id',
        'users_id',
    ];

    protected $guarded=[
        'point'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'nama' => 'string',
        'jenis_kelamin' => 'string',
        'tanggal_lahir' => 'date',
        'pekerjaan' => 'string',
        'alamat' => 'string',
        'kontak' => 'string',
        'site_id' => 'integer',
        'users_id' => 'string',
        'point' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'jenis_kelamin' => 'required',
        'tanggal_lahir' => 'required',
        'pekerjaan' => 'required',
        'alamat' => 'required',
        'kontak' => 'required',
        'email' => 'required',
        /*'kontak' => 'required|unique:users',
        'email' => 'required|unique:users',*/
        /*'password' => 'required|confirmed',*/
        
    ];

    //End JWT 
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
        return $this->belongsTo(\App\Models\Site::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class,'users_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function pelangganHasVoucher()
    {
        return $this->hasMany(\App\Models\PelangganHasVoucher::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function penjualans()
    {
        return $this->hasMany(\App\Models\Penjualan::class);
    }
}
