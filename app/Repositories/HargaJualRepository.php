<?php

namespace App\Repositories;

use App\Models\HargaJual;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class HargaJualRepository
 * @package App\Repositories
 * @version June 1, 2019, 7:38 am UTC
 *
 * @method HargaJual findWithoutFail($id, $columns = ['*'])
 * @method HargaJual find($id, $columns = ['*'])
 * @method HargaJual first($columns = ['*'])
*/
class HargaJualRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'start_from',
        'valid_until',
        'value',
        'store_id',
        'site_id',
        'produk_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return HargaJual::class;
    }
}
