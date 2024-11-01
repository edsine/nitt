<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ShipContainerTraffic;

class ShipContainerTrafficApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ship_container_traffic()
    {
        $shipContainerTraffic = ShipContainerTraffic::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/ship_container_traffics', $shipContainerTraffic
        );

        $this->assertApiResponse($shipContainerTraffic);
    }

    /**
     * @test
     */
    public function test_read_ship_container_traffic()
    {
        $shipContainerTraffic = ShipContainerTraffic::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/ship_container_traffics/'.$shipContainerTraffic->id
        );

        $this->assertApiResponse($shipContainerTraffic->toArray());
    }

    /**
     * @test
     */
    public function test_update_ship_container_traffic()
    {
        $shipContainerTraffic = ShipContainerTraffic::factory()->create();
        $editedShipContainerTraffic = ShipContainerTraffic::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/ship_container_traffics/'.$shipContainerTraffic->id,
            $editedShipContainerTraffic
        );

        $this->assertApiResponse($editedShipContainerTraffic);
    }

    /**
     * @test
     */
    public function test_delete_ship_container_traffic()
    {
        $shipContainerTraffic = ShipContainerTraffic::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/ship_container_traffics/'.$shipContainerTraffic->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/ship_container_traffics/'.$shipContainerTraffic->id
        );

        $this->response->assertStatus(404);
    }
}
