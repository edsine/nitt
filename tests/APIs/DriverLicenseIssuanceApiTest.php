<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\DriverLicenseIssuance;

class DriverLicenseIssuanceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_driver_license_issuance()
    {
        $driverLicenseIssuance = DriverLicenseIssuance::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/driver_license_issuances', $driverLicenseIssuance
        );

        $this->assertApiResponse($driverLicenseIssuance);
    }

    /**
     * @test
     */
    public function test_read_driver_license_issuance()
    {
        $driverLicenseIssuance = DriverLicenseIssuance::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/driver_license_issuances/'.$driverLicenseIssuance->id
        );

        $this->assertApiResponse($driverLicenseIssuance->toArray());
    }

    /**
     * @test
     */
    public function test_update_driver_license_issuance()
    {
        $driverLicenseIssuance = DriverLicenseIssuance::factory()->create();
        $editedDriverLicenseIssuance = DriverLicenseIssuance::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/driver_license_issuances/'.$driverLicenseIssuance->id,
            $editedDriverLicenseIssuance
        );

        $this->assertApiResponse($editedDriverLicenseIssuance);
    }

    /**
     * @test
     */
    public function test_delete_driver_license_issuance()
    {
        $driverLicenseIssuance = DriverLicenseIssuance::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/driver_license_issuances/'.$driverLicenseIssuance->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/driver_license_issuances/'.$driverLicenseIssuance->id
        );

        $this->response->assertStatus(404);
    }
}
