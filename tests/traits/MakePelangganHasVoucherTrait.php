<?php

use Faker\Factory as Faker;
use App\Models\PelangganHasVoucher;
use App\Repositories\PelangganHasVoucherRepository;

trait MakePelangganHasVoucherTrait
{
    /**
     * Create fake instance of PelangganHasVoucher and save it in database
     *
     * @param array $pelangganHasVoucherFields
     * @return PelangganHasVoucher
     */
    public function makePelangganHasVoucher($pelangganHasVoucherFields = [])
    {
        /** @var PelangganHasVoucherRepository $pelangganHasVoucherRepo */
        $pelangganHasVoucherRepo = App::make(PelangganHasVoucherRepository::class);
        $theme = $this->fakePelangganHasVoucherData($pelangganHasVoucherFields);
        return $pelangganHasVoucherRepo->create($theme);
    }

    /**
     * Get fake instance of PelangganHasVoucher
     *
     * @param array $pelangganHasVoucherFields
     * @return PelangganHasVoucher
     */
    public function fakePelangganHasVoucher($pelangganHasVoucherFields = [])
    {
        return new PelangganHasVoucher($this->fakePelangganHasVoucherData($pelangganHasVoucherFields));
    }

    /**
     * Get fake data of PelangganHasVoucher
     *
     * @param array $postFields
     * @return array
     */
    public function fakePelangganHasVoucherData($pelangganHasVoucherFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'pelanggan_id' => $fake->word,
            'voucher_id' => $fake->randomDigitNotNull,
            'point' => $fake->randomDigitNotNull,
            'users_id' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $pelangganHasVoucherFields);
    }
}
