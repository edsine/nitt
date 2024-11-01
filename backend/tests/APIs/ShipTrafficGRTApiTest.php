<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ShipTrafficGRT;

class ShipTrafficGRTApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ship_traffic_g_r_t()
    {
        $shipTrafficGRT = ShipTrafficGRT::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/ship_traffic_g_r_ts', $shipTrafficGRT
        );

        $this->assertApiResponse($shipTrafficGRT);
    }

    /**
     * @test
     */
    public function test_read_ship_traffic_g_r_t()
    {
        $shipTrafficGRT = ShipTrafficGRT::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/ship_traffic_g_r_ts/'.$shipTrafficGRT->id
        );

        $this->assertApiResponse($shipTrafficGRT->toArray());
    }

    /**
     * @test
     */
    public function test_update_ship_traffic_g_r_t()
    {
        $shipTrafficGRT = ShipTrafficGRT::factory()->create();
        $editedShipTrafficGRT = ShipTrafficGRT::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/ship_traffic_g_r_ts/'.$shipTrafficGRT->id,
            $editedShipTrafficGRT
        );

        $this->assertApiResponse($editedShipTrafficGRT);
    }

    /**
     * @test
     */
    public function test_delete_ship_traffic_g_r_t()
    {
        $shipTrafficGRT = ShipTrafficGRT::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/ship_traffic_g_r_ts/'.$shipTrafficGRT->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/ship_traffic_g_r_ts/'.$shipTrafficGRT->id
        );

        $this->response->assertStatus(404);
    }
}
