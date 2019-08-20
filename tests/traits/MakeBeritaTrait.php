<?php

use Faker\Factory as Faker;
use App\Models\Berita;
use App\Repositories\BeritaRepository;

trait MakeBeritaTrait
{
    /**
     * Create fake instance of Berita and save it in database
     *
     * @param array $beritaFields
     * @return Berita
     */
    public function makeBerita($beritaFields = [])
    {
        /** @var BeritaRepository $beritaRepo */
        $beritaRepo = App::make(BeritaRepository::class);
        $theme = $this->fakeBeritaData($beritaFields);
        return $beritaRepo->create($theme);
    }

    /**
     * Get fake instance of Berita
     *
     * @param array $beritaFields
     * @return Berita
     */
    public function fakeBerita($beritaFields = [])
    {
        return new Berita($this->fakeBeritaData($beritaFields));
    }

    /**
     * Get fake data of Berita
     *
     * @param array $postFields
     * @return array
     */
    public function fakeBeritaData($beritaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'judul' => $fake->word,
            'isi' => $fake->text,
            'foto' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'admin_id' => $fake->word,
            'mulai_berlaku' => $fake->word,
            'akhir_berlaku' => $fake->word
        ], $beritaFields);
    }
}
