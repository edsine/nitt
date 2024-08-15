<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MaritimeAdministration;

class MaritimeAdministrationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_maritime_administration()
    {
        $maritimeAdministration = MaritimeAdministration::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/maritime_administrations', $maritimeAdministration
        );

        $this->assertApiResponse($maritimeAdministration);
    }

    /**
     * @test
     */
    public function test_read_maritime_administration()
    {
        $maritimeAdministration = MaritimeAdministration::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/maritime_administrations/'.$maritimeAdministration->id
        );

        $this->assertApiResponse($maritimeAdministration->toArray());
    }

    /**
     * @test
     */
    public function test_update_maritime_administration()
    {
        $maritimeAdministration = MaritimeAdministration::factory()->create();
        $editedMaritimeAdministration = MaritimeAdministration::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/maritime_administrations/'.$maritimeAdministration->id,
            $editedMaritimeAdministration
        );

        $this->assertApiResponse($editedMaritimeAdministration);
    }

    /**
     * @test
     */
    public function test_delete_maritime_administration()
    {
        $maritimeAdministration = MaritimeAdministration::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/maritime_administrations/'.$maritimeAdministration->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/maritime_administrations/'.$maritimeAdministration->id
        );

        $this->response->assertStatus(404);
    }
}
