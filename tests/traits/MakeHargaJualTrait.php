<?php

use Faker\Factory as Faker;
use App\Models\HargaJual;
use App\Repositories\HargaJualRepository;

trait MakeHargaJualTrait
{
    /**
     * Create fake instance of HargaJual and save it in database
     *
     * @param array $hargaJualFields
     * @return HargaJual
     */
    public function makeHargaJual($hargaJualFields = [])
    {
        /** @var HargaJualRepository $hargaJualRepo */
        $hargaJualRepo = App::make(HargaJualRepository::class);
        $theme = $this->fakeHargaJualData($hargaJualFields);
        return $hargaJualRepo->create($theme);
    }

    /**
     * Get fake instance of HargaJual
     *
     * @param array $hargaJualFields
     * @return HargaJual
     */
    public function fakeHargaJual($hargaJualFields = [])
    {
        return new HargaJual($this->fakeHargaJualData($hargaJualFields));
    }

    /**
     * Get fake data of HargaJual
     *
     * @param array $postFields
     * @return array
     */
    public function fakeHargaJualData($hargaJualFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'start_from' => $fake->date('Y-m-d H:i:s'),
            'valid_until' => $fake->date('Y-m-d H:i:s'),
            'value' => $fake->word,
            'store_id' => $fake->randomDigitNotNull,
            'site_id' => $fake->randomDigitNotNull,
            'produk_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $hargaJualFields);
    }
}
