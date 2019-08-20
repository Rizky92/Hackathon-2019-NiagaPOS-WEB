<?php

namespace App\Repositories;

use App\Models\Pelanggan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PelangganRepository
 * @package App\Repositories
 * @version December 19, 2018, 5:42 am UTC
 *
 * @method Pelanggan findWithoutFail($id, $columns = ['*'])
 * @method Pelanggan find($id, $columns = ['*'])
 * @method Pelanggan first($columns = ['*'])
*/
class PelangganRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'pekerjaan',
        'alamat',
        'kontak',
        'site_id',
        'users_id',
        'point'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pelanggan::class;
    }
}
