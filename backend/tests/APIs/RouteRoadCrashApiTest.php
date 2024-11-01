<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\RouteRoadCrash;

class RouteRoadCrashApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_route_road_crash()
    {
        $routeRoadCrash = RouteRoadCrash::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/route_road_crashes', $routeRoadCrash
        );

        $this->assertApiResponse($routeRoadCrash);
    }

    /**
     * @test
     */
    public function test_read_route_road_crash()
    {
        $routeRoadCrash = RouteRoadCrash::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/route_road_crashes/'.$routeRoadCrash->id
        );

        $this->assertApiResponse($routeRoadCrash->toArray());
    }

    /**
     * @test
     */
    public function test_update_route_road_crash()
    {
        $routeRoadCrash = RouteRoadCrash::factory()->create();
        $editedRouteRoadCrash = RouteRoadCrash::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/route_road_crashes/'.$routeRoadCrash->id,
            $editedRouteRoadCrash
        );

        $this->assertApiResponse($editedRouteRoadCrash);
    }

    /**
     * @test
     */
    public function test_delete_route_road_crash()
    {
        $routeRoadCrash = RouteRoadCrash::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/route_road_crashes/'.$routeRoadCrash->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/route_road_crashes/'.$routeRoadCrash->id
        );

        $this->response->assertStatus(404);
    }
}
