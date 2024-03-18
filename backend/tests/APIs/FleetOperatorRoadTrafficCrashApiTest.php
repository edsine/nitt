<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\FleetOperatorRoadTrafficCrash;

class FleetOperatorRoadTrafficCrashApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_fleet_operator_road_traffic_crash()
    {
        $fleetOperatorRoadTrafficCrash = FleetOperatorRoadTrafficCrash::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/fleet_operator_road_traffic_crashes', $fleetOperatorRoadTrafficCrash
        );

        $this->assertApiResponse($fleetOperatorRoadTrafficCrash);
    }

    /**
     * @test
     */
    public function test_read_fleet_operator_road_traffic_crash()
    {
        $fleetOperatorRoadTrafficCrash = FleetOperatorRoadTrafficCrash::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/fleet_operator_road_traffic_crashes/'.$fleetOperatorRoadTrafficCrash->id
        );

        $this->assertApiResponse($fleetOperatorRoadTrafficCrash->toArray());
    }

    /**
     * @test
     */
    public function test_update_fleet_operator_road_traffic_crash()
    {
        $fleetOperatorRoadTrafficCrash = FleetOperatorRoadTrafficCrash::factory()->create();
        $editedFleetOperatorRoadTrafficCrash = FleetOperatorRoadTrafficCrash::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/fleet_operator_road_traffic_crashes/'.$fleetOperatorRoadTrafficCrash->id,
            $editedFleetOperatorRoadTrafficCrash
        );

        $this->assertApiResponse($editedFleetOperatorRoadTrafficCrash);
    }

    /**
     * @test
     */
    public function test_delete_fleet_operator_road_traffic_crash()
    {
        $fleetOperatorRoadTrafficCrash = FleetOperatorRoadTrafficCrash::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/fleet_operator_road_traffic_crashes/'.$fleetOperatorRoadTrafficCrash->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/fleet_operator_road_traffic_crashes/'.$fleetOperatorRoadTrafficCrash->id
        );

        $this->response->assertStatus(404);
    }
}
