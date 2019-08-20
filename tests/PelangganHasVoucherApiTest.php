<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PelangganHasVoucherApiTest extends TestCase
{
    use MakePelangganHasVoucherTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePelangganHasVoucher()
    {
        $pelangganHasVoucher = $this->fakePelangganHasVoucherData();
        $this->json('POST', '/api/v1/pelangganHasVouchers', $pelangganHasVoucher);

        $this->assertApiResponse($pelangganHasVoucher);
    }

    /**
     * @test
     */
    public function testReadPelangganHasVoucher()
    {
        $pelangganHasVoucher = $this->makePelangganHasVoucher();
        $this->json('GET', '/api/v1/pelangganHasVouchers/'.$pelangganHasVoucher->id);

        $this->assertApiResponse($pelangganHasVoucher->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePelangganHasVoucher()
    {
        $pelangganHasVoucher = $this->makePelangganHasVoucher();
        $editedPelangganHasVoucher = $this->fakePelangganHasVoucherData();

        $this->json('PUT', '/api/v1/pelangganHasVouchers/'.$pelangganHasVoucher->id, $editedPelangganHasVoucher);

        $this->assertApiResponse($editedPelangganHasVoucher);
    }

    /**
     * @test
     */
    public function testDeletePelangganHasVoucher()
    {
        $pelangganHasVoucher = $this->makePelangganHasVoucher();
        $this->json('DELETE', '/api/v1/pelangganHasVouchers/'.$pelangganHasVoucher->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pelangganHasVouchers/'.$pelangganHasVoucher->id);

        $this->assertResponseStatus(404);
    }
}
