<?php

namespace App\Repositories;

use App\Models\Kecamatan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KecamatanRepository
 * @package App\Repositories
 * @version August 3, 2019, 9:17 am UTC
 *
 * @method Kecamatan findWithoutFail($id, $columns = ['*'])
 * @method Kecamatan find($id, $columns = ['*'])
 * @method Kecamatan first($columns = ['*'])
*/
class KecamatanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'telepon',
        'email',
        'alamat',
        'fax',
        'latitude',
        'longitude',
        'camat',
        'cover'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Kecamatan::class;
    }
}
