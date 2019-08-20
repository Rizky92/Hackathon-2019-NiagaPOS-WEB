<?php

namespace App\Repositories;

use App\Models\Voucher;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VoucherRepository
 * @package App\Repositories
 * @version October 24, 2018, 8:03 am UTC
 *
 * @method Voucher findWithoutFail($id, $columns = ['*'])
 * @method Voucher find($id, $columns = ['*'])
 * @method Voucher first($columns = ['*'])
*/
class VoucherRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'point',
        'foto',
        'keterangan',
        'users_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Voucher::class;
    }
}
