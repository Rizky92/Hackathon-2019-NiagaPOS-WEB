<?php

namespace App\Repositories;

use App\Models\ProdukHasAtributBarang;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProdukHasAtributBarangRepository
 * @package App\Repositories
 * @version March 9, 2019, 3:20 am UTC
 *
 * @method ProdukHasAtributBarang findWithoutFail($id, $columns = ['*'])
 * @method ProdukHasAtributBarang find($id, $columns = ['*'])
 * @method ProdukHasAtributBarang first($columns = ['*'])
*/
class ProdukHasAtributBarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'atribut_barang_id',
        'value'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProdukHasAtributBarang::class;
    }
}
