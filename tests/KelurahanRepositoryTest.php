<?php

use App\Models\Kelurahan;
use App\Repositories\KelurahanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KelurahanRepositoryTest extends TestCase
{
    use MakeKelurahanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var KelurahanRepository
     */
    protected $kelurahanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->kelurahanRepo = App::make(KelurahanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateKelurahan()
    {
        $kelurahan = $this->fakeKelurahanData();
        $createdKelurahan = $this->kelurahanRepo->create($kelurahan);
        $createdKelurahan = $createdKelurahan->toArray();
        $this->assertArrayHasKey('id', $createdKelurahan);
        $this->assertNotNull($createdKelurahan['id'], 'Created Kelurahan must have id specified');
        $this->assertNotNull(Kelurahan::find($createdKelurahan['id']), 'Kelurahan with given id must be in DB');
        $this->assertModelData($kelurahan, $createdKelurahan);
    }

    /**
     * @test read
     */
    public function testReadKelurahan()
    {
        $kelurahan = $this->makeKelurahan();
        $dbKelurahan = $this->kelurahanRepo->find($kelurahan->id);
        $dbKelurahan = $dbKelurahan->toArray();
        $this->assertModelData($kelurahan->toArray(), $dbKelurahan);
    }

    /**
     * @test update
     */
    public function testUpdateKelurahan()
    {
        $kelurahan = $this->makeKelurahan();
        $fakeKelurahan = $this->fakeKelurahanData();
        $updatedKelurahan = $this->kelurahanRepo->update($fakeKelurahan, $kelurahan->id);
        $this->assertModelData($fakeKelurahan, $updatedKelurahan->toArray());
        $dbKelurahan = $this->kelurahanRepo->find($kelurahan->id);
        $this->assertModelData($fakeKelurahan, $dbKelurahan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteKelurahan()
    {
        $kelurahan = $this->makeKelurahan();
        $resp = $this->kelurahanRepo->delete($kelurahan->id);
        $this->assertTrue($resp);
        $this->assertNull(Kelurahan::find($kelurahan->id), 'Kelurahan should not exist in DB');
    }
}
