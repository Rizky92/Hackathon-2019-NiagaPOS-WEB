<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StokApiTest extends TestCase
{
    use MakeStokTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateStok()
    {
        $stok = $this->fakeStokData();
        $this->json('POST', '/api/v1/stoks', $stok);

        $this->assertApiResponse($stok);
    }

    /**
     * @test
     */
    public function testReadStok()
    {
        $stok = $this->makeStok();
        $this->json('GET', '/api/v1/stoks/'.$stok->id);

        $this->assertApiResponse($stok->toArray());
    }

    /**
     * @test
     */
    public function testUpdateStok()
    {
        $stok = $this->makeStok();
        $editedStok = $this->fakeStokData();

        $this->json('PUT', '/api/v1/stoks/'.$stok->id, $editedStok);

        $this->assertApiResponse($editedStok);
    }

    /**
     * @test
     */
    public function testDeleteStok()
    {
        $stok = $this->makeStok();
        $this->json('DELETE', '/api/v1/stoks/'.$stok->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/stoks/'.$stok->id);

        $this->assertResponseStatus(404);
    }
}
