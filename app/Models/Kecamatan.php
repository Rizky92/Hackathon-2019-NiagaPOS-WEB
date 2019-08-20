<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kecamatan
 * @package App\Models
 * @version August 3, 2019, 9:17 am UTC
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
 * @property string telepon
 * @property string email
 * @property string alamat
 * @property string fax
 * @property string latitude
 * @property string longitude
 * @property string camat
 * @property string cover
 */
class Kecamatan extends Model
{
    use SoftDeletes;

    public $table = 'kecamatan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'nama',
        'telepon',
        'email',
        'alamat',
        'fax',
        'latitude',
        'longitude',
        'camat',
        'cover',
        'foto_camat',
        'website',
        'kecamatan_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'telepon' => 'string',
        'email' => 'string',
        'alamat' => 'string',
        'fax' => 'string',
        'latitude' => 'string',
        'longitude' => 'string',
        'camat' => 'string',
        'cover' => 'string'
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
