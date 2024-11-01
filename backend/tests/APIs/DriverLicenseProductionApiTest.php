<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\DriverLicenseProduction;

class DriverLicenseProductionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_driver_license_production()
    {
        $driverLicenseProduction = DriverLicenseProduction::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/driver_license_productions', $driverLicenseProduction
        );

        $this->assertApiResponse($driverLicenseProduction);
    }

    /**
     * @test
     */
    public function test_read_driver_license_production()
    {
        $driverLicenseProduction = DriverLicenseProduction::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/driver_license_productions/'.$driverLicenseProduction->id
        );

        $this->assertApiResponse($driverLicenseProduction->toArray());
    }

    /**
     * @test
     */
    public function test_update_driver_license_production()
    {
        $driverLicenseProduction = DriverLicenseProduction::factory()->create();
        $editedDriverLicenseProduction = DriverLicenseProduction::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/driver_license_productions/'.$driverLicenseProduction->id,
            $editedDriverLicenseProduction
        );

        $this->assertApiResponse($editedDriverLicenseProduction);
    }

    /**
     * @test
     */
    public function test_delete_driver_license_production()
    {
        $driverLicenseProduction = DriverLicenseProduction::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/driver_license_productions/'.$driverLicenseProduction->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/driver_license_productions/'.$driverLicenseProduction->id
        );

        $this->response->assertStatus(404);
    }
}
