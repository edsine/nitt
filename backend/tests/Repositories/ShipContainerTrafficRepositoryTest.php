<?php namespace Tests\Repositories;

use App\Models\ShipContainerTraffic;
use App\Repositories\ShipContainerTrafficRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ShipContainerTrafficRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ShipContainerTrafficRepository
     */
    protected $shipContainerTrafficRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shipContainerTrafficRepo = \App::make(ShipContainerTrafficRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ship_container_traffic()
    {
        $shipContainerTraffic = ShipContainerTraffic::factory()->make()->toArray();

        $createdShipContainerTraffic = $this->shipContainerTrafficRepo->create($shipContainerTraffic);

        $createdShipContainerTraffic = $createdShipContainerTraffic->toArray();
        $this->assertArrayHasKey('id', $createdShipContainerTraffic);
        $this->assertNotNull($createdShipContainerTraffic['id'], 'Created ShipContainerTraffic must have id specified');
        $this->assertNotNull(ShipContainerTraffic::find($createdShipContainerTraffic['id']), 'ShipContainerTraffic with given id must be in DB');
        $this->assertModelData($shipContainerTraffic, $createdShipContainerTraffic);
    }

    /**
     * @test read
     */
    public function test_read_ship_container_traffic()
    {
        $shipContainerTraffic = ShipContainerTraffic::factory()->create();

        $dbShipContainerTraffic = $this->shipContainerTrafficRepo->find($shipContainerTraffic->id);

        $dbShipContainerTraffic = $dbShipContainerTraffic->toArray();
        $this->assertModelData($shipContainerTraffic->toArray(), $dbShipContainerTraffic);
    }

    /**
     * @test update
     */
    public function test_update_ship_container_traffic()
    {
        $shipContainerTraffic = ShipContainerTraffic::factory()->create();
        $fakeShipContainerTraffic = ShipContainerTraffic::factory()->make()->toArray();

        $updatedShipContainerTraffic = $this->shipContainerTrafficRepo->update($fakeShipContainerTraffic, $shipContainerTraffic->id);

        $this->assertModelData($fakeShipContainerTraffic, $updatedShipContainerTraffic->toArray());
        $dbShipContainerTraffic = $this->shipContainerTrafficRepo->find($shipContainerTraffic->id);
        $this->assertModelData($fakeShipContainerTraffic, $dbShipContainerTraffic->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ship_container_traffic()
    {
        $shipContainerTraffic = ShipContainerTraffic::factory()->create();

        $resp = $this->shipContainerTrafficRepo->delete($shipContainerTraffic->id);

        $this->assertTrue($resp);
        $this->assertNull(ShipContainerTraffic::find($shipContainerTraffic->id), 'ShipContainerTraffic should not exist in DB');
    }
}
