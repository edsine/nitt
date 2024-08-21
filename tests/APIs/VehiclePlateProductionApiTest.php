<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\VehiclePlateProduction;

class VehiclePlateProductionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_vehicle_plate_production()
    {
        $vehiclePlateProduction = VehiclePlateProduction::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/vehicle_plate_productions', $vehiclePlateProduction
        );

        $this->assertApiResponse($vehiclePlateProduction);
    }

    /**
     * @test
     */
    public function test_read_vehicle_plate_production()
    {
        $vehiclePlateProduction = VehiclePlateProduction::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/vehicle_plate_productions/'.$vehiclePlateProduction->id
        );

        $this->assertApiResponse($vehiclePlateProduction->toArray());
    }

    /**
     * @test
     */
    public function test_update_vehicle_plate_production()
    {
        $vehiclePlateProduction = VehiclePlateProduction::factory()->create();
        $editedVehiclePlateProduction = VehiclePlateProduction::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/vehicle_plate_productions/'.$vehiclePlateProduction->id,
            $editedVehiclePlateProduction
        );

        $this->assertApiResponse($editedVehiclePlateProduction);
    }

    /**
     * @test
     */
    public function test_delete_vehicle_plate_production()
    {
        $vehiclePlateProduction = VehiclePlateProduction::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/vehicle_plate_productions/'.$vehiclePlateProduction->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/vehicle_plate_productions/'.$vehiclePlateProduction->id
        );

        $this->response->assertStatus(404);
    }
}
