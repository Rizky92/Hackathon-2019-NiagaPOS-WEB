<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KelurahanApiTest extends TestCase
{
    use MakeKelurahanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateKelurahan()
    {
        $kelurahan = $this->fakeKelurahanData();
        $this->json('POST', '/api/v1/kelurahans', $kelurahan);

        $this->assertApiResponse($kelurahan);
    }

    /**
     * @test
     */
    public function testReadKelurahan()
    {
        $kelurahan = $this->makeKelurahan();
        $this->json('GET', '/api/v1/kelurahans/'.$kelurahan->id);

        $this->assertApiResponse($kelurahan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateKelurahan()
    {
        $kelurahan = $this->makeKelurahan();
        $editedKelurahan = $this->fakeKelurahanData();

        $this->json('PUT', '/api/v1/kelurahans/'.$kelurahan->id, $editedKelurahan);

        $this->assertApiResponse($editedKelurahan);
    }

    /**
     * @test
     */
    public function testDeleteKelurahan()
    {
        $kelurahan = $this->makeKelurahan();
        $this->json('DELETE', '/api/v1/kelurahans/'.$kelurahan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/kelurahans/'.$kelurahan->id);

        $this->assertResponseStatus(404);
    }
}
