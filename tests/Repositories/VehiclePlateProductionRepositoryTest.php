<?php namespace Tests\Repositories;

use App\Models\VehiclePlateProduction;
use App\Repositories\VehiclePlateProductionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VehiclePlateProductionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VehiclePlateProductionRepository
     */
    protected $vehiclePlateProductionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->vehiclePlateProductionRepo = \App::make(VehiclePlateProductionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_vehicle_plate_production()
    {
        $vehiclePlateProduction = VehiclePlateProduction::factory()->make()->toArray();

        $createdVehiclePlateProduction = $this->vehiclePlateProductionRepo->create($vehiclePlateProduction);

        $createdVehiclePlateProduction = $createdVehiclePlateProduction->toArray();
        $this->assertArrayHasKey('id', $createdVehiclePlateProduction);
        $this->assertNotNull($createdVehiclePlateProduction['id'], 'Created VehiclePlateProduction must have id specified');
        $this->assertNotNull(VehiclePlateProduction::find($createdVehiclePlateProduction['id']), 'VehiclePlateProduction with given id must be in DB');
        $this->assertModelData($vehiclePlateProduction, $createdVehiclePlateProduction);
    }

    /**
     * @test read
     */
    public function test_read_vehicle_plate_production()
    {
        $vehiclePlateProduction = VehiclePlateProduction::factory()->create();

        $dbVehiclePlateProduction = $this->vehiclePlateProductionRepo->find($vehiclePlateProduction->id);

        $dbVehiclePlateProduction = $dbVehiclePlateProduction->toArray();
        $this->assertModelData($vehiclePlateProduction->toArray(), $dbVehiclePlateProduction);
    }

    /**
     * @test update
     */
    public function test_update_vehicle_plate_production()
    {
        $vehiclePlateProduction = VehiclePlateProduction::factory()->create();
        $fakeVehiclePlateProduction = VehiclePlateProduction::factory()->make()->toArray();

        $updatedVehiclePlateProduction = $this->vehiclePlateProductionRepo->update($fakeVehiclePlateProduction, $vehiclePlateProduction->id);

        $this->assertModelData($fakeVehiclePlateProduction, $updatedVehiclePlateProduction->toArray());
        $dbVehiclePlateProduction = $this->vehiclePlateProductionRepo->find($vehiclePlateProduction->id);
        $this->assertModelData($fakeVehiclePlateProduction, $dbVehiclePlateProduction->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_vehicle_plate_production()
    {
        $vehiclePlateProduction = VehiclePlateProduction::factory()->create();

        $resp = $this->vehiclePlateProductionRepo->delete($vehiclePlateProduction->id);

        $this->assertTrue($resp);
        $this->assertNull(VehiclePlateProduction::find($vehiclePlateProduction->id), 'VehiclePlateProduction should not exist in DB');
    }
}
