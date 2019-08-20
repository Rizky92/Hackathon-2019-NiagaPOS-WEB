<?php

namespace App\Repositories;

use App\Models\JenisTransaksiPenjualan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JenisTransaksiPenjualanRepository
 * @package App\Repositories
 * @version September 22, 2018, 2:28 pm UTC
 *
 * @method JenisTransaksiPenjualan findWithoutFail($id, $columns = ['*'])
 * @method JenisTransaksiPenjualan find($id, $columns = ['*'])
 * @method JenisTransaksiPenjualan first($columns = ['*'])
*/
class JenisTransaksiPenjualanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'margin_persen',
        'store_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return JenisTransaksiPenjualan::class;
    }
}
