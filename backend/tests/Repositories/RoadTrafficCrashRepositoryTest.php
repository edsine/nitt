<?php namespace Tests\Repositories;

use App\Models\RoadTrafficCrash;
use App\Repositories\RoadTrafficCrashRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RoadTrafficCrashRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RoadTrafficCrashRepository
     */
    protected $roadTrafficCrashRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->roadTrafficCrashRepo = \App::make(RoadTrafficCrashRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_road_traffic_crash()
    {
        $roadTrafficCrash = RoadTrafficCrash::factory()->make()->toArray();

        $createdRoadTrafficCrash = $this->roadTrafficCrashRepo->create($roadTrafficCrash);

        $createdRoadTrafficCrash = $createdRoadTrafficCrash->toArray();
        $this->assertArrayHasKey('id', $createdRoadTrafficCrash);
        $this->assertNotNull($createdRoadTrafficCrash['id'], 'Created RoadTrafficCrash must have id specified');
        $this->assertNotNull(RoadTrafficCrash::find($createdRoadTrafficCrash['id']), 'RoadTrafficCrash with given id must be in DB');
        $this->assertModelData($roadTrafficCrash, $createdRoadTrafficCrash);
    }

    /**
     * @test read
     */
    public function test_read_road_traffic_crash()
    {
        $roadTrafficCrash = RoadTrafficCrash::factory()->create();

        $dbRoadTrafficCrash = $this->roadTrafficCrashRepo->find($roadTrafficCrash->id);

        $dbRoadTrafficCrash = $dbRoadTrafficCrash->toArray();
        $this->assertModelData($roadTrafficCrash->toArray(), $dbRoadTrafficCrash);
    }

    /**
     * @test update
     */
    public function test_update_road_traffic_crash()
    {
        $roadTrafficCrash = RoadTrafficCrash::factory()->create();
        $fakeRoadTrafficCrash = RoadTrafficCrash::factory()->make()->toArray();

        $updatedRoadTrafficCrash = $this->roadTrafficCrashRepo->update($fakeRoadTrafficCrash, $roadTrafficCrash->id);

        $this->assertModelData($fakeRoadTrafficCrash, $updatedRoadTrafficCrash->toArray());
        $dbRoadTrafficCrash = $this->roadTrafficCrashRepo->find($roadTrafficCrash->id);
        $this->assertModelData($fakeRoadTrafficCrash, $dbRoadTrafficCrash->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_road_traffic_crash()
    {
        $roadTrafficCrash = RoadTrafficCrash::factory()->create();

        $resp = $this->roadTrafficCrashRepo->delete($roadTrafficCrash->id);

        $this->assertTrue($resp);
        $this->assertNull(RoadTrafficCrash::find($roadTrafficCrash->id), 'RoadTrafficCrash should not exist in DB');
    }
}
