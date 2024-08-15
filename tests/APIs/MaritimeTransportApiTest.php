<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MaritimeTransport;

class MaritimeTransportApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_maritime_transport()
    {
        $maritimeTransport = MaritimeTransport::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/maritime_transports', $maritimeTransport
        );

        $this->assertApiResponse($maritimeTransport);
    }

    /**
     * @test
     */
    public function test_read_maritime_transport()
    {
        $maritimeTransport = MaritimeTransport::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/maritime_transports/'.$maritimeTransport->id
        );

        $this->assertApiResponse($maritimeTransport->toArray());
    }

    /**
     * @test
     */
    public function test_update_maritime_transport()
    {
        $maritimeTransport = MaritimeTransport::factory()->create();
        $editedMaritimeTransport = MaritimeTransport::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/maritime_transports/'.$maritimeTransport->id,
            $editedMaritimeTransport
        );

        $this->assertApiResponse($editedMaritimeTransport);
    }

    /**
     * @test
     */
    public function test_delete_maritime_transport()
    {
        $maritimeTransport = MaritimeTransport::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/maritime_transports/'.$maritimeTransport->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/maritime_transports/'.$maritimeTransport->id
        );

        $this->response->assertStatus(404);
    }
}
