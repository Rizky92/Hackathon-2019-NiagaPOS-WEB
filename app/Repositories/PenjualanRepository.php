<?php

namespace App\Repositories;

use App\Models\Penjualan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PenjualanRepository
 * @package App\Repositories
 * @version December 2, 2018, 1:08 pm UTC
 *
 * @method Penjualan findWithoutFail($id, $columns = ['*'])
 * @method Penjualan find($id, $columns = ['*'])
 * @method Penjualan first($columns = ['*'])
*/
class PenjualanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'faktur_penjualan',
        'pelanggan_id',
        'site_id',
        'nomor_resep',
        'tanggal_jatuh_tempo',
        'ppn',
        'diskon',
        'total',
        'jenis_transaksi_penjualan_id',
        'bayar',
        'users_id',
        'point'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Penjualan::class;
    }
}
