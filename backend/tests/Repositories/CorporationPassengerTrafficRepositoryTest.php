<?php namespace Tests\Repositories;

use App\Models\CorporationPassengerTraffic;
use App\Repositories\CorporationPassengerTrafficRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CorporationPassengerTrafficRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CorporationPassengerTrafficRepository
     */
    protected $corporationPassengerTrafficRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->corporationPassengerTrafficRepo = \App::make(CorporationPassengerTrafficRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_corporation_passenger_traffic()
    {
        $corporationPassengerTraffic = CorporationPassengerTraffic::factory()->make()->toArray();

        $createdCorporationPassengerTraffic = $this->corporationPassengerTrafficRepo->create($corporationPassengerTraffic);

        $createdCorporationPassengerTraffic = $createdCorporationPassengerTraffic->toArray();
        $this->assertArrayHasKey('id', $createdCorporationPassengerTraffic);
        $this->assertNotNull($createdCorporationPassengerTraffic['id'], 'Created CorporationPassengerTraffic must have id specified');
        $this->assertNotNull(CorporationPassengerTraffic::find($createdCorporationPassengerTraffic['id']), 'CorporationPassengerTraffic with given id must be in DB');
        $this->assertModelData($corporationPassengerTraffic, $createdCorporationPassengerTraffic);
    }

    /**
     * @test read
     */
    public function test_read_corporation_passenger_traffic()
    {
        $corporationPassengerTraffic = CorporationPassengerTraffic::factory()->create();

        $dbCorporationPassengerTraffic = $this->corporationPassengerTrafficRepo->find($corporationPassengerTraffic->id);

        $dbCorporationPassengerTraffic = $dbCorporationPassengerTraffic->toArray();
        $this->assertModelData($corporationPassengerTraffic->toArray(), $dbCorporationPassengerTraffic);
    }

    /**
     * @test update
     */
    public function test_update_corporation_passenger_traffic()
    {
        $corporationPassengerTraffic = CorporationPassengerTraffic::factory()->create();
        $fakeCorporationPassengerTraffic = CorporationPassengerTraffic::factory()->make()->toArray();

        $updatedCorporationPassengerTraffic = $this->corporationPassengerTrafficRepo->update($fakeCorporationPassengerTraffic, $corporationPassengerTraffic->id);

        $this->assertModelData($fakeCorporationPassengerTraffic, $updatedCorporationPassengerTraffic->toArray());
        $dbCorporationPassengerTraffic = $this->corporationPassengerTrafficRepo->find($corporationPassengerTraffic->id);
        $this->assertModelData($fakeCorporationPassengerTraffic, $dbCorporationPassengerTraffic->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_corporation_passenger_traffic()
    {
        $corporationPassengerTraffic = CorporationPassengerTraffic::factory()->create();

        $resp = $this->corporationPassengerTrafficRepo->delete($corporationPassengerTraffic->id);

        $this->assertTrue($resp);
        $this->assertNull(CorporationPassengerTraffic::find($corporationPassengerTraffic->id), 'CorporationPassengerTraffic should not exist in DB');
    }
}
