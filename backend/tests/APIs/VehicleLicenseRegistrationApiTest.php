<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\VehicleLicenseRegistration;

class VehicleLicenseRegistrationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_vehicle_license_registration()
    {
        $vehicleLicenseRegistration = VehicleLicenseRegistration::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/vehicle_license_registrations', $vehicleLicenseRegistration
        );

        $this->assertApiResponse($vehicleLicenseRegistration);
    }

    /**
     * @test
     */
    public function test_read_vehicle_license_registration()
    {
        $vehicleLicenseRegistration = VehicleLicenseRegistration::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/vehicle_license_registrations/'.$vehicleLicenseRegistration->id
        );

        $this->assertApiResponse($vehicleLicenseRegistration->toArray());
    }

    /**
     * @test
     */
    public function test_update_vehicle_license_registration()
    {
        $vehicleLicenseRegistration = VehicleLicenseRegistration::factory()->create();
        $editedVehicleLicenseRegistration = VehicleLicenseRegistration::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/vehicle_license_registrations/'.$vehicleLicenseRegistration->id,
            $editedVehicleLicenseRegistration
        );

        $this->assertApiResponse($editedVehicleLicenseRegistration);
    }

    /**
     * @test
     */
    public function test_delete_vehicle_license_registration()
    {
        $vehicleLicenseRegistration = VehicleLicenseRegistration::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/vehicle_license_registrations/'.$vehicleLicenseRegistration->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/vehicle_license_registrations/'.$vehicleLicenseRegistration->id
        );

        $this->response->assertStatus(404);
    }
}
