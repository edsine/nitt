<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\AirPassengersTraffic;

class AirPassengersTrafficApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_air_passengers_traffic()
    {
        $airPassengersTraffic = AirPassengersTraffic::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/air_passengers_traffics', $airPassengersTraffic
        );

        $this->assertApiResponse($airPassengersTraffic);
    }

    /**
     * @test
     */
    public function test_read_air_passengers_traffic()
    {
        $airPassengersTraffic = AirPassengersTraffic::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/air_passengers_traffics/'.$airPassengersTraffic->id
        );

        $this->assertApiResponse($airPassengersTraffic->toArray());
    }

    /**
     * @test
     */
    public function test_update_air_passengers_traffic()
    {
        $airPassengersTraffic = AirPassengersTraffic::factory()->create();
        $editedAirPassengersTraffic = AirPassengersTraffic::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/air_passengers_traffics/'.$airPassengersTraffic->id,
            $editedAirPassengersTraffic
        );

        $this->assertApiResponse($editedAirPassengersTraffic);
    }

    /**
     * @test
     */
    public function test_delete_air_passengers_traffic()
    {
        $airPassengersTraffic = AirPassengersTraffic::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/air_passengers_traffics/'.$airPassengersTraffic->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/air_passengers_traffics/'.$airPassengersTraffic->id
        );

        $this->response->assertStatus(404);
    }
}
