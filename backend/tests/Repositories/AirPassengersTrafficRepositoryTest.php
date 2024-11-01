<?php namespace Tests\Repositories;

use App\Models\AirPassengersTraffic;
use App\Repositories\AirPassengersTrafficRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AirPassengersTrafficRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AirPassengersTrafficRepository
     */
    protected $airPassengersTrafficRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->airPassengersTrafficRepo = \App::make(AirPassengersTrafficRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_air_passengers_traffic()
    {
        $airPassengersTraffic = AirPassengersTraffic::factory()->make()->toArray();

        $createdAirPassengersTraffic = $this->airPassengersTrafficRepo->create($airPassengersTraffic);

        $createdAirPassengersTraffic = $createdAirPassengersTraffic->toArray();
        $this->assertArrayHasKey('id', $createdAirPassengersTraffic);
        $this->assertNotNull($createdAirPassengersTraffic['id'], 'Created AirPassengersTraffic must have id specified');
        $this->assertNotNull(AirPassengersTraffic::find($createdAirPassengersTraffic['id']), 'AirPassengersTraffic with given id must be in DB');
        $this->assertModelData($airPassengersTraffic, $createdAirPassengersTraffic);
    }

    /**
     * @test read
     */
    public function test_read_air_passengers_traffic()
    {
        $airPassengersTraffic = AirPassengersTraffic::factory()->create();

        $dbAirPassengersTraffic = $this->airPassengersTrafficRepo->find($airPassengersTraffic->id);

        $dbAirPassengersTraffic = $dbAirPassengersTraffic->toArray();
        $this->assertModelData($airPassengersTraffic->toArray(), $dbAirPassengersTraffic);
    }

    /**
     * @test update
     */
    public function test_update_air_passengers_traffic()
    {
        $airPassengersTraffic = AirPassengersTraffic::factory()->create();
        $fakeAirPassengersTraffic = AirPassengersTraffic::factory()->make()->toArray();

        $updatedAirPassengersTraffic = $this->airPassengersTrafficRepo->update($fakeAirPassengersTraffic, $airPassengersTraffic->id);

        $this->assertModelData($fakeAirPassengersTraffic, $updatedAirPassengersTraffic->toArray());
        $dbAirPassengersTraffic = $this->airPassengersTrafficRepo->find($airPassengersTraffic->id);
        $this->assertModelData($fakeAirPassengersTraffic, $dbAirPassengersTraffic->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_air_passengers_traffic()
    {
        $airPassengersTraffic = AirPassengersTraffic::factory()->create();

        $resp = $this->airPassengersTrafficRepo->delete($airPassengersTraffic->id);

        $this->assertTrue($resp);
        $this->assertNull(AirPassengersTraffic::find($airPassengersTraffic->id), 'AirPassengersTraffic should not exist in DB');
    }
}
