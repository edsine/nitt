<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TrainPunctuality;

class TrainPunctualityApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_train_punctuality()
    {
        $trainPunctuality = TrainPunctuality::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/train_punctualities', $trainPunctuality
        );

        $this->assertApiResponse($trainPunctuality);
    }

    /**
     * @test
     */
    public function test_read_train_punctuality()
    {
        $trainPunctuality = TrainPunctuality::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/train_punctualities/'.$trainPunctuality->id
        );

        $this->assertApiResponse($trainPunctuality->toArray());
    }

    /**
     * @test
     */
    public function test_update_train_punctuality()
    {
        $trainPunctuality = TrainPunctuality::factory()->create();
        $editedTrainPunctuality = TrainPunctuality::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/train_punctualities/'.$trainPunctuality->id,
            $editedTrainPunctuality
        );

        $this->assertApiResponse($editedTrainPunctuality);
    }

    /**
     * @test
     */
    public function test_delete_train_punctuality()
    {
        $trainPunctuality = TrainPunctuality::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/train_punctualities/'.$trainPunctuality->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/train_punctualities/'.$trainPunctuality->id
        );

        $this->response->assertStatus(404);
    }
}
