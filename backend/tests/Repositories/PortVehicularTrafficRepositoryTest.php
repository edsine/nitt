<?php namespace Tests\Repositories;

use App\Models\PortVehicularTraffic;
use App\Repositories\PortVehicularTrafficRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PortVehicularTrafficRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PortVehicularTrafficRepository
     */
    protected $portVehicularTrafficRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->portVehicularTrafficRepo = \App::make(PortVehicularTrafficRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_port_vehicular_traffic()
    {
        $portVehicularTraffic = PortVehicularTraffic::factory()->make()->toArray();

        $createdPortVehicularTraffic = $this->portVehicularTrafficRepo->create($portVehicularTraffic);

        $createdPortVehicularTraffic = $createdPortVehicularTraffic->toArray();
        $this->assertArrayHasKey('id', $createdPortVehicularTraffic);
        $this->assertNotNull($createdPortVehicularTraffic['id'], 'Created PortVehicularTraffic must have id specified');
        $this->assertNotNull(PortVehicularTraffic::find($createdPortVehicularTraffic['id']), 'PortVehicularTraffic with given id must be in DB');
        $this->assertModelData($portVehicularTraffic, $createdPortVehicularTraffic);
    }

    /**
     * @test read
     */
    public function test_read_port_vehicular_traffic()
    {
        $portVehicularTraffic = PortVehicularTraffic::factory()->create();

        $dbPortVehicularTraffic = $this->portVehicularTrafficRepo->find($portVehicularTraffic->id);

        $dbPortVehicularTraffic = $dbPortVehicularTraffic->toArray();
        $this->assertModelData($portVehicularTraffic->toArray(), $dbPortVehicularTraffic);
    }

    /**
     * @test update
     */
    public function test_update_port_vehicular_traffic()
    {
        $portVehicularTraffic = PortVehicularTraffic::factory()->create();
        $fakePortVehicularTraffic = PortVehicularTraffic::factory()->make()->toArray();

        $updatedPortVehicularTraffic = $this->portVehicularTrafficRepo->update($fakePortVehicularTraffic, $portVehicularTraffic->id);

        $this->assertModelData($fakePortVehicularTraffic, $updatedPortVehicularTraffic->toArray());
        $dbPortVehicularTraffic = $this->portVehicularTrafficRepo->find($portVehicularTraffic->id);
        $this->assertModelData($fakePortVehicularTraffic, $dbPortVehicularTraffic->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_port_vehicular_traffic()
    {
        $portVehicularTraffic = PortVehicularTraffic::factory()->create();

        $resp = $this->portVehicularTrafficRepo->delete($portVehicularTraffic->id);

        $this->assertTrue($resp);
        $this->assertNull(PortVehicularTraffic::find($portVehicularTraffic->id), 'PortVehicularTraffic should not exist in DB');
    }
}
