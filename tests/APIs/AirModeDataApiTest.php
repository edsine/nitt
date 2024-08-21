<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\AirModeData;

class AirModeDataApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_air_mode_data()
    {
        $airModeData = AirModeData::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/air_mode_datas', $airModeData
        );

        $this->assertApiResponse($airModeData);
    }

    /**
     * @test
     */
    public function test_read_air_mode_data()
    {
        $airModeData = AirModeData::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/air_mode_datas/'.$airModeData->id
        );

        $this->assertApiResponse($airModeData->toArray());
    }

    /**
     * @test
     */
    public function test_update_air_mode_data()
    {
        $airModeData = AirModeData::factory()->create();
        $editedAirModeData = AirModeData::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/air_mode_datas/'.$airModeData->id,
            $editedAirModeData
        );

        $this->assertApiResponse($editedAirModeData);
    }

    /**
     * @test
     */
    public function test_delete_air_mode_data()
    {
        $airModeData = AirModeData::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/air_mode_datas/'.$airModeData->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/air_mode_datas/'.$airModeData->id
        );

        $this->response->assertStatus(404);
    }
}
