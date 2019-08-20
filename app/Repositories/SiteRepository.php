<?php

namespace App\Repositories;

use App\Models\Site;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SiteRepository
 * @package App\Repositories
 * @version December 19, 2018, 12:35 pm UTC
 *
 * @method Site findWithoutFail($id, $columns = ['*'])
 * @method Site find($id, $columns = ['*'])
 * @method Site first($columns = ['*'])
*/
class SiteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'store_id',
        'nama',
        'kontak',
        'alamat',
        'daerah_id',
        'foto'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Site::class;
    }
}
