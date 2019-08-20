<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid as Generator;
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use EntrustUserTrait { restore as private restoreA; }
    use SoftDeletes { restore as private restoreB; }

    public function restore()
    {
        $this->restoreA();
        $this->restoreB();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $incrementing = false;
    protected $keyType = 'string';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $fillable = [
        'id',
        'name',
        'email',
        'site_id',
        'shift_kerja_id',
        'password',
        'kontak',
        'remeber_token',
        'verifed',
        'verification_token',
        'foto'

    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'email' => 'string',
        'site_id' => 'integer', 
        'password' => 'string',
        'remember_token' => 'string',
        'verified' => 'boolean',
        'verification_token' => 'string',
        'token_device' => 'string',
        'foto' => 'string'
    ];

    protected $hidden = [
        'password', 'remember_token','token_device','verification_token'
    ];

    public static $rules = array(
        'name' => 'required|string|max:255',
        /*'foto' => 'mimes:jpeg,jpg,png,bmp,tiff |max:4096',*/
    );

    public static $rules_update = [
        'name' => 'required|string|max:255',
        /*'foto' => 'mimes:jpeg,jpg,png,bmp,tiff |max:4096',*/
    ];

    //JWT
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    public function getJWTCustomClaims() {
        return [];
    }
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
    

    public function voucher()
    {
        return $this->hasMany(\App\Models\Voucher::class);
    }

    public function promosi()
    {
        return $this->hasMany(\App\Models\Promosi::class);
    }

    public function pelanggan()
    {
        return $this->hasOne(\App\Models\Pelanggan::class,'users_id');
    }

    public function site()
    {
        return $this->belongsTo(\App\Models\Site::class,'site_id');
    }
}
