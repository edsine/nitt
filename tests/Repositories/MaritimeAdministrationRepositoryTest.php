<?php namespace Tests\Repositories;

use App\Models\MaritimeAdministration;
use App\Repositories\MaritimeAdministrationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MaritimeAdministrationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MaritimeAdministrationRepository
     */
    protected $maritimeAdministrationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->maritimeAdministrationRepo = \App::make(MaritimeAdministrationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_maritime_administration()
    {
        $maritimeAdministration = MaritimeAdministration::factory()->make()->toArray();

        $createdMaritimeAdministration = $this->maritimeAdministrationRepo->create($maritimeAdministration);

        $createdMaritimeAdministration = $createdMaritimeAdministration->toArray();
        $this->assertArrayHasKey('id', $createdMaritimeAdministration);
        $this->assertNotNull($createdMaritimeAdministration['id'], 'Created MaritimeAdministration must have id specified');
        $this->assertNotNull(MaritimeAdministration::find($createdMaritimeAdministration['id']), 'MaritimeAdministration with given id must be in DB');
        $this->assertModelData($maritimeAdministration, $createdMaritimeAdministration);
    }

    /**
     * @test read
     */
    public function test_read_maritime_administration()
    {
        $maritimeAdministration = MaritimeAdministration::factory()->create();

        $dbMaritimeAdministration = $this->maritimeAdministrationRepo->find($maritimeAdministration->id);

        $dbMaritimeAdministration = $dbMaritimeAdministration->toArray();
        $this->assertModelData($maritimeAdministration->toArray(), $dbMaritimeAdministration);
    }

    /**
     * @test update
     */
    public function test_update_maritime_administration()
    {
        $maritimeAdministration = MaritimeAdministration::factory()->create();
        $fakeMaritimeAdministration = MaritimeAdministration::factory()->make()->toArray();

        $updatedMaritimeAdministration = $this->maritimeAdministrationRepo->update($fakeMaritimeAdministration, $maritimeAdministration->id);

        $this->assertModelData($fakeMaritimeAdministration, $updatedMaritimeAdministration->toArray());
        $dbMaritimeAdministration = $this->maritimeAdministrationRepo->find($maritimeAdministration->id);
        $this->assertModelData($fakeMaritimeAdministration, $dbMaritimeAdministration->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_maritime_administration()
    {
        $maritimeAdministration = MaritimeAdministration::factory()->create();

        $resp = $this->maritimeAdministrationRepo->delete($maritimeAdministration->id);

        $this->assertTrue($resp);
        $this->assertNull(MaritimeAdministration::find($maritimeAdministration->id), 'MaritimeAdministration should not exist in DB');
    }
}
