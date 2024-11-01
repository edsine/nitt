<?php namespace Tests\Repositories;

use App\Models\RoadCrashCausativeFactor;
use App\Repositories\RoadCrashCausativeFactorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RoadCrashCausativeFactorRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RoadCrashCausativeFactorRepository
     */
    protected $roadCrashCausativeFactorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->roadCrashCausativeFactorRepo = \App::make(RoadCrashCausativeFactorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_road_crash_causative_factor()
    {
        $roadCrashCausativeFactor = RoadCrashCausativeFactor::factory()->make()->toArray();

        $createdRoadCrashCausativeFactor = $this->roadCrashCausativeFactorRepo->create($roadCrashCausativeFactor);

        $createdRoadCrashCausativeFactor = $createdRoadCrashCausativeFactor->toArray();
        $this->assertArrayHasKey('id', $createdRoadCrashCausativeFactor);
        $this->assertNotNull($createdRoadCrashCausativeFactor['id'], 'Created RoadCrashCausativeFactor must have id specified');
        $this->assertNotNull(RoadCrashCausativeFactor::find($createdRoadCrashCausativeFactor['id']), 'RoadCrashCausativeFactor with given id must be in DB');
        $this->assertModelData($roadCrashCausativeFactor, $createdRoadCrashCausativeFactor);
    }

    /**
     * @test read
     */
    public function test_read_road_crash_causative_factor()
    {
        $roadCrashCausativeFactor = RoadCrashCausativeFactor::factory()->create();

        $dbRoadCrashCausativeFactor = $this->roadCrashCausativeFactorRepo->find($roadCrashCausativeFactor->id);

        $dbRoadCrashCausativeFactor = $dbRoadCrashCausativeFactor->toArray();
        $this->assertModelData($roadCrashCausativeFactor->toArray(), $dbRoadCrashCausativeFactor);
    }

    /**
     * @test update
     */
    public function test_update_road_crash_causative_factor()
    {
        $roadCrashCausativeFactor = RoadCrashCausativeFactor::factory()->create();
        $fakeRoadCrashCausativeFactor = RoadCrashCausativeFactor::factory()->make()->toArray();

        $updatedRoadCrashCausativeFactor = $this->roadCrashCausativeFactorRepo->update($fakeRoadCrashCausativeFactor, $roadCrashCausativeFactor->id);

        $this->assertModelData($fakeRoadCrashCausativeFactor, $updatedRoadCrashCausativeFactor->toArray());
        $dbRoadCrashCausativeFactor = $this->roadCrashCausativeFactorRepo->find($roadCrashCausativeFactor->id);
        $this->assertModelData($fakeRoadCrashCausativeFactor, $dbRoadCrashCausativeFactor->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_road_crash_causative_factor()
    {
        $roadCrashCausativeFactor = RoadCrashCausativeFactor::factory()->create();

        $resp = $this->roadCrashCausativeFactorRepo->delete($roadCrashCausativeFactor->id);

        $this->assertTrue($resp);
        $this->assertNull(RoadCrashCausativeFactor::find($roadCrashCausativeFactor->id), 'RoadCrashCausativeFactor should not exist in DB');
    }
}
