<?php

namespace App\Repositories;

use App\Models\Distributor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DistributorRepository
 * @package App\Repositories
 * @version September 22, 2018, 2:22 pm UTC
 *
 * @method Distributor findWithoutFail($id, $columns = ['*'])
 * @method Distributor find($id, $columns = ['*'])
 * @method Distributor first($columns = ['*'])
*/
class DistributorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'alamat',
        'kota',
        'kontak'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Distributor::class;
    }
}
