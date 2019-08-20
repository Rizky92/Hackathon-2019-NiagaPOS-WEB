<?php

namespace App\Repositories;

use App\Models\Promosi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PromosiRepository
 * @package App\Repositories
 * @version October 24, 2018, 8:03 am UTC
 *
 * @method Promosi findWithoutFail($id, $columns = ['*'])
 * @method Promosi find($id, $columns = ['*'])
 * @method Promosi first($columns = ['*'])
*/
class PromosiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'judul',
        'isi',
        'foto',
        'mulai_promosi',
        'akhir_promosi',
        'users_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Promosi::class;
    }
}
