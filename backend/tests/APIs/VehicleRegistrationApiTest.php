<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\VehicleRegistration;

class VehicleRegistrationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_vehicle_registration()
    {
        $vehicleRegistration = VehicleRegistration::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/vehicle_registrations', $vehicleRegistration
        );

        $this->assertApiResponse($vehicleRegistration);
    }

    /**
     * @test
     */
    public function test_read_vehicle_registration()
    {
        $vehicleRegistration = VehicleRegistration::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/vehicle_registrations/'.$vehicleRegistration->id
        );

        $this->assertApiResponse($vehicleRegistration->toArray());
    }

    /**
     * @test
     */
    public function test_update_vehicle_registration()
    {
        $vehicleRegistration = VehicleRegistration::factory()->create();
        $editedVehicleRegistration = VehicleRegistration::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/vehicle_registrations/'.$vehicleRegistration->id,
            $editedVehicleRegistration
        );

        $this->assertApiResponse($editedVehicleRegistration);
    }

    /**
     * @test
     */
    public function test_delete_vehicle_registration()
    {
        $vehicleRegistration = VehicleRegistration::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/vehicle_registrations/'.$vehicleRegistration->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/vehicle_registrations/'.$vehicleRegistration->id
        );

        $this->response->assertStatus(404);
    }
}
