<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\FleetAccident;

class FleetAccidentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_fleet_accident()
    {
        $fleetAccident = FleetAccident::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/fleet_accidents', $fleetAccident
        );

        $this->assertApiResponse($fleetAccident);
    }

    /**
     * @test
     */
    public function test_read_fleet_accident()
    {
        $fleetAccident = FleetAccident::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/fleet_accidents/'.$fleetAccident->id
        );

        $this->assertApiResponse($fleetAccident->toArray());
    }

    /**
     * @test
     */
    public function test_update_fleet_accident()
    {
        $fleetAccident = FleetAccident::factory()->create();
        $editedFleetAccident = FleetAccident::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/fleet_accidents/'.$fleetAccident->id,
            $editedFleetAccident
        );

        $this->assertApiResponse($editedFleetAccident);
    }

    /**
     * @test
     */
    public function test_delete_fleet_accident()
    {
        $fleetAccident = FleetAccident::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/fleet_accidents/'.$fleetAccident->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/fleet_accidents/'.$fleetAccident->id
        );

        $this->response->assertStatus(404);
    }
}
