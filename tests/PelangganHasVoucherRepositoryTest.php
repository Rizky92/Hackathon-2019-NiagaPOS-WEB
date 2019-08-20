<?php

use App\Models\PelangganHasVoucher;
use App\Repositories\PelangganHasVoucherRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PelangganHasVoucherRepositoryTest extends TestCase
{
    use MakePelangganHasVoucherTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PelangganHasVoucherRepository
     */
    protected $pelangganHasVoucherRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pelangganHasVoucherRepo = App::make(PelangganHasVoucherRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePelangganHasVoucher()
    {
        $pelangganHasVoucher = $this->fakePelangganHasVoucherData();
        $createdPelangganHasVoucher = $this->pelangganHasVoucherRepo->create($pelangganHasVoucher);
        $createdPelangganHasVoucher = $createdPelangganHasVoucher->toArray();
        $this->assertArrayHasKey('id', $createdPelangganHasVoucher);
        $this->assertNotNull($createdPelangganHasVoucher['id'], 'Created PelangganHasVoucher must have id specified');
        $this->assertNotNull(PelangganHasVoucher::find($createdPelangganHasVoucher['id']), 'PelangganHasVoucher with given id must be in DB');
        $this->assertModelData($pelangganHasVoucher, $createdPelangganHasVoucher);
    }

    /**
     * @test read
     */
    public function testReadPelangganHasVoucher()
    {
        $pelangganHasVoucher = $this->makePelangganHasVoucher();
        $dbPelangganHasVoucher = $this->pelangganHasVoucherRepo->find($pelangganHasVoucher->id);
        $dbPelangganHasVoucher = $dbPelangganHasVoucher->toArray();
        $this->assertModelData($pelangganHasVoucher->toArray(), $dbPelangganHasVoucher);
    }

    /**
     * @test update
     */
    public function testUpdatePelangganHasVoucher()
    {
        $pelangganHasVoucher = $this->makePelangganHasVoucher();
        $fakePelangganHasVoucher = $this->fakePelangganHasVoucherData();
        $updatedPelangganHasVoucher = $this->pelangganHasVoucherRepo->update($fakePelangganHasVoucher, $pelangganHasVoucher->id);
        $this->assertModelData($fakePelangganHasVoucher, $updatedPelangganHasVoucher->toArray());
        $dbPelangganHasVoucher = $this->pelangganHasVoucherRepo->find($pelangganHasVoucher->id);
        $this->assertModelData($fakePelangganHasVoucher, $dbPelangganHasVoucher->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePelangganHasVoucher()
    {
        $pelangganHasVoucher = $this->makePelangganHasVoucher();
        $resp = $this->pelangganHasVoucherRepo->delete($pelangganHasVoucher->id);
        $this->assertTrue($resp);
        $this->assertNull(PelangganHasVoucher::find($pelangganHasVoucher->id), 'PelangganHasVoucher should not exist in DB');
    }
}
