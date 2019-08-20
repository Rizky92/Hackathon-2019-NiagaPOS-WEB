<?php

namespace App\Repositories;

use App\Models\AtributBarang;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AtributBarangRepository
 * @package App\Repositories
 * @version September 22, 2018, 2:24 pm UTC
 *
 * @method AtributBarang findWithoutFail($id, $columns = ['*'])
 * @method AtributBarang find($id, $columns = ['*'])
 * @method AtributBarang first($columns = ['*'])
*/
class AtributBarangRepository extends BaseRepository
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
        return AtributBarang::class;
    }
}
