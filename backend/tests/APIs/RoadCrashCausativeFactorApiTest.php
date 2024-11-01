<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\RoadCrashCausativeFactor;

class RoadCrashCausativeFactorApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_road_crash_causative_factor()
    {
        $roadCrashCausativeFactor = RoadCrashCausativeFactor::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/road_crash_causative_factors', $roadCrashCausativeFactor
        );

        $this->assertApiResponse($roadCrashCausativeFactor);
    }

    /**
     * @test
     */
    public function test_read_road_crash_causative_factor()
    {
        $roadCrashCausativeFactor = RoadCrashCausativeFactor::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/road_crash_causative_factors/'.$roadCrashCausativeFactor->id
        );

        $this->assertApiResponse($roadCrashCausativeFactor->toArray());
    }

    /**
     * @test
     */
    public function test_update_road_crash_causative_factor()
    {
        $roadCrashCausativeFactor = RoadCrashCausativeFactor::factory()->create();
        $editedRoadCrashCausativeFactor = RoadCrashCausativeFactor::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/road_crash_causative_factors/'.$roadCrashCausativeFactor->id,
            $editedRoadCrashCausativeFactor
        );

        $this->assertApiResponse($editedRoadCrashCausativeFactor);
    }

    /**
     * @test
     */
    public function test_delete_road_crash_causative_factor()
    {
        $roadCrashCausativeFactor = RoadCrashCausativeFactor::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/road_crash_causative_factors/'.$roadCrashCausativeFactor->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/road_crash_causative_factors/'.$roadCrashCausativeFactor->id
        );

        $this->response->assertStatus(404);
    }
}
