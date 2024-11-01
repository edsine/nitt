<?php namespace Tests\Repositories;

use App\Models\PassengerRoadTransportData;
use App\Repositories\PassengerRoadTransportDataRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PassengerRoadTransportDataRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PassengerRoadTransportDataRepository
     */
    protected $passengerRoadTransportDataRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->passengerRoadTransportDataRepo = \App::make(PassengerRoadTransportDataRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_passenger_road_transport_data()
    {
        $passengerRoadTransportData = PassengerRoadTransportData::factory()->make()->toArray();

        $createdPassengerRoadTransportData = $this->passengerRoadTransportDataRepo->create($passengerRoadTransportData);

        $createdPassengerRoadTransportData = $createdPassengerRoadTransportData->toArray();
        $this->assertArrayHasKey('id', $createdPassengerRoadTransportData);
        $this->assertNotNull($createdPassengerRoadTransportData['id'], 'Created PassengerRoadTransportData must have id specified');
        $this->assertNotNull(PassengerRoadTransportData::find($createdPassengerRoadTransportData['id']), 'PassengerRoadTransportData with given id must be in DB');
        $this->assertModelData($passengerRoadTransportData, $createdPassengerRoadTransportData);
    }

    /**
     * @test read
     */
    public function test_read_passenger_road_transport_data()
    {
        $passengerRoadTransportData = PassengerRoadTransportData::factory()->create();

        $dbPassengerRoadTransportData = $this->passengerRoadTransportDataRepo->find($passengerRoadTransportData->id);

        $dbPassengerRoadTransportData = $dbPassengerRoadTransportData->toArray();
        $this->assertModelData($passengerRoadTransportData->toArray(), $dbPassengerRoadTransportData);
    }

    /**
     * @test update
     */
    public function test_update_passenger_road_transport_data()
    {
        $passengerRoadTransportData = PassengerRoadTransportData::factory()->create();
        $fakePassengerRoadTransportData = PassengerRoadTransportData::factory()->make()->toArray();

        $updatedPassengerRoadTransportData = $this->passengerRoadTransportDataRepo->update($fakePassengerRoadTransportData, $passengerRoadTransportData->id);

        $this->assertModelData($fakePassengerRoadTransportData, $updatedPassengerRoadTransportData->toArray());
        $dbPassengerRoadTransportData = $this->passengerRoadTransportDataRepo->find($passengerRoadTransportData->id);
        $this->assertModelData($fakePassengerRoadTransportData, $dbPassengerRoadTransportData->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_passenger_road_transport_data()
    {
        $passengerRoadTransportData = PassengerRoadTransportData::factory()->create();

        $resp = $this->passengerRoadTransportDataRepo->delete($passengerRoadTransportData->id);

        $this->assertTrue($resp);
        $this->assertNull(PassengerRoadTransportData::find($passengerRoadTransportData->id), 'PassengerRoadTransportData should not exist in DB');
    }
}
