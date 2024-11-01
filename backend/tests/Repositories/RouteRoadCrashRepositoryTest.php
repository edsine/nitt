<?php namespace Tests\Repositories;

use App\Models\RouteRoadCrash;
use App\Repositories\RouteRoadCrashRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RouteRoadCrashRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RouteRoadCrashRepository
     */
    protected $routeRoadCrashRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->routeRoadCrashRepo = \App::make(RouteRoadCrashRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_route_road_crash()
    {
        $routeRoadCrash = RouteRoadCrash::factory()->make()->toArray();

        $createdRouteRoadCrash = $this->routeRoadCrashRepo->create($routeRoadCrash);

        $createdRouteRoadCrash = $createdRouteRoadCrash->toArray();
        $this->assertArrayHasKey('id', $createdRouteRoadCrash);
        $this->assertNotNull($createdRouteRoadCrash['id'], 'Created RouteRoadCrash must have id specified');
        $this->assertNotNull(RouteRoadCrash::find($createdRouteRoadCrash['id']), 'RouteRoadCrash with given id must be in DB');
        $this->assertModelData($routeRoadCrash, $createdRouteRoadCrash);
    }

    /**
     * @test read
     */
    public function test_read_route_road_crash()
    {
        $routeRoadCrash = RouteRoadCrash::factory()->create();

        $dbRouteRoadCrash = $this->routeRoadCrashRepo->find($routeRoadCrash->id);

        $dbRouteRoadCrash = $dbRouteRoadCrash->toArray();
        $this->assertModelData($routeRoadCrash->toArray(), $dbRouteRoadCrash);
    }

    /**
     * @test update
     */
    public function test_update_route_road_crash()
    {
        $routeRoadCrash = RouteRoadCrash::factory()->create();
        $fakeRouteRoadCrash = RouteRoadCrash::factory()->make()->toArray();

        $updatedRouteRoadCrash = $this->routeRoadCrashRepo->update($fakeRouteRoadCrash, $routeRoadCrash->id);

        $this->assertModelData($fakeRouteRoadCrash, $updatedRouteRoadCrash->toArray());
        $dbRouteRoadCrash = $this->routeRoadCrashRepo->find($routeRoadCrash->id);
        $this->assertModelData($fakeRouteRoadCrash, $dbRouteRoadCrash->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_route_road_crash()
    {
        $routeRoadCrash = RouteRoadCrash::factory()->create();

        $resp = $this->routeRoadCrashRepo->delete($routeRoadCrash->id);

        $this->assertTrue($resp);
        $this->assertNull(RouteRoadCrash::find($routeRoadCrash->id), 'RouteRoadCrash should not exist in DB');
    }
}
