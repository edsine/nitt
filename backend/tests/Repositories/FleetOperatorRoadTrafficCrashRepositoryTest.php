<?php namespace Tests\Repositories;

use App\Models\FleetOperatorRoadTrafficCrash;
use App\Repositories\FleetOperatorRoadTrafficCrashRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FleetOperatorRoadTrafficCrashRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FleetOperatorRoadTrafficCrashRepository
     */
    protected $fleetOperatorRoadTrafficCrashRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->fleetOperatorRoadTrafficCrashRepo = \App::make(FleetOperatorRoadTrafficCrashRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_fleet_operator_road_traffic_crash()
    {
        $fleetOperatorRoadTrafficCrash = FleetOperatorRoadTrafficCrash::factory()->make()->toArray();

        $createdFleetOperatorRoadTrafficCrash = $this->fleetOperatorRoadTrafficCrashRepo->create($fleetOperatorRoadTrafficCrash);

        $createdFleetOperatorRoadTrafficCrash = $createdFleetOperatorRoadTrafficCrash->toArray();
        $this->assertArrayHasKey('id', $createdFleetOperatorRoadTrafficCrash);
        $this->assertNotNull($createdFleetOperatorRoadTrafficCrash['id'], 'Created FleetOperatorRoadTrafficCrash must have id specified');
        $this->assertNotNull(FleetOperatorRoadTrafficCrash::find($createdFleetOperatorRoadTrafficCrash['id']), 'FleetOperatorRoadTrafficCrash with given id must be in DB');
        $this->assertModelData($fleetOperatorRoadTrafficCrash, $createdFleetOperatorRoadTrafficCrash);
    }

    /**
     * @test read
     */
    public function test_read_fleet_operator_road_traffic_crash()
    {
        $fleetOperatorRoadTrafficCrash = FleetOperatorRoadTrafficCrash::factory()->create();

        $dbFleetOperatorRoadTrafficCrash = $this->fleetOperatorRoadTrafficCrashRepo->find($fleetOperatorRoadTrafficCrash->id);

        $dbFleetOperatorRoadTrafficCrash = $dbFleetOperatorRoadTrafficCrash->toArray();
        $this->assertModelData($fleetOperatorRoadTrafficCrash->toArray(), $dbFleetOperatorRoadTrafficCrash);
    }

    /**
     * @test update
     */
    public function test_update_fleet_operator_road_traffic_crash()
    {
        $fleetOperatorRoadTrafficCrash = FleetOperatorRoadTrafficCrash::factory()->create();
        $fakeFleetOperatorRoadTrafficCrash = FleetOperatorRoadTrafficCrash::factory()->make()->toArray();

        $updatedFleetOperatorRoadTrafficCrash = $this->fleetOperatorRoadTrafficCrashRepo->update($fakeFleetOperatorRoadTrafficCrash, $fleetOperatorRoadTrafficCrash->id);

        $this->assertModelData($fakeFleetOperatorRoadTrafficCrash, $updatedFleetOperatorRoadTrafficCrash->toArray());
        $dbFleetOperatorRoadTrafficCrash = $this->fleetOperatorRoadTrafficCrashRepo->find($fleetOperatorRoadTrafficCrash->id);
        $this->assertModelData($fakeFleetOperatorRoadTrafficCrash, $dbFleetOperatorRoadTrafficCrash->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_fleet_operator_road_traffic_crash()
    {
        $fleetOperatorRoadTrafficCrash = FleetOperatorRoadTrafficCrash::factory()->create();

        $resp = $this->fleetOperatorRoadTrafficCrashRepo->delete($fleetOperatorRoadTrafficCrash->id);

        $this->assertTrue($resp);
        $this->assertNull(FleetOperatorRoadTrafficCrash::find($fleetOperatorRoadTrafficCrash->id), 'FleetOperatorRoadTrafficCrash should not exist in DB');
    }
}
