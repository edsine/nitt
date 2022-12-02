<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Sample;

class SampleApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sample()
    {
        $sample = Sample::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/samples', $sample
        );

        $this->assertApiResponse($sample);
    }

    /**
     * @test
     */
    public function test_read_sample()
    {
        $sample = Sample::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/samples/'.$sample->id
        );

        $this->assertApiResponse($sample->toArray());
    }

    /**
     * @test
     */
    public function test_update_sample()
    {
        $sample = Sample::factory()->create();
        $editedSample = Sample::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/samples/'.$sample->id,
            $editedSample
        );

        $this->assertApiResponse($editedSample);
    }

    /**
     * @test
     */
    public function test_delete_sample()
    {
        $sample = Sample::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/samples/'.$sample->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/samples/'.$sample->id
        );

        $this->response->assertStatus(404);
    }
}
