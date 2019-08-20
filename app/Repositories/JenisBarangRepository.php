<?php

namespace App\Repositories;

use App\Models\JenisBarang;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JenisBarangRepository
 * @package App\Repositories
 * @version September 22, 2018, 2:24 pm UTC
 *
 * @method JenisBarang findWithoutFail($id, $columns = ['*'])
 * @method JenisBarang find($id, $columns = ['*'])
 * @method JenisBarang first($columns = ['*'])
*/
class JenisBarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'store_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return JenisBarang::class;
    }
}
