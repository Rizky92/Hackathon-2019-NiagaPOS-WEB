<?php

namespace App\Repositories;

use App\Models\JenisPembayaran;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JenisPembayaranRepository
 * @package App\Repositories
 * @version November 12, 2018, 1:56 am UTC
 *
 * @method JenisPembayaran findWithoutFail($id, $columns = ['*'])
 * @method JenisPembayaran find($id, $columns = ['*'])
 * @method JenisPembayaran first($columns = ['*'])
*/
class JenisPembayaranRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'diskon_persen',
        'margin_persen',
        'tunai'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return JenisPembayaran::class;
    }
}
