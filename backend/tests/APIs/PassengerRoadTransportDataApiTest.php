<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PassengerRoadTransportData;

class PassengerRoadTransportDataApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_passenger_road_transport_data()
    {
        $passengerRoadTransportData = PassengerRoadTransportData::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/passenger_road_transport_datas', $passengerRoadTransportData
        );

        $this->assertApiResponse($passengerRoadTransportData);
    }

    /**
     * @test
     */
    public function test_read_passenger_road_transport_data()
    {
        $passengerRoadTransportData = PassengerRoadTransportData::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/passenger_road_transport_datas/'.$passengerRoadTransportData->id
        );

        $this->assertApiResponse($passengerRoadTransportData->toArray());
    }

    /**
     * @test
     */
    public function test_update_passenger_road_transport_data()
    {
        $passengerRoadTransportData = PassengerRoadTransportData::factory()->create();
        $editedPassengerRoadTransportData = PassengerRoadTransportData::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/passenger_road_transport_datas/'.$passengerRoadTransportData->id,
            $editedPassengerRoadTransportData
        );

        $this->assertApiResponse($editedPassengerRoadTransportData);
    }

    /**
     * @test
     */
    public function test_delete_passenger_road_transport_data()
    {
        $passengerRoadTransportData = PassengerRoadTransportData::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/passenger_road_transport_datas/'.$passengerRoadTransportData->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/passenger_road_transport_datas/'.$passengerRoadTransportData->id
        );

        $this->response->assertStatus(404);
    }
}
