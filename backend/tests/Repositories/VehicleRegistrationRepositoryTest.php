<?php namespace Tests\Repositories;

use App\Models\VehicleRegistration;
use App\Repositories\VehicleRegistrationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VehicleRegistrationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VehicleRegistrationRepository
     */
    protected $vehicleRegistrationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->vehicleRegistrationRepo = \App::make(VehicleRegistrationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_vehicle_registration()
    {
        $vehicleRegistration = VehicleRegistration::factory()->make()->toArray();

        $createdVehicleRegistration = $this->vehicleRegistrationRepo->create($vehicleRegistration);

        $createdVehicleRegistration = $createdVehicleRegistration->toArray();
        $this->assertArrayHasKey('id', $createdVehicleRegistration);
        $this->assertNotNull($createdVehicleRegistration['id'], 'Created VehicleRegistration must have id specified');
        $this->assertNotNull(VehicleRegistration::find($createdVehicleRegistration['id']), 'VehicleRegistration with given id must be in DB');
        $this->assertModelData($vehicleRegistration, $createdVehicleRegistration);
    }

    /**
     * @test read
     */
    public function test_read_vehicle_registration()
    {
        $vehicleRegistration = VehicleRegistration::factory()->create();

        $dbVehicleRegistration = $this->vehicleRegistrationRepo->find($vehicleRegistration->id);

        $dbVehicleRegistration = $dbVehicleRegistration->toArray();
        $this->assertModelData($vehicleRegistration->toArray(), $dbVehicleRegistration);
    }

    /**
     * @test update
     */
    public function test_update_vehicle_registration()
    {
        $vehicleRegistration = VehicleRegistration::factory()->create();
        $fakeVehicleRegistration = VehicleRegistration::factory()->make()->toArray();

        $updatedVehicleRegistration = $this->vehicleRegistrationRepo->update($fakeVehicleRegistration, $vehicleRegistration->id);

        $this->assertModelData($fakeVehicleRegistration, $updatedVehicleRegistration->toArray());
        $dbVehicleRegistration = $this->vehicleRegistrationRepo->find($vehicleRegistration->id);
        $this->assertModelData($fakeVehicleRegistration, $dbVehicleRegistration->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_vehicle_registration()
    {
        $vehicleRegistration = VehicleRegistration::factory()->create();

        $resp = $this->vehicleRegistrationRepo->delete($vehicleRegistration->id);

        $this->assertTrue($resp);
        $this->assertNull(VehicleRegistration::find($vehicleRegistration->id), 'VehicleRegistration should not exist in DB');
    }
}
