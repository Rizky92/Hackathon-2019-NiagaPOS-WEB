<?php

namespace App\Repositories;

use App\Models\Produsen;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProdusenRepository
 * @package App\Repositories
 * @version September 22, 2018, 2:21 pm UTC
 *
 * @method Produsen findWithoutFail($id, $columns = ['*'])
 * @method Produsen find($id, $columns = ['*'])
 * @method Produsen first($columns = ['*'])
*/
class ProdusenRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'alamat',
        'kota',
        'kontak',
        'store_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Produsen::class;
    }
}
