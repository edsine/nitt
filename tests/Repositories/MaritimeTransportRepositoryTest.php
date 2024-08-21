<?php namespace Tests\Repositories;

use App\Models\MaritimeTransport;
use App\Repositories\MaritimeTransportRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MaritimeTransportRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MaritimeTransportRepository
     */
    protected $maritimeTransportRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->maritimeTransportRepo = \App::make(MaritimeTransportRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_maritime_transport()
    {
        $maritimeTransport = MaritimeTransport::factory()->make()->toArray();

        $createdMaritimeTransport = $this->maritimeTransportRepo->create($maritimeTransport);

        $createdMaritimeTransport = $createdMaritimeTransport->toArray();
        $this->assertArrayHasKey('id', $createdMaritimeTransport);
        $this->assertNotNull($createdMaritimeTransport['id'], 'Created MaritimeTransport must have id specified');
        $this->assertNotNull(MaritimeTransport::find($createdMaritimeTransport['id']), 'MaritimeTransport with given id must be in DB');
        $this->assertModelData($maritimeTransport, $createdMaritimeTransport);
    }

    /**
     * @test read
     */
    public function test_read_maritime_transport()
    {
        $maritimeTransport = MaritimeTransport::factory()->create();

        $dbMaritimeTransport = $this->maritimeTransportRepo->find($maritimeTransport->id);

        $dbMaritimeTransport = $dbMaritimeTransport->toArray();
        $this->assertModelData($maritimeTransport->toArray(), $dbMaritimeTransport);
    }

    /**
     * @test update
     */
    public function test_update_maritime_transport()
    {
        $maritimeTransport = MaritimeTransport::factory()->create();
        $fakeMaritimeTransport = MaritimeTransport::factory()->make()->toArray();

        $updatedMaritimeTransport = $this->maritimeTransportRepo->update($fakeMaritimeTransport, $maritimeTransport->id);

        $this->assertModelData($fakeMaritimeTransport, $updatedMaritimeTransport->toArray());
        $dbMaritimeTransport = $this->maritimeTransportRepo->find($maritimeTransport->id);
        $this->assertModelData($fakeMaritimeTransport, $dbMaritimeTransport->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_maritime_transport()
    {
        $maritimeTransport = MaritimeTransport::factory()->create();

        $resp = $this->maritimeTransportRepo->delete($maritimeTransport->id);

        $this->assertTrue($resp);
        $this->assertNull(MaritimeTransport::find($maritimeTransport->id), 'MaritimeTransport should not exist in DB');
    }
}
