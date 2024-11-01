<?php namespace Tests\Repositories;

use App\Models\FreightRoadTransportData;
use App\Repositories\FreightRoadTransportDataRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FreightRoadTransportDataRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FreightRoadTransportDataRepository
     */
    protected $freightRoadTransportDataRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->freightRoadTransportDataRepo = \App::make(FreightRoadTransportDataRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_freight_road_transport_data()
    {
        $freightRoadTransportData = FreightRoadTransportData::factory()->make()->toArray();

        $createdFreightRoadTransportData = $this->freightRoadTransportDataRepo->create($freightRoadTransportData);

        $createdFreightRoadTransportData = $createdFreightRoadTransportData->toArray();
        $this->assertArrayHasKey('id', $createdFreightRoadTransportData);
        $this->assertNotNull($createdFreightRoadTransportData['id'], 'Created FreightRoadTransportData must have id specified');
        $this->assertNotNull(FreightRoadTransportData::find($createdFreightRoadTransportData['id']), 'FreightRoadTransportData with given id must be in DB');
        $this->assertModelData($freightRoadTransportData, $createdFreightRoadTransportData);
    }

    /**
     * @test read
     */
    public function test_read_freight_road_transport_data()
    {
        $freightRoadTransportData = FreightRoadTransportData::factory()->create();

        $dbFreightRoadTransportData = $this->freightRoadTransportDataRepo->find($freightRoadTransportData->id);

        $dbFreightRoadTransportData = $dbFreightRoadTransportData->toArray();
        $this->assertModelData($freightRoadTransportData->toArray(), $dbFreightRoadTransportData);
    }

    /**
     * @test update
     */
    public function test_update_freight_road_transport_data()
    {
        $freightRoadTransportData = FreightRoadTransportData::factory()->create();
        $fakeFreightRoadTransportData = FreightRoadTransportData::factory()->make()->toArray();

        $updatedFreightRoadTransportData = $this->freightRoadTransportDataRepo->update($fakeFreightRoadTransportData, $freightRoadTransportData->id);

        $this->assertModelData($fakeFreightRoadTransportData, $updatedFreightRoadTransportData->toArray());
        $dbFreightRoadTransportData = $this->freightRoadTransportDataRepo->find($freightRoadTransportData->id);
        $this->assertModelData($fakeFreightRoadTransportData, $dbFreightRoadTransportData->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_freight_road_transport_data()
    {
        $freightRoadTransportData = FreightRoadTransportData::factory()->create();

        $resp = $this->freightRoadTransportDataRepo->delete($freightRoadTransportData->id);

        $this->assertTrue($resp);
        $this->assertNull(FreightRoadTransportData::find($freightRoadTransportData->id), 'FreightRoadTransportData should not exist in DB');
    }
}
