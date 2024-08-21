<?php namespace Tests\Repositories;

use App\Models\RailwayRollingStock;
use App\Repositories\RailwayRollingStockRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RailwayRollingStockRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RailwayRollingStockRepository
     */
    protected $railwayRollingStockRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->railwayRollingStockRepo = \App::make(RailwayRollingStockRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_railway_rolling_stock()
    {
        $railwayRollingStock = RailwayRollingStock::factory()->make()->toArray();

        $createdRailwayRollingStock = $this->railwayRollingStockRepo->create($railwayRollingStock);

        $createdRailwayRollingStock = $createdRailwayRollingStock->toArray();
        $this->assertArrayHasKey('id', $createdRailwayRollingStock);
        $this->assertNotNull($createdRailwayRollingStock['id'], 'Created RailwayRollingStock must have id specified');
        $this->assertNotNull(RailwayRollingStock::find($createdRailwayRollingStock['id']), 'RailwayRollingStock with given id must be in DB');
        $this->assertModelData($railwayRollingStock, $createdRailwayRollingStock);
    }

    /**
     * @test read
     */
    public function test_read_railway_rolling_stock()
    {
        $railwayRollingStock = RailwayRollingStock::factory()->create();

        $dbRailwayRollingStock = $this->railwayRollingStockRepo->find($railwayRollingStock->id);

        $dbRailwayRollingStock = $dbRailwayRollingStock->toArray();
        $this->assertModelData($railwayRollingStock->toArray(), $dbRailwayRollingStock);
    }

    /**
     * @test update
     */
    public function test_update_railway_rolling_stock()
    {
        $railwayRollingStock = RailwayRollingStock::factory()->create();
        $fakeRailwayRollingStock = RailwayRollingStock::factory()->make()->toArray();

        $updatedRailwayRollingStock = $this->railwayRollingStockRepo->update($fakeRailwayRollingStock, $railwayRollingStock->id);

        $this->assertModelData($fakeRailwayRollingStock, $updatedRailwayRollingStock->toArray());
        $dbRailwayRollingStock = $this->railwayRollingStockRepo->find($railwayRollingStock->id);
        $this->assertModelData($fakeRailwayRollingStock, $dbRailwayRollingStock->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_railway_rolling_stock()
    {
        $railwayRollingStock = RailwayRollingStock::factory()->create();

        $resp = $this->railwayRollingStockRepo->delete($railwayRollingStock->id);

        $this->assertTrue($resp);
        $this->assertNull(RailwayRollingStock::find($railwayRollingStock->id), 'RailwayRollingStock should not exist in DB');
    }
}
