<?php

use Faker\Factory as Faker;
use App\Models\DetilPenjualan;
use App\Repositories\DetilPenjualanRepository;

trait MakeDetilPenjualanTrait
{
    /**
     * Create fake instance of DetilPenjualan and save it in database
     *
     * @param array $detilPenjualanFields
     * @return DetilPenjualan
     */
    public function makeDetilPenjualan($detilPenjualanFields = [])
    {
        /** @var DetilPenjualanRepository $detilPenjualanRepo */
        $detilPenjualanRepo = App::make(DetilPenjualanRepository::class);
        $theme = $this->fakeDetilPenjualanData($detilPenjualanFields);
        return $detilPenjualanRepo->create($theme);
    }

    /**
     * Get fake instance of DetilPenjualan
     *
     * @param array $detilPenjualanFields
     * @return DetilPenjualan
     */
    public function fakeDetilPenjualan($detilPenjualanFields = [])
    {
        return new DetilPenjualan($this->fakeDetilPenjualanData($detilPenjualanFields));
    }

    /**
     * Get fake data of DetilPenjualan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDetilPenjualanData($detilPenjualanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'penjualan_id' => $fake->word,
            'satuan_id' => $fake->randomDigitNotNull,
            'produk_id' => $fake->randomDigitNotNull,
            'harga_beli' => $fake->randomDigitNotNull,
            'jumlah' => $fake->randomDigitNotNull,
            'ppn' => $fake->randomDigitNotNull,
            'margin' => $fake->randomDigitNotNull,
            'harga_jual' => $fake->randomDigitNotNull,
            'diskon' => $fake->randomDigitNotNull,
            'sub_total' => $fake->randomDigitNotNull,
            'racikan' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $detilPenjualanFields);
    }
}
