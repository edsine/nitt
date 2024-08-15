<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TrafficOffence;

class TrafficOffenceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_traffic_offence()
    {
        $trafficOffence = TrafficOffence::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/traffic_offences', $trafficOffence
        );

        $this->assertApiResponse($trafficOffence);
    }

    /**
     * @test
     */
    public function test_read_traffic_offence()
    {
        $trafficOffence = TrafficOffence::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/traffic_offences/'.$trafficOffence->id
        );

        $this->assertApiResponse($trafficOffence->toArray());
    }

    /**
     * @test
     */
    public function test_update_traffic_offence()
    {
        $trafficOffence = TrafficOffence::factory()->create();
        $editedTrafficOffence = TrafficOffence::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/traffic_offences/'.$trafficOffence->id,
            $editedTrafficOffence
        );

        $this->assertApiResponse($editedTrafficOffence);
    }

    /**
     * @test
     */
    public function test_delete_traffic_offence()
    {
        $trafficOffence = TrafficOffence::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/traffic_offences/'.$trafficOffence->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/traffic_offences/'.$trafficOffence->id
        );

        $this->response->assertStatus(404);
    }
}
