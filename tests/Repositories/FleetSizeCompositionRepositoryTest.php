<?php namespace Tests\Repositories;

use App\Models\FleetSizeComposition;
use App\Repositories\FleetSizeCompositionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FleetSizeCompositionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FleetSizeCompositionRepository
     */
    protected $fleetSizeCompositionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->fleetSizeCompositionRepo = \App::make(FleetSizeCompositionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_fleet_size_composition()
    {
        $fleetSizeComposition = FleetSizeComposition::factory()->make()->toArray();

        $createdFleetSizeComposition = $this->fleetSizeCompositionRepo->create($fleetSizeComposition);

        $createdFleetSizeComposition = $createdFleetSizeComposition->toArray();
        $this->assertArrayHasKey('id', $createdFleetSizeComposition);
        $this->assertNotNull($createdFleetSizeComposition['id'], 'Created FleetSizeComposition must have id specified');
        $this->assertNotNull(FleetSizeComposition::find($createdFleetSizeComposition['id']), 'FleetSizeComposition with given id must be in DB');
        $this->assertModelData($fleetSizeComposition, $createdFleetSizeComposition);
    }

    /**
     * @test read
     */
    public function test_read_fleet_size_composition()
    {
        $fleetSizeComposition = FleetSizeComposition::factory()->create();

        $dbFleetSizeComposition = $this->fleetSizeCompositionRepo->find($fleetSizeComposition->id);

        $dbFleetSizeComposition = $dbFleetSizeComposition->toArray();
        $this->assertModelData($fleetSizeComposition->toArray(), $dbFleetSizeComposition);
    }

    /**
     * @test update
     */
    public function test_update_fleet_size_composition()
    {
        $fleetSizeComposition = FleetSizeComposition::factory()->create();
        $fakeFleetSizeComposition = FleetSizeComposition::factory()->make()->toArray();

        $updatedFleetSizeComposition = $this->fleetSizeCompositionRepo->update($fakeFleetSizeComposition, $fleetSizeComposition->id);

        $this->assertModelData($fakeFleetSizeComposition, $updatedFleetSizeComposition->toArray());
        $dbFleetSizeComposition = $this->fleetSizeCompositionRepo->find($fleetSizeComposition->id);
        $this->assertModelData($fakeFleetSizeComposition, $dbFleetSizeComposition->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_fleet_size_composition()
    {
        $fleetSizeComposition = FleetSizeComposition::factory()->create();

        $resp = $this->fleetSizeCompositionRepo->delete($fleetSizeComposition->id);

        $this->assertTrue($resp);
        $this->assertNull(FleetSizeComposition::find($fleetSizeComposition->id), 'FleetSizeComposition should not exist in DB');
    }
}
