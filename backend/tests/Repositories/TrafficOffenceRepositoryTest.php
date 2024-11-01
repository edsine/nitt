<?php namespace Tests\Repositories;

use App\Models\TrafficOffence;
use App\Repositories\TrafficOffenceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TrafficOffenceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TrafficOffenceRepository
     */
    protected $trafficOffenceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->trafficOffenceRepo = \App::make(TrafficOffenceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_traffic_offence()
    {
        $trafficOffence = TrafficOffence::factory()->make()->toArray();

        $createdTrafficOffence = $this->trafficOffenceRepo->create($trafficOffence);

        $createdTrafficOffence = $createdTrafficOffence->toArray();
        $this->assertArrayHasKey('id', $createdTrafficOffence);
        $this->assertNotNull($createdTrafficOffence['id'], 'Created TrafficOffence must have id specified');
        $this->assertNotNull(TrafficOffence::find($createdTrafficOffence['id']), 'TrafficOffence with given id must be in DB');
        $this->assertModelData($trafficOffence, $createdTrafficOffence);
    }

    /**
     * @test read
     */
    public function test_read_traffic_offence()
    {
        $trafficOffence = TrafficOffence::factory()->create();

        $dbTrafficOffence = $this->trafficOffenceRepo->find($trafficOffence->id);

        $dbTrafficOffence = $dbTrafficOffence->toArray();
        $this->assertModelData($trafficOffence->toArray(), $dbTrafficOffence);
    }

    /**
     * @test update
     */
    public function test_update_traffic_offence()
    {
        $trafficOffence = TrafficOffence::factory()->create();
        $fakeTrafficOffence = TrafficOffence::factory()->make()->toArray();

        $updatedTrafficOffence = $this->trafficOffenceRepo->update($fakeTrafficOffence, $trafficOffence->id);

        $this->assertModelData($fakeTrafficOffence, $updatedTrafficOffence->toArray());
        $dbTrafficOffence = $this->trafficOffenceRepo->find($trafficOffence->id);
        $this->assertModelData($fakeTrafficOffence, $dbTrafficOffence->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_traffic_offence()
    {
        $trafficOffence = TrafficOffence::factory()->create();

        $resp = $this->trafficOffenceRepo->delete($trafficOffence->id);

        $this->assertTrue($resp);
        $this->assertNull(TrafficOffence::find($trafficOffence->id), 'TrafficOffence should not exist in DB');
    }
}
