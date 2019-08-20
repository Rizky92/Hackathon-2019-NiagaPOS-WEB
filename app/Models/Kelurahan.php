<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kelurahan
 * @package App\Models
 * @version August 3, 2019, 10:17 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection pelanggans
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property \Illuminate\Database\Eloquent\Collection 
 * @property string nama
 * @property integer kelurahan_id
 * @property string website
 * @property string telepon
 * @property string fax
 * @property string email
 * @property string alamat
 * @property string longitude
 * @property string latitude
 * @property string lurah
 * @property string foto_lurah
 */
class Kelurahan extends Model
{
    use SoftDeletes;

    public $table = 'kelurahan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'nama',
        'website',
        'telepon',
        'fax',
        'email',
        'alamat',
        'longitude',
        'latitude',
        'lurah',
        'foto_lurah',
        'kelurahan_id',
        'cover'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'kelurahan_id' => 'integer',
        'website' => 'string',
        'telepon' => 'string',
        'fax' => 'string',
        'email' => 'string',
        'alamat' => 'string',
        'longitude' => 'string',
        'latitude' => 'string',
        'lurah' => 'string',
        'foto_lurah' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pelanggans()
    {
        return $this->hasMany(\App\Models\Pelanggan::class);
    }
}
