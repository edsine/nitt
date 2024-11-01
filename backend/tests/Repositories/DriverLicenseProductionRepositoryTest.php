<?php namespace Tests\Repositories;

use App\Models\DriverLicenseProduction;
use App\Repositories\DriverLicenseProductionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DriverLicenseProductionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DriverLicenseProductionRepository
     */
    protected $driverLicenseProductionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->driverLicenseProductionRepo = \App::make(DriverLicenseProductionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_driver_license_production()
    {
        $driverLicenseProduction = DriverLicenseProduction::factory()->make()->toArray();

        $createdDriverLicenseProduction = $this->driverLicenseProductionRepo->create($driverLicenseProduction);

        $createdDriverLicenseProduction = $createdDriverLicenseProduction->toArray();
        $this->assertArrayHasKey('id', $createdDriverLicenseProduction);
        $this->assertNotNull($createdDriverLicenseProduction['id'], 'Created DriverLicenseProduction must have id specified');
        $this->assertNotNull(DriverLicenseProduction::find($createdDriverLicenseProduction['id']), 'DriverLicenseProduction with given id must be in DB');
        $this->assertModelData($driverLicenseProduction, $createdDriverLicenseProduction);
    }

    /**
     * @test read
     */
    public function test_read_driver_license_production()
    {
        $driverLicenseProduction = DriverLicenseProduction::factory()->create();

        $dbDriverLicenseProduction = $this->driverLicenseProductionRepo->find($driverLicenseProduction->id);

        $dbDriverLicenseProduction = $dbDriverLicenseProduction->toArray();
        $this->assertModelData($driverLicenseProduction->toArray(), $dbDriverLicenseProduction);
    }

    /**
     * @test update
     */
    public function test_update_driver_license_production()
    {
        $driverLicenseProduction = DriverLicenseProduction::factory()->create();
        $fakeDriverLicenseProduction = DriverLicenseProduction::factory()->make()->toArray();

        $updatedDriverLicenseProduction = $this->driverLicenseProductionRepo->update($fakeDriverLicenseProduction, $driverLicenseProduction->id);

        $this->assertModelData($fakeDriverLicenseProduction, $updatedDriverLicenseProduction->toArray());
        $dbDriverLicenseProduction = $this->driverLicenseProductionRepo->find($driverLicenseProduction->id);
        $this->assertModelData($fakeDriverLicenseProduction, $dbDriverLicenseProduction->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_driver_license_production()
    {
        $driverLicenseProduction = DriverLicenseProduction::factory()->create();

        $resp = $this->driverLicenseProductionRepo->delete($driverLicenseProduction->id);

        $this->assertTrue($resp);
        $this->assertNull(DriverLicenseProduction::find($driverLicenseProduction->id), 'DriverLicenseProduction should not exist in DB');
    }
}
