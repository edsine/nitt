<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\VehicleImportation;

class VehicleImportationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_vehicle_importation()
    {
        $vehicleImportation = VehicleImportation::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/vehicle_importations', $vehicleImportation
        );

        $this->assertApiResponse($vehicleImportation);
    }

    /**
     * @test
     */
    public function test_read_vehicle_importation()
    {
        $vehicleImportation = VehicleImportation::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/vehicle_importations/'.$vehicleImportation->id
        );

        $this->assertApiResponse($vehicleImportation->toArray());
    }

    /**
     * @test
     */
    public function test_update_vehicle_importation()
    {
        $vehicleImportation = VehicleImportation::factory()->create();
        $editedVehicleImportation = VehicleImportation::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/vehicle_importations/'.$vehicleImportation->id,
            $editedVehicleImportation
        );

        $this->assertApiResponse($editedVehicleImportation);
    }

    /**
     * @test
     */
    public function test_delete_vehicle_importation()
    {
        $vehicleImportation = VehicleImportation::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/vehicle_importations/'.$vehicleImportation->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/vehicle_importations/'.$vehicleImportation->id
        );

        $this->response->assertStatus(404);
    }
}
