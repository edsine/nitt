<?php namespace Tests\Repositories;

use App\Models\AirTransportData;
use App\Repositories\AirTransportDataRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AirTransportDataRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AirTransportDataRepository
     */
    protected $airTransportDataRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->airTransportDataRepo = \App::make(AirTransportDataRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_air_transport_data()
    {
        $airTransportData = AirTransportData::factory()->make()->toArray();

        $createdAirTransportData = $this->airTransportDataRepo->create($airTransportData);

        $createdAirTransportData = $createdAirTransportData->toArray();
        $this->assertArrayHasKey('id', $createdAirTransportData);
        $this->assertNotNull($createdAirTransportData['id'], 'Created AirTransportData must have id specified');
        $this->assertNotNull(AirTransportData::find($createdAirTransportData['id']), 'AirTransportData with given id must be in DB');
        $this->assertModelData($airTransportData, $createdAirTransportData);
    }

    /**
     * @test read
     */
    public function test_read_air_transport_data()
    {
        $airTransportData = AirTransportData::factory()->create();

        $dbAirTransportData = $this->airTransportDataRepo->find($airTransportData->id);

        $dbAirTransportData = $dbAirTransportData->toArray();
        $this->assertModelData($airTransportData->toArray(), $dbAirTransportData);
    }

    /**
     * @test update
     */
    public function test_update_air_transport_data()
    {
        $airTransportData = AirTransportData::factory()->create();
        $fakeAirTransportData = AirTransportData::factory()->make()->toArray();

        $updatedAirTransportData = $this->airTransportDataRepo->update($fakeAirTransportData, $airTransportData->id);

        $this->assertModelData($fakeAirTransportData, $updatedAirTransportData->toArray());
        $dbAirTransportData = $this->airTransportDataRepo->find($airTransportData->id);
        $this->assertModelData($fakeAirTransportData, $dbAirTransportData->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_air_transport_data()
    {
        $airTransportData = AirTransportData::factory()->create();

        $resp = $this->airTransportDataRepo->delete($airTransportData->id);

        $this->assertTrue($resp);
        $this->assertNull(AirTransportData::find($airTransportData->id), 'AirTransportData should not exist in DB');
    }
}
