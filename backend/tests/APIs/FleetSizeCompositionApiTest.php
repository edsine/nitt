<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\FleetSizeComposition;

class FleetSizeCompositionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_fleet_size_composition()
    {
        $fleetSizeComposition = FleetSizeComposition::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/fleet_size_compositions', $fleetSizeComposition
        );

        $this->assertApiResponse($fleetSizeComposition);
    }

    /**
     * @test
     */
    public function test_read_fleet_size_composition()
    {
        $fleetSizeComposition = FleetSizeComposition::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/fleet_size_compositions/'.$fleetSizeComposition->id
        );

        $this->assertApiResponse($fleetSizeComposition->toArray());
    }

    /**
     * @test
     */
    public function test_update_fleet_size_composition()
    {
        $fleetSizeComposition = FleetSizeComposition::factory()->create();
        $editedFleetSizeComposition = FleetSizeComposition::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/fleet_size_compositions/'.$fleetSizeComposition->id,
            $editedFleetSizeComposition
        );

        $this->assertApiResponse($editedFleetSizeComposition);
    }

    /**
     * @test
     */
    public function test_delete_fleet_size_composition()
    {
        $fleetSizeComposition = FleetSizeComposition::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/fleet_size_compositions/'.$fleetSizeComposition->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/fleet_size_compositions/'.$fleetSizeComposition->id
        );

        $this->response->assertStatus(404);
    }
}
