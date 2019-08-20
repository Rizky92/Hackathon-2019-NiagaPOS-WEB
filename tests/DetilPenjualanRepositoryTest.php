<?php

use App\Models\DetilPenjualan;
use App\Repositories\DetilPenjualanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DetilPenjualanRepositoryTest extends TestCase
{
    use MakeDetilPenjualanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DetilPenjualanRepository
     */
    protected $detilPenjualanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->detilPenjualanRepo = App::make(DetilPenjualanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDetilPenjualan()
    {
        $detilPenjualan = $this->fakeDetilPenjualanData();
        $createdDetilPenjualan = $this->detilPenjualanRepo->create($detilPenjualan);
        $createdDetilPenjualan = $createdDetilPenjualan->toArray();
        $this->assertArrayHasKey('id', $createdDetilPenjualan);
        $this->assertNotNull($createdDetilPenjualan['id'], 'Created DetilPenjualan must have id specified');
        $this->assertNotNull(DetilPenjualan::find($createdDetilPenjualan['id']), 'DetilPenjualan with given id must be in DB');
        $this->assertModelData($detilPenjualan, $createdDetilPenjualan);
    }

    /**
     * @test read
     */
    public function testReadDetilPenjualan()
    {
        $detilPenjualan = $this->makeDetilPenjualan();
        $dbDetilPenjualan = $this->detilPenjualanRepo->find($detilPenjualan->id);
        $dbDetilPenjualan = $dbDetilPenjualan->toArray();
        $this->assertModelData($detilPenjualan->toArray(), $dbDetilPenjualan);
    }

    /**
     * @test update
     */
    public function testUpdateDetilPenjualan()
    {
        $detilPenjualan = $this->makeDetilPenjualan();
        $fakeDetilPenjualan = $this->fakeDetilPenjualanData();
        $updatedDetilPenjualan = $this->detilPenjualanRepo->update($fakeDetilPenjualan, $detilPenjualan->id);
        $this->assertModelData($fakeDetilPenjualan, $updatedDetilPenjualan->toArray());
        $dbDetilPenjualan = $this->detilPenjualanRepo->find($detilPenjualan->id);
        $this->assertModelData($fakeDetilPenjualan, $dbDetilPenjualan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDetilPenjualan()
    {
        $detilPenjualan = $this->makeDetilPenjualan();
        $resp = $this->detilPenjualanRepo->delete($detilPenjualan->id);
        $this->assertTrue($resp);
        $this->assertNull(DetilPenjualan::find($detilPenjualan->id), 'DetilPenjualan should not exist in DB');
    }
}
