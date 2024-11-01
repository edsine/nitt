<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\DriverLicenseRenewal;

class DriverLicenseRenewalApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_driver_license_renewal()
    {
        $driverLicenseRenewal = DriverLicenseRenewal::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/driver_license_renewals', $driverLicenseRenewal
        );

        $this->assertApiResponse($driverLicenseRenewal);
    }

    /**
     * @test
     */
    public function test_read_driver_license_renewal()
    {
        $driverLicenseRenewal = DriverLicenseRenewal::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/driver_license_renewals/'.$driverLicenseRenewal->id
        );

        $this->assertApiResponse($driverLicenseRenewal->toArray());
    }

    /**
     * @test
     */
    public function test_update_driver_license_renewal()
    {
        $driverLicenseRenewal = DriverLicenseRenewal::factory()->create();
        $editedDriverLicenseRenewal = DriverLicenseRenewal::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/driver_license_renewals/'.$driverLicenseRenewal->id,
            $editedDriverLicenseRenewal
        );

        $this->assertApiResponse($editedDriverLicenseRenewal);
    }

    /**
     * @test
     */
    public function test_delete_driver_license_renewal()
    {
        $driverLicenseRenewal = DriverLicenseRenewal::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/driver_license_renewals/'.$driverLicenseRenewal->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/driver_license_renewals/'.$driverLicenseRenewal->id
        );

        $this->response->assertStatus(404);
    }
}
