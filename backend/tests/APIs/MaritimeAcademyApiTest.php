<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MaritimeAcademy;

class MaritimeAcademyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_maritime_academy()
    {
        $maritimeAcademy = MaritimeAcademy::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/maritime_academies', $maritimeAcademy
        );

        $this->assertApiResponse($maritimeAcademy);
    }

    /**
     * @test
     */
    public function test_read_maritime_academy()
    {
        $maritimeAcademy = MaritimeAcademy::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/maritime_academies/'.$maritimeAcademy->id
        );

        $this->assertApiResponse($maritimeAcademy->toArray());
    }

    /**
     * @test
     */
    public function test_update_maritime_academy()
    {
        $maritimeAcademy = MaritimeAcademy::factory()->create();
        $editedMaritimeAcademy = MaritimeAcademy::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/maritime_academies/'.$maritimeAcademy->id,
            $editedMaritimeAcademy
        );

        $this->assertApiResponse($editedMaritimeAcademy);
    }

    /**
     * @test
     */
    public function test_delete_maritime_academy()
    {
        $maritimeAcademy = MaritimeAcademy::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/maritime_academies/'.$maritimeAcademy->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/maritime_academies/'.$maritimeAcademy->id
        );

        $this->response->assertStatus(404);
    }
}
