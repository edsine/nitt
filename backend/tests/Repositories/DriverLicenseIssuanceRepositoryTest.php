<?php namespace Tests\Repositories;

use App\Models\DriverLicenseIssuance;
use App\Repositories\DriverLicenseIssuanceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DriverLicenseIssuanceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DriverLicenseIssuanceRepository
     */
    protected $driverLicenseIssuanceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->driverLicenseIssuanceRepo = \App::make(DriverLicenseIssuanceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_driver_license_issuance()
    {
        $driverLicenseIssuance = DriverLicenseIssuance::factory()->make()->toArray();

        $createdDriverLicenseIssuance = $this->driverLicenseIssuanceRepo->create($driverLicenseIssuance);

        $createdDriverLicenseIssuance = $createdDriverLicenseIssuance->toArray();
        $this->assertArrayHasKey('id', $createdDriverLicenseIssuance);
        $this->assertNotNull($createdDriverLicenseIssuance['id'], 'Created DriverLicenseIssuance must have id specified');
        $this->assertNotNull(DriverLicenseIssuance::find($createdDriverLicenseIssuance['id']), 'DriverLicenseIssuance with given id must be in DB');
        $this->assertModelData($driverLicenseIssuance, $createdDriverLicenseIssuance);
    }

    /**
     * @test read
     */
    public function test_read_driver_license_issuance()
    {
        $driverLicenseIssuance = DriverLicenseIssuance::factory()->create();

        $dbDriverLicenseIssuance = $this->driverLicenseIssuanceRepo->find($driverLicenseIssuance->id);

        $dbDriverLicenseIssuance = $dbDriverLicenseIssuance->toArray();
        $this->assertModelData($driverLicenseIssuance->toArray(), $dbDriverLicenseIssuance);
    }

    /**
     * @test update
     */
    public function test_update_driver_license_issuance()
    {
        $driverLicenseIssuance = DriverLicenseIssuance::factory()->create();
        $fakeDriverLicenseIssuance = DriverLicenseIssuance::factory()->make()->toArray();

        $updatedDriverLicenseIssuance = $this->driverLicenseIssuanceRepo->update($fakeDriverLicenseIssuance, $driverLicenseIssuance->id);

        $this->assertModelData($fakeDriverLicenseIssuance, $updatedDriverLicenseIssuance->toArray());
        $dbDriverLicenseIssuance = $this->driverLicenseIssuanceRepo->find($driverLicenseIssuance->id);
        $this->assertModelData($fakeDriverLicenseIssuance, $dbDriverLicenseIssuance->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_driver_license_issuance()
    {
        $driverLicenseIssuance = DriverLicenseIssuance::factory()->create();

        $resp = $this->driverLicenseIssuanceRepo->delete($driverLicenseIssuance->id);

        $this->assertTrue($resp);
        $this->assertNull(DriverLicenseIssuance::find($driverLicenseIssuance->id), 'DriverLicenseIssuance should not exist in DB');
    }
}
