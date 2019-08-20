<?php

namespace App\Repositories;

use App\Models\ProdukHasRaw;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProdukHasRawRepository
 * @package App\Repositories
 * @version April 5, 2019, 6:34 am UTC
 *
 * @method ProdukHasRaw findWithoutFail($id, $columns = ['*'])
 * @method ProdukHasRaw find($id, $columns = ['*'])
 * @method ProdukHasRaw first($columns = ['*'])
*/
class ProdukHasRawRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'produk_raw_id',
        'jumlah',
        'users_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProdukHasRaw::class;
    }
}
