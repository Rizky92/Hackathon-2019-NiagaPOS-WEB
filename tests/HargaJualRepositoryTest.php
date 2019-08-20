<?php

use App\Models\HargaJual;
use App\Repositories\HargaJualRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HargaJualRepositoryTest extends TestCase
{
    use MakeHargaJualTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var HargaJualRepository
     */
    protected $hargaJualRepo;

    public function setUp()
    {
        parent::setUp();
        $this->hargaJualRepo = App::make(HargaJualRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateHargaJual()
    {
        $hargaJual = $this->fakeHargaJualData();
        $createdHargaJual = $this->hargaJualRepo->create($hargaJual);
        $createdHargaJual = $createdHargaJual->toArray();
        $this->assertArrayHasKey('id', $createdHargaJual);
        $this->assertNotNull($createdHargaJual['id'], 'Created HargaJual must have id specified');
        $this->assertNotNull(HargaJual::find($createdHargaJual['id']), 'HargaJual with given id must be in DB');
        $this->assertModelData($hargaJual, $createdHargaJual);
    }

    /**
     * @test read
     */
    public function testReadHargaJual()
    {
        $hargaJual = $this->makeHargaJual();
        $dbHargaJual = $this->hargaJualRepo->find($hargaJual->id);
        $dbHargaJual = $dbHargaJual->toArray();
        $this->assertModelData($hargaJual->toArray(), $dbHargaJual);
    }

    /**
     * @test update
     */
    public function testUpdateHargaJual()
    {
        $hargaJual = $this->makeHargaJual();
        $fakeHargaJual = $this->fakeHargaJualData();
        $updatedHargaJual = $this->hargaJualRepo->update($fakeHargaJual, $hargaJual->id);
        $this->assertModelData($fakeHargaJual, $updatedHargaJual->toArray());
        $dbHargaJual = $this->hargaJualRepo->find($hargaJual->id);
        $this->assertModelData($fakeHargaJual, $dbHargaJual->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteHargaJual()
    {
        $hargaJual = $this->makeHargaJual();
        $resp = $this->hargaJualRepo->delete($hargaJual->id);
        $this->assertTrue($resp);
        $this->assertNull(HargaJual::find($hargaJual->id), 'HargaJual should not exist in DB');
    }
}
