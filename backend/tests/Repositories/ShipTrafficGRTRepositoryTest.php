<?php namespace Tests\Repositories;

use App\Models\ShipTrafficGRT;
use App\Repositories\ShipTrafficGRTRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ShipTrafficGRTRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ShipTrafficGRTRepository
     */
    protected $shipTrafficGRTRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shipTrafficGRTRepo = \App::make(ShipTrafficGRTRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ship_traffic_g_r_t()
    {
        $shipTrafficGRT = ShipTrafficGRT::factory()->make()->toArray();

        $createdShipTrafficGRT = $this->shipTrafficGRTRepo->create($shipTrafficGRT);

        $createdShipTrafficGRT = $createdShipTrafficGRT->toArray();
        $this->assertArrayHasKey('id', $createdShipTrafficGRT);
        $this->assertNotNull($createdShipTrafficGRT['id'], 'Created ShipTrafficGRT must have id specified');
        $this->assertNotNull(ShipTrafficGRT::find($createdShipTrafficGRT['id']), 'ShipTrafficGRT with given id must be in DB');
        $this->assertModelData($shipTrafficGRT, $createdShipTrafficGRT);
    }

    /**
     * @test read
     */
    public function test_read_ship_traffic_g_r_t()
    {
        $shipTrafficGRT = ShipTrafficGRT::factory()->create();

        $dbShipTrafficGRT = $this->shipTrafficGRTRepo->find($shipTrafficGRT->id);

        $dbShipTrafficGRT = $dbShipTrafficGRT->toArray();
        $this->assertModelData($shipTrafficGRT->toArray(), $dbShipTrafficGRT);
    }

    /**
     * @test update
     */
    public function test_update_ship_traffic_g_r_t()
    {
        $shipTrafficGRT = ShipTrafficGRT::factory()->create();
        $fakeShipTrafficGRT = ShipTrafficGRT::factory()->make()->toArray();

        $updatedShipTrafficGRT = $this->shipTrafficGRTRepo->update($fakeShipTrafficGRT, $shipTrafficGRT->id);

        $this->assertModelData($fakeShipTrafficGRT, $updatedShipTrafficGRT->toArray());
        $dbShipTrafficGRT = $this->shipTrafficGRTRepo->find($shipTrafficGRT->id);
        $this->assertModelData($fakeShipTrafficGRT, $dbShipTrafficGRT->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ship_traffic_g_r_t()
    {
        $shipTrafficGRT = ShipTrafficGRT::factory()->create();

        $resp = $this->shipTrafficGRTRepo->delete($shipTrafficGRT->id);

        $this->assertTrue($resp);
        $this->assertNull(ShipTrafficGRT::find($shipTrafficGRT->id), 'ShipTrafficGRT should not exist in DB');
    }
}
