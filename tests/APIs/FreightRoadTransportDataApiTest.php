<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\FreightRoadTransportData;

class FreightRoadTransportDataApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_freight_road_transport_data()
    {
        $freightRoadTransportData = FreightRoadTransportData::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/freight_road_transport_datas', $freightRoadTransportData
        );

        $this->assertApiResponse($freightRoadTransportData);
    }

    /**
     * @test
     */
    public function test_read_freight_road_transport_data()
    {
        $freightRoadTransportData = FreightRoadTransportData::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/freight_road_transport_datas/'.$freightRoadTransportData->id
        );

        $this->assertApiResponse($freightRoadTransportData->toArray());
    }

    /**
     * @test
     */
    public function test_update_freight_road_transport_data()
    {
        $freightRoadTransportData = FreightRoadTransportData::factory()->create();
        $editedFreightRoadTransportData = FreightRoadTransportData::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/freight_road_transport_datas/'.$freightRoadTransportData->id,
            $editedFreightRoadTransportData
        );

        $this->assertApiResponse($editedFreightRoadTransportData);
    }

    /**
     * @test
     */
    public function test_delete_freight_road_transport_data()
    {
        $freightRoadTransportData = FreightRoadTransportData::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/freight_road_transport_datas/'.$freightRoadTransportData->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/freight_road_transport_datas/'.$freightRoadTransportData->id
        );

        $this->response->assertStatus(404);
    }
}
