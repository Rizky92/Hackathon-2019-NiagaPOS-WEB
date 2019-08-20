<?php

use App\Models\Stok;
use App\Repositories\StokRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StokRepositoryTest extends TestCase
{
    use MakeStokTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var StokRepository
     */
    protected $stokRepo;

    public function setUp()
    {
        parent::setUp();
        $this->stokRepo = App::make(StokRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateStok()
    {
        $stok = $this->fakeStokData();
        $createdStok = $this->stokRepo->create($stok);
        $createdStok = $createdStok->toArray();
        $this->assertArrayHasKey('id', $createdStok);
        $this->assertNotNull($createdStok['id'], 'Created Stok must have id specified');
        $this->assertNotNull(Stok::find($createdStok['id']), 'Stok with given id must be in DB');
        $this->assertModelData($stok, $createdStok);
    }

    /**
     * @test read
     */
    public function testReadStok()
    {
        $stok = $this->makeStok();
        $dbStok = $this->stokRepo->find($stok->id);
        $dbStok = $dbStok->toArray();
        $this->assertModelData($stok->toArray(), $dbStok);
    }

    /**
     * @test update
     */
    public function testUpdateStok()
    {
        $stok = $this->makeStok();
        $fakeStok = $this->fakeStokData();
        $updatedStok = $this->stokRepo->update($fakeStok, $stok->id);
        $this->assertModelData($fakeStok, $updatedStok->toArray());
        $dbStok = $this->stokRepo->find($stok->id);
        $this->assertModelData($fakeStok, $dbStok->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteStok()
    {
        $stok = $this->makeStok();
        $resp = $this->stokRepo->delete($stok->id);
        $this->assertTrue($resp);
        $this->assertNull(Stok::find($stok->id), 'Stok should not exist in DB');
    }
}
