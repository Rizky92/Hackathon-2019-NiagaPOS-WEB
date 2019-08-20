<?php

namespace App\Repositories;

use App\Models\Kategori;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KategoriRepository
 * @package App\Repositories
 * @version June 1, 2019, 8:36 am UTC
 *
 * @method Kategori findWithoutFail($id, $columns = ['*'])
 * @method Kategori find($id, $columns = ['*'])
 * @method Kategori first($columns = ['*'])
*/
class KategoriRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'parent_kategori_id',
        'left',
        'right',
        'nesting',
        'store_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Kategori::class;
    }
}
