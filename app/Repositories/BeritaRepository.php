<?php

namespace App\Repositories;

use App\Models\Berita;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BeritaRepository
 * @package App\Repositories
 * @version December 31, 2018, 3:57 am UTC
 *
 * @method Berita findWithoutFail($id, $columns = ['*'])
 * @method Berita find($id, $columns = ['*'])
 * @method Berita first($columns = ['*'])
*/
class BeritaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'judul',
        'isi',
        'foto',
        'admin_id',
        'mulai_berlaku',
        'akhir_berlaku'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Berita::class;
    }
}
