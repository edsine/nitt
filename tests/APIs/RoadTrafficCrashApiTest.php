<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\RoadTrafficCrash;

class RoadTrafficCrashApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_road_traffic_crash()
    {
        $roadTrafficCrash = RoadTrafficCrash::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/road_traffic_crashes', $roadTrafficCrash
        );

        $this->assertApiResponse($roadTrafficCrash);
    }

    /**
     * @test
     */
    public function test_read_road_traffic_crash()
    {
        $roadTrafficCrash = RoadTrafficCrash::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/road_traffic_crashes/'.$roadTrafficCrash->id
        );

        $this->assertApiResponse($roadTrafficCrash->toArray());
    }

    /**
     * @test
     */
    public function test_update_road_traffic_crash()
    {
        $roadTrafficCrash = RoadTrafficCrash::factory()->create();
        $editedRoadTrafficCrash = RoadTrafficCrash::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/road_traffic_crashes/'.$roadTrafficCrash->id,
            $editedRoadTrafficCrash
        );

        $this->assertApiResponse($editedRoadTrafficCrash);
    }

    /**
     * @test
     */
    public function test_delete_road_traffic_crash()
    {
        $roadTrafficCrash = RoadTrafficCrash::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/road_traffic_crashes/'.$roadTrafficCrash->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/road_traffic_crashes/'.$roadTrafficCrash->id
        );

        $this->response->assertStatus(404);
    }
}
