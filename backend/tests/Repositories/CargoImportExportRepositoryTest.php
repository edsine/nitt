<?php namespace Tests\Repositories;

use App\Models\CargoImportExport;
use App\Repositories\CargoImportExportRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CargoImportExportRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CargoImportExportRepository
     */
    protected $cargoImportExportRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cargoImportExportRepo = \App::make(CargoImportExportRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cargo_import_export()
    {
        $cargoImportExport = CargoImportExport::factory()->make()->toArray();

        $createdCargoImportExport = $this->cargoImportExportRepo->create($cargoImportExport);

        $createdCargoImportExport = $createdCargoImportExport->toArray();
        $this->assertArrayHasKey('id', $createdCargoImportExport);
        $this->assertNotNull($createdCargoImportExport['id'], 'Created CargoImportExport must have id specified');
        $this->assertNotNull(CargoImportExport::find($createdCargoImportExport['id']), 'CargoImportExport with given id must be in DB');
        $this->assertModelData($cargoImportExport, $createdCargoImportExport);
    }

    /**
     * @test read
     */
    public function test_read_cargo_import_export()
    {
        $cargoImportExport = CargoImportExport::factory()->create();

        $dbCargoImportExport = $this->cargoImportExportRepo->find($cargoImportExport->id);

        $dbCargoImportExport = $dbCargoImportExport->toArray();
        $this->assertModelData($cargoImportExport->toArray(), $dbCargoImportExport);
    }

    /**
     * @test update
     */
    public function test_update_cargo_import_export()
    {
        $cargoImportExport = CargoImportExport::factory()->create();
        $fakeCargoImportExport = CargoImportExport::factory()->make()->toArray();

        $updatedCargoImportExport = $this->cargoImportExportRepo->update($fakeCargoImportExport, $cargoImportExport->id);

        $this->assertModelData($fakeCargoImportExport, $updatedCargoImportExport->toArray());
        $dbCargoImportExport = $this->cargoImportExportRepo->find($cargoImportExport->id);
        $this->assertModelData($fakeCargoImportExport, $dbCargoImportExport->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cargo_import_export()
    {
        $cargoImportExport = CargoImportExport::factory()->create();

        $resp = $this->cargoImportExportRepo->delete($cargoImportExport->id);

        $this->assertTrue($resp);
        $this->assertNull(CargoImportExport::find($cargoImportExport->id), 'CargoImportExport should not exist in DB');
    }
}
