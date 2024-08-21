<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\LicenseRenewal;

class LicenseRenewalApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_license_renewal()
    {
        $licenseRenewal = LicenseRenewal::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/license_renewals', $licenseRenewal
        );

        $this->assertApiResponse($licenseRenewal);
    }

    /**
     * @test
     */
    public function test_read_license_renewal()
    {
        $licenseRenewal = LicenseRenewal::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/license_renewals/'.$licenseRenewal->id
        );

        $this->assertApiResponse($licenseRenewal->toArray());
    }

    /**
     * @test
     */
    public function test_update_license_renewal()
    {
        $licenseRenewal = LicenseRenewal::factory()->create();
        $editedLicenseRenewal = LicenseRenewal::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/license_renewals/'.$licenseRenewal->id,
            $editedLicenseRenewal
        );

        $this->assertApiResponse($editedLicenseRenewal);
    }

    /**
     * @test
     */
    public function test_delete_license_renewal()
    {
        $licenseRenewal = LicenseRenewal::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/license_renewals/'.$licenseRenewal->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/license_renewals/'.$licenseRenewal->id
        );

        $this->response->assertStatus(404);
    }
}
