<?php namespace Tests\Repositories;

use App\Models\LicenseRenewal;
use App\Repositories\LicenseRenewalRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LicenseRenewalRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LicenseRenewalRepository
     */
    protected $licenseRenewalRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->licenseRenewalRepo = \App::make(LicenseRenewalRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_license_renewal()
    {
        $licenseRenewal = LicenseRenewal::factory()->make()->toArray();

        $createdLicenseRenewal = $this->licenseRenewalRepo->create($licenseRenewal);

        $createdLicenseRenewal = $createdLicenseRenewal->toArray();
        $this->assertArrayHasKey('id', $createdLicenseRenewal);
        $this->assertNotNull($createdLicenseRenewal['id'], 'Created LicenseRenewal must have id specified');
        $this->assertNotNull(LicenseRenewal::find($createdLicenseRenewal['id']), 'LicenseRenewal with given id must be in DB');
        $this->assertModelData($licenseRenewal, $createdLicenseRenewal);
    }

    /**
     * @test read
     */
    public function test_read_license_renewal()
    {
        $licenseRenewal = LicenseRenewal::factory()->create();

        $dbLicenseRenewal = $this->licenseRenewalRepo->find($licenseRenewal->id);

        $dbLicenseRenewal = $dbLicenseRenewal->toArray();
        $this->assertModelData($licenseRenewal->toArray(), $dbLicenseRenewal);
    }

    /**
     * @test update
     */
    public function test_update_license_renewal()
    {
        $licenseRenewal = LicenseRenewal::factory()->create();
        $fakeLicenseRenewal = LicenseRenewal::factory()->make()->toArray();

        $updatedLicenseRenewal = $this->licenseRenewalRepo->update($fakeLicenseRenewal, $licenseRenewal->id);

        $this->assertModelData($fakeLicenseRenewal, $updatedLicenseRenewal->toArray());
        $dbLicenseRenewal = $this->licenseRenewalRepo->find($licenseRenewal->id);
        $this->assertModelData($fakeLicenseRenewal, $dbLicenseRenewal->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_license_renewal()
    {
        $licenseRenewal = LicenseRenewal::factory()->create();

        $resp = $this->licenseRenewalRepo->delete($licenseRenewal->id);

        $this->assertTrue($resp);
        $this->assertNull(LicenseRenewal::find($licenseRenewal->id), 'LicenseRenewal should not exist in DB');
    }
}
