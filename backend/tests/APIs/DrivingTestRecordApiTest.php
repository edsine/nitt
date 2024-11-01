<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\DrivingTestRecord;

class DrivingTestRecordApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_driving_test_record()
    {
        $drivingTestRecord = DrivingTestRecord::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/driving_test_records', $drivingTestRecord
        );

        $this->assertApiResponse($drivingTestRecord);
    }

    /**
     * @test
     */
    public function test_read_driving_test_record()
    {
        $drivingTestRecord = DrivingTestRecord::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/driving_test_records/'.$drivingTestRecord->id
        );

        $this->assertApiResponse($drivingTestRecord->toArray());
    }

    /**
     * @test
     */
    public function test_update_driving_test_record()
    {
        $drivingTestRecord = DrivingTestRecord::factory()->create();
        $editedDrivingTestRecord = DrivingTestRecord::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/driving_test_records/'.$drivingTestRecord->id,
            $editedDrivingTestRecord
        );

        $this->assertApiResponse($editedDrivingTestRecord);
    }

    /**
     * @test
     */
    public function test_delete_driving_test_record()
    {
        $drivingTestRecord = DrivingTestRecord::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/driving_test_records/'.$drivingTestRecord->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/driving_test_records/'.$drivingTestRecord->id
        );

        $this->response->assertStatus(404);
    }
}
