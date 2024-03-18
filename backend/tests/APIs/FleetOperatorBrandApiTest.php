<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\FleetOperatorBrand;

class FleetOperatorBrandApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_fleet_operator_brand()
    {
        $fleetOperatorBrand = FleetOperatorBrand::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/fleet_operator_brands', $fleetOperatorBrand
        );

        $this->assertApiResponse($fleetOperatorBrand);
    }

    /**
     * @test
     */
    public function test_read_fleet_operator_brand()
    {
        $fleetOperatorBrand = FleetOperatorBrand::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/fleet_operator_brands/'.$fleetOperatorBrand->id
        );

        $this->assertApiResponse($fleetOperatorBrand->toArray());
    }

    /**
     * @test
     */
    public function test_update_fleet_operator_brand()
    {
        $fleetOperatorBrand = FleetOperatorBrand::factory()->create();
        $editedFleetOperatorBrand = FleetOperatorBrand::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/fleet_operator_brands/'.$fleetOperatorBrand->id,
            $editedFleetOperatorBrand
        );

        $this->assertApiResponse($editedFleetOperatorBrand);
    }

    /**
     * @test
     */
    public function test_delete_fleet_operator_brand()
    {
        $fleetOperatorBrand = FleetOperatorBrand::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/fleet_operator_brands/'.$fleetOperatorBrand->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/fleet_operator_brands/'.$fleetOperatorBrand->id
        );

        $this->response->assertStatus(404);
    }
}
