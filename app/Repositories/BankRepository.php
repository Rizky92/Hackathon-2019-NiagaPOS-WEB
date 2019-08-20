<?php

namespace App\Repositories;

use App\Models\Bank;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BankRepository
 * @package App\Repositories
 * @version September 22, 2018, 2:37 pm UTC
 *
 * @method Bank findWithoutFail($id, $columns = ['*'])
 * @method Bank find($id, $columns = ['*'])
 * @method Bank first($columns = ['*'])
*/
class BankRepository extends BaseRepository
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
        return Bank::class;
    }
}
