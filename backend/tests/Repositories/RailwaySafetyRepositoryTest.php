<?php namespace Tests\Repositories;

use App\Models\RailwaySafety;
use App\Repositories\RailwaySafetyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RailwaySafetyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RailwaySafetyRepository
     */
    protected $railwaySafetyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->railwaySafetyRepo = \App::make(RailwaySafetyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_railway_safety()
    {
        $railwaySafety = RailwaySafety::factory()->make()->toArray();

        $createdRailwaySafety = $this->railwaySafetyRepo->create($railwaySafety);

        $createdRailwaySafety = $createdRailwaySafety->toArray();
        $this->assertArrayHasKey('id', $createdRailwaySafety);
        $this->assertNotNull($createdRailwaySafety['id'], 'Created RailwaySafety must have id specified');
        $this->assertNotNull(RailwaySafety::find($createdRailwaySafety['id']), 'RailwaySafety with given id must be in DB');
        $this->assertModelData($railwaySafety, $createdRailwaySafety);
    }

    /**
     * @test read
     */
    public function test_read_railway_safety()
    {
        $railwaySafety = RailwaySafety::factory()->create();

        $dbRailwaySafety = $this->railwaySafetyRepo->find($railwaySafety->id);

        $dbRailwaySafety = $dbRailwaySafety->toArray();
        $this->assertModelData($railwaySafety->toArray(), $dbRailwaySafety);
    }

    /**
     * @test update
     */
    public function test_update_railway_safety()
    {
        $railwaySafety = RailwaySafety::factory()->create();
        $fakeRailwaySafety = RailwaySafety::factory()->make()->toArray();

        $updatedRailwaySafety = $this->railwaySafetyRepo->update($fakeRailwaySafety, $railwaySafety->id);

        $this->assertModelData($fakeRailwaySafety, $updatedRailwaySafety->toArray());
        $dbRailwaySafety = $this->railwaySafetyRepo->find($railwaySafety->id);
        $this->assertModelData($fakeRailwaySafety, $dbRailwaySafety->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_railway_safety()
    {
        $railwaySafety = RailwaySafety::factory()->create();

        $resp = $this->railwaySafetyRepo->delete($railwaySafety->id);

        $this->assertTrue($resp);
        $this->assertNull(RailwaySafety::find($railwaySafety->id), 'RailwaySafety should not exist in DB');
    }
}
