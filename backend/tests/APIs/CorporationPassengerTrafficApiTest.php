<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CorporationPassengerTraffic;

class CorporationPassengerTrafficApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_corporation_passenger_traffic()
    {
        $corporationPassengerTraffic = CorporationPassengerTraffic::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/corporation_passenger_traffics', $corporationPassengerTraffic
        );

        $this->assertApiResponse($corporationPassengerTraffic);
    }

    /**
     * @test
     */
    public function test_read_corporation_passenger_traffic()
    {
        $corporationPassengerTraffic = CorporationPassengerTraffic::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/corporation_passenger_traffics/'.$corporationPassengerTraffic->id
        );

        $this->assertApiResponse($corporationPassengerTraffic->toArray());
    }

    /**
     * @test
     */
    public function test_update_corporation_passenger_traffic()
    {
        $corporationPassengerTraffic = CorporationPassengerTraffic::factory()->create();
        $editedCorporationPassengerTraffic = CorporationPassengerTraffic::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/corporation_passenger_traffics/'.$corporationPassengerTraffic->id,
            $editedCorporationPassengerTraffic
        );

        $this->assertApiResponse($editedCorporationPassengerTraffic);
    }

    /**
     * @test
     */
    public function test_delete_corporation_passenger_traffic()
    {
        $corporationPassengerTraffic = CorporationPassengerTraffic::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/corporation_passenger_traffics/'.$corporationPassengerTraffic->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/corporation_passenger_traffics/'.$corporationPassengerTraffic->id
        );

        $this->response->assertStatus(404);
    }
}
