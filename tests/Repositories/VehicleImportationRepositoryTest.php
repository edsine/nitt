<?php namespace Tests\Repositories;

use App\Models\VehicleImportation;
use App\Repositories\VehicleImportationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VehicleImportationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VehicleImportationRepository
     */
    protected $vehicleImportationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->vehicleImportationRepo = \App::make(VehicleImportationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_vehicle_importation()
    {
        $vehicleImportation = VehicleImportation::factory()->make()->toArray();

        $createdVehicleImportation = $this->vehicleImportationRepo->create($vehicleImportation);

        $createdVehicleImportation = $createdVehicleImportation->toArray();
        $this->assertArrayHasKey('id', $createdVehicleImportation);
        $this->assertNotNull($createdVehicleImportation['id'], 'Created VehicleImportation must have id specified');
        $this->assertNotNull(VehicleImportation::find($createdVehicleImportation['id']), 'VehicleImportation with given id must be in DB');
        $this->assertModelData($vehicleImportation, $createdVehicleImportation);
    }

    /**
     * @test read
     */
    public function test_read_vehicle_importation()
    {
        $vehicleImportation = VehicleImportation::factory()->create();

        $dbVehicleImportation = $this->vehicleImportationRepo->find($vehicleImportation->id);

        $dbVehicleImportation = $dbVehicleImportation->toArray();
        $this->assertModelData($vehicleImportation->toArray(), $dbVehicleImportation);
    }

    /**
     * @test update
     */
    public function test_update_vehicle_importation()
    {
        $vehicleImportation = VehicleImportation::factory()->create();
        $fakeVehicleImportation = VehicleImportation::factory()->make()->toArray();

        $updatedVehicleImportation = $this->vehicleImportationRepo->update($fakeVehicleImportation, $vehicleImportation->id);

        $this->assertModelData($fakeVehicleImportation, $updatedVehicleImportation->toArray());
        $dbVehicleImportation = $this->vehicleImportationRepo->find($vehicleImportation->id);
        $this->assertModelData($fakeVehicleImportation, $dbVehicleImportation->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_vehicle_importation()
    {
        $vehicleImportation = VehicleImportation::factory()->create();

        $resp = $this->vehicleImportationRepo->delete($vehicleImportation->id);

        $this->assertTrue($resp);
        $this->assertNull(VehicleImportation::find($vehicleImportation->id), 'VehicleImportation should not exist in DB');
    }
}
