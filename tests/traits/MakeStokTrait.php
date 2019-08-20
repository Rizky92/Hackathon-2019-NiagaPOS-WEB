<?php

use Faker\Factory as Faker;
use App\Models\Stok;
use App\Repositories\StokRepository;

trait MakeStokTrait
{
    /**
     * Create fake instance of Stok and save it in database
     *
     * @param array $stokFields
     * @return Stok
     */
    public function makeStok($stokFields = [])
    {
        /** @var StokRepository $stokRepo */
        $stokRepo = App::make(StokRepository::class);
        $theme = $this->fakeStokData($stokFields);
        return $stokRepo->create($theme);
    }

    /**
     * Get fake instance of Stok
     *
     * @param array $stokFields
     * @return Stok
     */
    public function fakeStok($stokFields = [])
    {
        return new Stok($this->fakeStokData($stokFields));
    }

    /**
     * Get fake data of Stok
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStokData($stokFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'produk_id' => $fake->randomDigitNotNull,
            'jumlah' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $stokFields);
    }
}
