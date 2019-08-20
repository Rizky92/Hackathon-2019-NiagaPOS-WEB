<?php

namespace App\Repositories;

use App\Models\Reward;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RewardRepository
 * @package App\Repositories
 * @version December 22, 2018, 12:15 am UTC
 *
 * @method Reward findWithoutFail($id, $columns = ['*'])
 * @method Reward find($id, $columns = ['*'])
 * @method Reward first($columns = ['*'])
*/
class RewardRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'point',
        'foto',
        'keterangan',
        'admin_id',
        'mulai_berlaku',
        'akhir_berlaku'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Reward::class;
    }
}
