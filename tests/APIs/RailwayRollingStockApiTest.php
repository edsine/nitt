<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\RailwayRollingStock;

class RailwayRollingStockApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_railway_rolling_stock()
    {
        $railwayRollingStock = RailwayRollingStock::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/railway_rolling_stocks', $railwayRollingStock
        );

        $this->assertApiResponse($railwayRollingStock);
    }

    /**
     * @test
     */
    public function test_read_railway_rolling_stock()
    {
        $railwayRollingStock = RailwayRollingStock::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/railway_rolling_stocks/'.$railwayRollingStock->id
        );

        $this->assertApiResponse($railwayRollingStock->toArray());
    }

    /**
     * @test
     */
    public function test_update_railway_rolling_stock()
    {
        $railwayRollingStock = RailwayRollingStock::factory()->create();
        $editedRailwayRollingStock = RailwayRollingStock::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/railway_rolling_stocks/'.$railwayRollingStock->id,
            $editedRailwayRollingStock
        );

        $this->assertApiResponse($editedRailwayRollingStock);
    }

    /**
     * @test
     */
    public function test_delete_railway_rolling_stock()
    {
        $railwayRollingStock = RailwayRollingStock::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/railway_rolling_stocks/'.$railwayRollingStock->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/railway_rolling_stocks/'.$railwayRollingStock->id
        );

        $this->response->assertStatus(404);
    }
}
