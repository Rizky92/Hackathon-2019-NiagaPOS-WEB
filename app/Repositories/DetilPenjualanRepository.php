<?php

namespace App\Repositories;

use App\Models\DetilPenjualan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DetilPenjualanRepository
 * @package App\Repositories
 * @version June 3, 2019, 7:33 am UTC
 *
 * @method DetilPenjualan findWithoutFail($id, $columns = ['*'])
 * @method DetilPenjualan find($id, $columns = ['*'])
 * @method DetilPenjualan first($columns = ['*'])
*/
class DetilPenjualanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'penjualan_id',
        'satuan_id',
        'produk_id',
        'harga_beli',
        'jumlah',
        'ppn',
        'margin',
        'harga_jual',
        'diskon',
        'sub_total',
        'racikan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DetilPenjualan::class;
    }
}
