<?php namespace Tests\Repositories;

use App\Models\FleetAccident;
use App\Repositories\FleetAccidentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FleetAccidentRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FleetAccidentRepository
     */
    protected $fleetAccidentRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->fleetAccidentRepo = \App::make(FleetAccidentRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_fleet_accident()
    {
        $fleetAccident = FleetAccident::factory()->make()->toArray();

        $createdFleetAccident = $this->fleetAccidentRepo->create($fleetAccident);

        $createdFleetAccident = $createdFleetAccident->toArray();
        $this->assertArrayHasKey('id', $createdFleetAccident);
        $this->assertNotNull($createdFleetAccident['id'], 'Created FleetAccident must have id specified');
        $this->assertNotNull(FleetAccident::find($createdFleetAccident['id']), 'FleetAccident with given id must be in DB');
        $this->assertModelData($fleetAccident, $createdFleetAccident);
    }

    /**
     * @test read
     */
    public function test_read_fleet_accident()
    {
        $fleetAccident = FleetAccident::factory()->create();

        $dbFleetAccident = $this->fleetAccidentRepo->find($fleetAccident->id);

        $dbFleetAccident = $dbFleetAccident->toArray();
        $this->assertModelData($fleetAccident->toArray(), $dbFleetAccident);
    }

    /**
     * @test update
     */
    public function test_update_fleet_accident()
    {
        $fleetAccident = FleetAccident::factory()->create();
        $fakeFleetAccident = FleetAccident::factory()->make()->toArray();

        $updatedFleetAccident = $this->fleetAccidentRepo->update($fakeFleetAccident, $fleetAccident->id);

        $this->assertModelData($fakeFleetAccident, $updatedFleetAccident->toArray());
        $dbFleetAccident = $this->fleetAccidentRepo->find($fleetAccident->id);
        $this->assertModelData($fakeFleetAccident, $dbFleetAccident->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_fleet_accident()
    {
        $fleetAccident = FleetAccident::factory()->create();

        $resp = $this->fleetAccidentRepo->delete($fleetAccident->id);

        $this->assertTrue($resp);
        $this->assertNull(FleetAccident::find($fleetAccident->id), 'FleetAccident should not exist in DB');
    }
}
