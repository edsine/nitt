<?php namespace Tests\Repositories;

use App\Models\VehicleLicenseRegistration;
use App\Repositories\VehicleLicenseRegistrationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VehicleLicenseRegistrationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VehicleLicenseRegistrationRepository
     */
    protected $vehicleLicenseRegistrationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->vehicleLicenseRegistrationRepo = \App::make(VehicleLicenseRegistrationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_vehicle_license_registration()
    {
        $vehicleLicenseRegistration = VehicleLicenseRegistration::factory()->make()->toArray();

        $createdVehicleLicenseRegistration = $this->vehicleLicenseRegistrationRepo->create($vehicleLicenseRegistration);

        $createdVehicleLicenseRegistration = $createdVehicleLicenseRegistration->toArray();
        $this->assertArrayHasKey('id', $createdVehicleLicenseRegistration);
        $this->assertNotNull($createdVehicleLicenseRegistration['id'], 'Created VehicleLicenseRegistration must have id specified');
        $this->assertNotNull(VehicleLicenseRegistration::find($createdVehicleLicenseRegistration['id']), 'VehicleLicenseRegistration with given id must be in DB');
        $this->assertModelData($vehicleLicenseRegistration, $createdVehicleLicenseRegistration);
    }

    /**
     * @test read
     */
    public function test_read_vehicle_license_registration()
    {
        $vehicleLicenseRegistration = VehicleLicenseRegistration::factory()->create();

        $dbVehicleLicenseRegistration = $this->vehicleLicenseRegistrationRepo->find($vehicleLicenseRegistration->id);

        $dbVehicleLicenseRegistration = $dbVehicleLicenseRegistration->toArray();
        $this->assertModelData($vehicleLicenseRegistration->toArray(), $dbVehicleLicenseRegistration);
    }

    /**
     * @test update
     */
    public function test_update_vehicle_license_registration()
    {
        $vehicleLicenseRegistration = VehicleLicenseRegistration::factory()->create();
        $fakeVehicleLicenseRegistration = VehicleLicenseRegistration::factory()->make()->toArray();

        $updatedVehicleLicenseRegistration = $this->vehicleLicenseRegistrationRepo->update($fakeVehicleLicenseRegistration, $vehicleLicenseRegistration->id);

        $this->assertModelData($fakeVehicleLicenseRegistration, $updatedVehicleLicenseRegistration->toArray());
        $dbVehicleLicenseRegistration = $this->vehicleLicenseRegistrationRepo->find($vehicleLicenseRegistration->id);
        $this->assertModelData($fakeVehicleLicenseRegistration, $dbVehicleLicenseRegistration->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_vehicle_license_registration()
    {
        $vehicleLicenseRegistration = VehicleLicenseRegistration::factory()->create();

        $resp = $this->vehicleLicenseRegistrationRepo->delete($vehicleLicenseRegistration->id);

        $this->assertTrue($resp);
        $this->assertNull(VehicleLicenseRegistration::find($vehicleLicenseRegistration->id), 'VehicleLicenseRegistration should not exist in DB');
    }
}
