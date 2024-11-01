<?php namespace Tests\Repositories;

use App\Models\RailwayPassenger;
use App\Repositories\RailwayPassengerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RailwayPassengerRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RailwayPassengerRepository
     */
    protected $railwayPassengerRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->railwayPassengerRepo = \App::make(RailwayPassengerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_railway_passenger()
    {
        $railwayPassenger = RailwayPassenger::factory()->make()->toArray();

        $createdRailwayPassenger = $this->railwayPassengerRepo->create($railwayPassenger);

        $createdRailwayPassenger = $createdRailwayPassenger->toArray();
        $this->assertArrayHasKey('id', $createdRailwayPassenger);
        $this->assertNotNull($createdRailwayPassenger['id'], 'Created RailwayPassenger must have id specified');
        $this->assertNotNull(RailwayPassenger::find($createdRailwayPassenger['id']), 'RailwayPassenger with given id must be in DB');
        $this->assertModelData($railwayPassenger, $createdRailwayPassenger);
    }

    /**
     * @test read
     */
    public function test_read_railway_passenger()
    {
        $railwayPassenger = RailwayPassenger::factory()->create();

        $dbRailwayPassenger = $this->railwayPassengerRepo->find($railwayPassenger->id);

        $dbRailwayPassenger = $dbRailwayPassenger->toArray();
        $this->assertModelData($railwayPassenger->toArray(), $dbRailwayPassenger);
    }

    /**
     * @test update
     */
    public function test_update_railway_passenger()
    {
        $railwayPassenger = RailwayPassenger::factory()->create();
        $fakeRailwayPassenger = RailwayPassenger::factory()->make()->toArray();

        $updatedRailwayPassenger = $this->railwayPassengerRepo->update($fakeRailwayPassenger, $railwayPassenger->id);

        $this->assertModelData($fakeRailwayPassenger, $updatedRailwayPassenger->toArray());
        $dbRailwayPassenger = $this->railwayPassengerRepo->find($railwayPassenger->id);
        $this->assertModelData($fakeRailwayPassenger, $dbRailwayPassenger->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_railway_passenger()
    {
        $railwayPassenger = RailwayPassenger::factory()->create();

        $resp = $this->railwayPassengerRepo->delete($railwayPassenger->id);

        $this->assertTrue($resp);
        $this->assertNull(RailwayPassenger::find($railwayPassenger->id), 'RailwayPassenger should not exist in DB');
    }
}
