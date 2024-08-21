<?php namespace Tests\Repositories;

use App\Models\MaritimeAcademy;
use App\Repositories\MaritimeAcademyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MaritimeAcademyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MaritimeAcademyRepository
     */
    protected $maritimeAcademyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->maritimeAcademyRepo = \App::make(MaritimeAcademyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_maritime_academy()
    {
        $maritimeAcademy = MaritimeAcademy::factory()->make()->toArray();

        $createdMaritimeAcademy = $this->maritimeAcademyRepo->create($maritimeAcademy);

        $createdMaritimeAcademy = $createdMaritimeAcademy->toArray();
        $this->assertArrayHasKey('id', $createdMaritimeAcademy);
        $this->assertNotNull($createdMaritimeAcademy['id'], 'Created MaritimeAcademy must have id specified');
        $this->assertNotNull(MaritimeAcademy::find($createdMaritimeAcademy['id']), 'MaritimeAcademy with given id must be in DB');
        $this->assertModelData($maritimeAcademy, $createdMaritimeAcademy);
    }

    /**
     * @test read
     */
    public function test_read_maritime_academy()
    {
        $maritimeAcademy = MaritimeAcademy::factory()->create();

        $dbMaritimeAcademy = $this->maritimeAcademyRepo->find($maritimeAcademy->id);

        $dbMaritimeAcademy = $dbMaritimeAcademy->toArray();
        $this->assertModelData($maritimeAcademy->toArray(), $dbMaritimeAcademy);
    }

    /**
     * @test update
     */
    public function test_update_maritime_academy()
    {
        $maritimeAcademy = MaritimeAcademy::factory()->create();
        $fakeMaritimeAcademy = MaritimeAcademy::factory()->make()->toArray();

        $updatedMaritimeAcademy = $this->maritimeAcademyRepo->update($fakeMaritimeAcademy, $maritimeAcademy->id);

        $this->assertModelData($fakeMaritimeAcademy, $updatedMaritimeAcademy->toArray());
        $dbMaritimeAcademy = $this->maritimeAcademyRepo->find($maritimeAcademy->id);
        $this->assertModelData($fakeMaritimeAcademy, $dbMaritimeAcademy->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_maritime_academy()
    {
        $maritimeAcademy = MaritimeAcademy::factory()->create();

        $resp = $this->maritimeAcademyRepo->delete($maritimeAcademy->id);

        $this->assertTrue($resp);
        $this->assertNull(MaritimeAcademy::find($maritimeAcademy->id), 'MaritimeAcademy should not exist in DB');
    }
}
