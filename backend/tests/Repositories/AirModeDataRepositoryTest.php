<?php namespace Tests\Repositories;

use App\Models\AirModeData;
use App\Repositories\AirModeDataRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AirModeDataRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AirModeDataRepository
     */
    protected $airModeDataRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->airModeDataRepo = \App::make(AirModeDataRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_air_mode_data()
    {
        $airModeData = AirModeData::factory()->make()->toArray();

        $createdAirModeData = $this->airModeDataRepo->create($airModeData);

        $createdAirModeData = $createdAirModeData->toArray();
        $this->assertArrayHasKey('id', $createdAirModeData);
        $this->assertNotNull($createdAirModeData['id'], 'Created AirModeData must have id specified');
        $this->assertNotNull(AirModeData::find($createdAirModeData['id']), 'AirModeData with given id must be in DB');
        $this->assertModelData($airModeData, $createdAirModeData);
    }

    /**
     * @test read
     */
    public function test_read_air_mode_data()
    {
        $airModeData = AirModeData::factory()->create();

        $dbAirModeData = $this->airModeDataRepo->find($airModeData->id);

        $dbAirModeData = $dbAirModeData->toArray();
        $this->assertModelData($airModeData->toArray(), $dbAirModeData);
    }

    /**
     * @test update
     */
    public function test_update_air_mode_data()
    {
        $airModeData = AirModeData::factory()->create();
        $fakeAirModeData = AirModeData::factory()->make()->toArray();

        $updatedAirModeData = $this->airModeDataRepo->update($fakeAirModeData, $airModeData->id);

        $this->assertModelData($fakeAirModeData, $updatedAirModeData->toArray());
        $dbAirModeData = $this->airModeDataRepo->find($airModeData->id);
        $this->assertModelData($fakeAirModeData, $dbAirModeData->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_air_mode_data()
    {
        $airModeData = AirModeData::factory()->create();

        $resp = $this->airModeDataRepo->delete($airModeData->id);

        $this->assertTrue($resp);
        $this->assertNull(AirModeData::find($airModeData->id), 'AirModeData should not exist in DB');
    }
}
