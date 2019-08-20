<?php

namespace App\Repositories;

use App\Models\Pembelian;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PembelianRepository
 * @package App\Repositories
 * @version December 2, 2018, 1:09 pm UTC
 *
 * @method Pembelian findWithoutFail($id, $columns = ['*'])
 * @method Pembelian find($id, $columns = ['*'])
 * @method Pembelian first($columns = ['*'])
*/
class PembelianRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'faktur_pembelian',
        'faktur_distributor',
        'site_id',
        'tanggal_jatuh_tempo',
        'ppn',
        'diskon',
        'total',
        'distributor_id',
        'tanggal_faktur',
        'users_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pembelian::class;
    }
}
