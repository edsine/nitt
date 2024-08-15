<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PortVehicularTraffic;

class PortVehicularTrafficApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_port_vehicular_traffic()
    {
        $portVehicularTraffic = PortVehicularTraffic::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/port_vehicular_traffics', $portVehicularTraffic
        );

        $this->assertApiResponse($portVehicularTraffic);
    }

    /**
     * @test
     */
    public function test_read_port_vehicular_traffic()
    {
        $portVehicularTraffic = PortVehicularTraffic::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/port_vehicular_traffics/'.$portVehicularTraffic->id
        );

        $this->assertApiResponse($portVehicularTraffic->toArray());
    }

    /**
     * @test
     */
    public function test_update_port_vehicular_traffic()
    {
        $portVehicularTraffic = PortVehicularTraffic::factory()->create();
        $editedPortVehicularTraffic = PortVehicularTraffic::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/port_vehicular_traffics/'.$portVehicularTraffic->id,
            $editedPortVehicularTraffic
        );

        $this->assertApiResponse($editedPortVehicularTraffic);
    }

    /**
     * @test
     */
    public function test_delete_port_vehicular_traffic()
    {
        $portVehicularTraffic = PortVehicularTraffic::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/port_vehicular_traffics/'.$portVehicularTraffic->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/port_vehicular_traffics/'.$portVehicularTraffic->id
        );

        $this->response->assertStatus(404);
    }
}
