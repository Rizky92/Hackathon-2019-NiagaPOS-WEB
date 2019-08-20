<?php

namespace App\Repositories;

use App\Models\Satuan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SatuanRepository
 * @package App\Repositories
 * @version November 12, 2018, 1:55 am UTC
 *
 * @method Satuan findWithoutFail($id, $columns = ['*'])
 * @method Satuan find($id, $columns = ['*'])
 * @method Satuan first($columns = ['*'])
*/
class SatuanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'satuan_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Satuan::class;
    }
}
