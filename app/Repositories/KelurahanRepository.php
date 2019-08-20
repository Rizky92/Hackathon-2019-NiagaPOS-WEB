<?php

namespace App\Repositories;

use App\Models\Kelurahan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KelurahanRepository
 * @package App\Repositories
 * @version August 3, 2019, 10:17 am UTC
 *
 * @method Kelurahan findWithoutFail($id, $columns = ['*'])
 * @method Kelurahan find($id, $columns = ['*'])
 * @method Kelurahan first($columns = ['*'])
*/
class KelurahanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'kelurahan_id',
        'website',
        'telepon',
        'fax',
        'email',
        'alamat',
        'longitude',
        'latitude',
        'lurah',
        'foto_lurah'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Kelurahan::class;
    }
}
