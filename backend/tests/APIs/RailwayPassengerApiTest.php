<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\RailwayPassenger;

class RailwayPassengerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_railway_passenger()
    {
        $railwayPassenger = RailwayPassenger::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/railway_passengers', $railwayPassenger
        );

        $this->assertApiResponse($railwayPassenger);
    }

    /**
     * @test
     */
    public function test_read_railway_passenger()
    {
        $railwayPassenger = RailwayPassenger::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/railway_passengers/'.$railwayPassenger->id
        );

        $this->assertApiResponse($railwayPassenger->toArray());
    }

    /**
     * @test
     */
    public function test_update_railway_passenger()
    {
        $railwayPassenger = RailwayPassenger::factory()->create();
        $editedRailwayPassenger = RailwayPassenger::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/railway_passengers/'.$railwayPassenger->id,
            $editedRailwayPassenger
        );

        $this->assertApiResponse($editedRailwayPassenger);
    }

    /**
     * @test
     */
    public function test_delete_railway_passenger()
    {
        $railwayPassenger = RailwayPassenger::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/railway_passengers/'.$railwayPassenger->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/railway_passengers/'.$railwayPassenger->id
        );

        $this->response->assertStatus(404);
    }
}
