<?php

namespace App\Repositories;

use App\Models\Daerah;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DaerahRepository
 * @package App\Repositories
 * @version October 23, 2018, 1:04 am UTC
 *
 * @method Daerah findWithoutFail($id, $columns = ['*'])
 * @method Daerah find($id, $columns = ['*'])
 * @method Daerah first($columns = ['*'])
*/
class DaerahRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'keterangan',
        'daerah_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Daerah::class;
    }
}
