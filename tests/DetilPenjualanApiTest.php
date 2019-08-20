<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DetilPenjualanApiTest extends TestCase
{
    use MakeDetilPenjualanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDetilPenjualan()
    {
        $detilPenjualan = $this->fakeDetilPenjualanData();
        $this->json('POST', '/api/v1/detilPenjualans', $detilPenjualan);

        $this->assertApiResponse($detilPenjualan);
    }

    /**
     * @test
     */
    public function testReadDetilPenjualan()
    {
        $detilPenjualan = $this->makeDetilPenjualan();
        $this->json('GET', '/api/v1/detilPenjualans/'.$detilPenjualan->id);

        $this->assertApiResponse($detilPenjualan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDetilPenjualan()
    {
        $detilPenjualan = $this->makeDetilPenjualan();
        $editedDetilPenjualan = $this->fakeDetilPenjualanData();

        $this->json('PUT', '/api/v1/detilPenjualans/'.$detilPenjualan->id, $editedDetilPenjualan);

        $this->assertApiResponse($editedDetilPenjualan);
    }

    /**
     * @test
     */
    public function testDeleteDetilPenjualan()
    {
        $detilPenjualan = $this->makeDetilPenjualan();
        $this->json('DELETE', '/api/v1/detilPenjualans/'.$detilPenjualan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/detilPenjualans/'.$detilPenjualan->id);

        $this->assertResponseStatus(404);
    }
}
