<?php

namespace App\Repositories;

use App\Models\ShiftKerja;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ShiftKerjaRepository
 * @package App\Repositories
 * @version September 22, 2018, 2:26 pm UTC
 *
 * @method ShiftKerja findWithoutFail($id, $columns = ['*'])
 * @method ShiftKerja find($id, $columns = ['*'])
 * @method ShiftKerja first($columns = ['*'])
*/
class ShiftKerjaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'waktu_mulai',
        'waktu_selesai'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ShiftKerja::class;
    }
}
