<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HargaJualApiTest extends TestCase
{
    use MakeHargaJualTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateHargaJual()
    {
        $hargaJual = $this->fakeHargaJualData();
        $this->json('POST', '/api/v1/hargaJuals', $hargaJual);

        $this->assertApiResponse($hargaJual);
    }

    /**
     * @test
     */
    public function testReadHargaJual()
    {
        $hargaJual = $this->makeHargaJual();
        $this->json('GET', '/api/v1/hargaJuals/'.$hargaJual->id);

        $this->assertApiResponse($hargaJual->toArray());
    }

    /**
     * @test
     */
    public function testUpdateHargaJual()
    {
        $hargaJual = $this->makeHargaJual();
        $editedHargaJual = $this->fakeHargaJualData();

        $this->json('PUT', '/api/v1/hargaJuals/'.$hargaJual->id, $editedHargaJual);

        $this->assertApiResponse($editedHargaJual);
    }

    /**
     * @test
     */
    public function testDeleteHargaJual()
    {
        $hargaJual = $this->makeHargaJual();
        $this->json('DELETE', '/api/v1/hargaJuals/'.$hargaJual->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/hargaJuals/'.$hargaJual->id);

        $this->assertResponseStatus(404);
    }
}
