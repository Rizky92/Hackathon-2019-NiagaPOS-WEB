<?php

namespace App\Repositories;

use App\Models\ReturnPenjualan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ReturnPenjualanRepository
 * @package App\Repositories
 * @version December 2, 2018, 1:10 pm UTC
 *
 * @method ReturnPenjualan findWithoutFail($id, $columns = ['*'])
 * @method ReturnPenjualan find($id, $columns = ['*'])
 * @method ReturnPenjualan first($columns = ['*'])
*/
class ReturnPenjualanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'detil_penjualan_id',
        'jumlah_return',
        'total_return',
        'alasan',
        'kode_admin',
        'site_id',
        'users_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ReturnPenjualan::class;
    }
}
