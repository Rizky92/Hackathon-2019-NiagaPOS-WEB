<?php

namespace App\Repositories;

use App\Models\PelangganHasVoucher;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PelangganHasVoucherRepository
 * @package App\Repositories
 * @version January 1, 2019, 2:02 am UTC
 *
 * @method PelangganHasVoucher findWithoutFail($id, $columns = ['*'])
 * @method PelangganHasVoucher find($id, $columns = ['*'])
 * @method PelangganHasVoucher first($columns = ['*'])
*/
class PelangganHasVoucherRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pelanggan_id',
        'voucher_id',
        'point',
        'users_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PelangganHasVoucher::class;
    }
}
