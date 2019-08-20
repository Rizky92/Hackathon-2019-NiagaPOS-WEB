<?php

namespace App\Repositories;

use App\Models\Stok;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StokRepository
 * @package App\Repositories
 * @version May 31, 2019, 8:26 am UTC
 *
 * @method Stok findWithoutFail($id, $columns = ['*'])
 * @method Stok find($id, $columns = ['*'])
 * @method Stok first($columns = ['*'])
*/
class StokRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'produk_id',
        'jumlah'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Stok::class;
    }
}
