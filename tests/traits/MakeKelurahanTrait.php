<?php

use Faker\Factory as Faker;
use App\Models\Kelurahan;
use App\Repositories\KelurahanRepository;

trait MakeKelurahanTrait
{
    /**
     * Create fake instance of Kelurahan and save it in database
     *
     * @param array $kelurahanFields
     * @return Kelurahan
     */
    public function makeKelurahan($kelurahanFields = [])
    {
        /** @var KelurahanRepository $kelurahanRepo */
        $kelurahanRepo = App::make(KelurahanRepository::class);
        $theme = $this->fakeKelurahanData($kelurahanFields);
        return $kelurahanRepo->create($theme);
    }

    /**
     * Get fake instance of Kelurahan
     *
     * @param array $kelurahanFields
     * @return Kelurahan
     */
    public function fakeKelurahan($kelurahanFields = [])
    {
        return new Kelurahan($this->fakeKelurahanData($kelurahanFields));
    }

    /**
     * Get fake data of Kelurahan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeKelurahanData($kelurahanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'kelurahan_id' => $fake->randomDigitNotNull,
            'website' => $fake->word,
            'telepon' => $fake->word,
            'fax' => $fake->word,
            'email' => $fake->word,
            'alamat' => $fake->word,
            'longitude' => $fake->word,
            'latitude' => $fake->word,
            'lurah' => $fake->word,
            'foto_lurah' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $kelurahanFields);
    }
}
