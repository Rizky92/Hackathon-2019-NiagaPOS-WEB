<?php

namespace App\Models;

use Baum\Node;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Daerah
 * @package App\Models
 * @version October 23, 2018, 1:04 am UTC
 *
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
 * @property \Illuminate\Database\Eloquent\Collection Site
 * @property \Illuminate\Database\Eloquent\Collection stok
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string nama
 * @property string keterangan
 * @property integer daerah_id
 */
class Daerah extends Node
{
    use SoftDeletes;

    public $table = 'daerah';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    // 'parent_id' column name
    protected $parentColumn = 'daerah_id';

    // 'lft' column name
    protected $leftColumn = 'left';

    // 'rgt' column name
    protected $rightColumn = 'right';

    // 'depth' column name
    protected $depthColumn = 'level';

    public $fillable = [
        'nama',
        'keterangan',
        'daerah_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'keterangan' => 'string',
        'daerah_id' => 'integer'
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
    public function sites()
    {
        return $this->hasMany(\App\Models\Site::class);
    }

    public function parent()
    {
        return $this->belongsTo(\App\Models\Daerah::class,'daerah_id');
    }

    public function child()
    {
        return $this->hasMany(\App\Models\Daerah::class,'daerah_id');
    }
}
