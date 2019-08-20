<?php

namespace App\Repositories;

use App\Models\Produk;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProdukRepository
 * @package App\Repositories
 * @version December 2, 2018, 1:05 pm UTC
 *
 * @method Produk findWithoutFail($id, $columns = ['*'])
 * @method Produk find($id, $columns = ['*'])
 * @method Produk first($columns = ['*'])
*/
class ProdukRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'barcode',
        'produsen_id',
        'jenis_barang_id',
        'kategori_barang_id',
        'satuan_terkecil',
        'ppn_persen',
        'margin_persen',
        'diskon_persen',
        'stok_minimal',
        'default_input',
        'distributor_id',
        'store_id',
        'pembelian',
        'penjualan',
        'foto'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Produk::class;
    }
}
