<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\AirTransportData;

class AirTransportDataApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_air_transport_data()
    {
        $airTransportData = AirTransportData::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/air_transport_datas', $airTransportData
        );

        $this->assertApiResponse($airTransportData);
    }

    /**
     * @test
     */
    public function test_read_air_transport_data()
    {
        $airTransportData = AirTransportData::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/air_transport_datas/'.$airTransportData->id
        );

        $this->assertApiResponse($airTransportData->toArray());
    }

    /**
     * @test
     */
    public function test_update_air_transport_data()
    {
        $airTransportData = AirTransportData::factory()->create();
        $editedAirTransportData = AirTransportData::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/air_transport_datas/'.$airTransportData->id,
            $editedAirTransportData
        );

        $this->assertApiResponse($editedAirTransportData);
    }

    /**
     * @test
     */
    public function test_delete_air_transport_data()
    {
        $airTransportData = AirTransportData::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/air_transport_datas/'.$airTransportData->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/air_transport_datas/'.$airTransportData->id
        );

        $this->response->assertStatus(404);
    }
}
