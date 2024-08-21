<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\RailwaySafety;

class RailwaySafetyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_railway_safety()
    {
        $railwaySafety = RailwaySafety::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/railway_safeties', $railwaySafety
        );

        $this->assertApiResponse($railwaySafety);
    }

    /**
     * @test
     */
    public function test_read_railway_safety()
    {
        $railwaySafety = RailwaySafety::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/railway_safeties/'.$railwaySafety->id
        );

        $this->assertApiResponse($railwaySafety->toArray());
    }

    /**
     * @test
     */
    public function test_update_railway_safety()
    {
        $railwaySafety = RailwaySafety::factory()->create();
        $editedRailwaySafety = RailwaySafety::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/railway_safeties/'.$railwaySafety->id,
            $editedRailwaySafety
        );

        $this->assertApiResponse($editedRailwaySafety);
    }

    /**
     * @test
     */
    public function test_delete_railway_safety()
    {
        $railwaySafety = RailwaySafety::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/railway_safeties/'.$railwaySafety->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/railway_safeties/'.$railwaySafety->id
        );

        $this->response->assertStatus(404);
    }
}
