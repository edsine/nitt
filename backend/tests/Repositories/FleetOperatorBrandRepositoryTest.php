<?php namespace Tests\Repositories;

use App\Models\FleetOperatorBrand;
use App\Repositories\FleetOperatorBrandRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FleetOperatorBrandRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FleetOperatorBrandRepository
     */
    protected $fleetOperatorBrandRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->fleetOperatorBrandRepo = \App::make(FleetOperatorBrandRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_fleet_operator_brand()
    {
        $fleetOperatorBrand = FleetOperatorBrand::factory()->make()->toArray();

        $createdFleetOperatorBrand = $this->fleetOperatorBrandRepo->create($fleetOperatorBrand);

        $createdFleetOperatorBrand = $createdFleetOperatorBrand->toArray();
        $this->assertArrayHasKey('id', $createdFleetOperatorBrand);
        $this->assertNotNull($createdFleetOperatorBrand['id'], 'Created FleetOperatorBrand must have id specified');
        $this->assertNotNull(FleetOperatorBrand::find($createdFleetOperatorBrand['id']), 'FleetOperatorBrand with given id must be in DB');
        $this->assertModelData($fleetOperatorBrand, $createdFleetOperatorBrand);
    }

    /**
     * @test read
     */
    public function test_read_fleet_operator_brand()
    {
        $fleetOperatorBrand = FleetOperatorBrand::factory()->create();

        $dbFleetOperatorBrand = $this->fleetOperatorBrandRepo->find($fleetOperatorBrand->id);

        $dbFleetOperatorBrand = $dbFleetOperatorBrand->toArray();
        $this->assertModelData($fleetOperatorBrand->toArray(), $dbFleetOperatorBrand);
    }

    /**
     * @test update
     */
    public function test_update_fleet_operator_brand()
    {
        $fleetOperatorBrand = FleetOperatorBrand::factory()->create();
        $fakeFleetOperatorBrand = FleetOperatorBrand::factory()->make()->toArray();

        $updatedFleetOperatorBrand = $this->fleetOperatorBrandRepo->update($fakeFleetOperatorBrand, $fleetOperatorBrand->id);

        $this->assertModelData($fakeFleetOperatorBrand, $updatedFleetOperatorBrand->toArray());
        $dbFleetOperatorBrand = $this->fleetOperatorBrandRepo->find($fleetOperatorBrand->id);
        $this->assertModelData($fakeFleetOperatorBrand, $dbFleetOperatorBrand->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_fleet_operator_brand()
    {
        $fleetOperatorBrand = FleetOperatorBrand::factory()->create();

        $resp = $this->fleetOperatorBrandRepo->delete($fleetOperatorBrand->id);

        $this->assertTrue($resp);
        $this->assertNull(FleetOperatorBrand::find($fleetOperatorBrand->id), 'FleetOperatorBrand should not exist in DB');
    }
}
