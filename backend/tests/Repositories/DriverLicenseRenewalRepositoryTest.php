<?php namespace Tests\Repositories;

use App\Models\DriverLicenseRenewal;
use App\Repositories\DriverLicenseRenewalRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DriverLicenseRenewalRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DriverLicenseRenewalRepository
     */
    protected $driverLicenseRenewalRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->driverLicenseRenewalRepo = \App::make(DriverLicenseRenewalRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_driver_license_renewal()
    {
        $driverLicenseRenewal = DriverLicenseRenewal::factory()->make()->toArray();

        $createdDriverLicenseRenewal = $this->driverLicenseRenewalRepo->create($driverLicenseRenewal);

        $createdDriverLicenseRenewal = $createdDriverLicenseRenewal->toArray();
        $this->assertArrayHasKey('id', $createdDriverLicenseRenewal);
        $this->assertNotNull($createdDriverLicenseRenewal['id'], 'Created DriverLicenseRenewal must have id specified');
        $this->assertNotNull(DriverLicenseRenewal::find($createdDriverLicenseRenewal['id']), 'DriverLicenseRenewal with given id must be in DB');
        $this->assertModelData($driverLicenseRenewal, $createdDriverLicenseRenewal);
    }

    /**
     * @test read
     */
    public function test_read_driver_license_renewal()
    {
        $driverLicenseRenewal = DriverLicenseRenewal::factory()->create();

        $dbDriverLicenseRenewal = $this->driverLicenseRenewalRepo->find($driverLicenseRenewal->id);

        $dbDriverLicenseRenewal = $dbDriverLicenseRenewal->toArray();
        $this->assertModelData($driverLicenseRenewal->toArray(), $dbDriverLicenseRenewal);
    }

    /**
     * @test update
     */
    public function test_update_driver_license_renewal()
    {
        $driverLicenseRenewal = DriverLicenseRenewal::factory()->create();
        $fakeDriverLicenseRenewal = DriverLicenseRenewal::factory()->make()->toArray();

        $updatedDriverLicenseRenewal = $this->driverLicenseRenewalRepo->update($fakeDriverLicenseRenewal, $driverLicenseRenewal->id);

        $this->assertModelData($fakeDriverLicenseRenewal, $updatedDriverLicenseRenewal->toArray());
        $dbDriverLicenseRenewal = $this->driverLicenseRenewalRepo->find($driverLicenseRenewal->id);
        $this->assertModelData($fakeDriverLicenseRenewal, $dbDriverLicenseRenewal->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_driver_license_renewal()
    {
        $driverLicenseRenewal = DriverLicenseRenewal::factory()->create();

        $resp = $this->driverLicenseRenewalRepo->delete($driverLicenseRenewal->id);

        $this->assertTrue($resp);
        $this->assertNull(DriverLicenseRenewal::find($driverLicenseRenewal->id), 'DriverLicenseRenewal should not exist in DB');
    }
}
