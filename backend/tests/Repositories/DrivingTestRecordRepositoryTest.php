<?php namespace Tests\Repositories;

use App\Models\DrivingTestRecord;
use App\Repositories\DrivingTestRecordRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DrivingTestRecordRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DrivingTestRecordRepository
     */
    protected $drivingTestRecordRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->drivingTestRecordRepo = \App::make(DrivingTestRecordRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_driving_test_record()
    {
        $drivingTestRecord = DrivingTestRecord::factory()->make()->toArray();

        $createdDrivingTestRecord = $this->drivingTestRecordRepo->create($drivingTestRecord);

        $createdDrivingTestRecord = $createdDrivingTestRecord->toArray();
        $this->assertArrayHasKey('id', $createdDrivingTestRecord);
        $this->assertNotNull($createdDrivingTestRecord['id'], 'Created DrivingTestRecord must have id specified');
        $this->assertNotNull(DrivingTestRecord::find($createdDrivingTestRecord['id']), 'DrivingTestRecord with given id must be in DB');
        $this->assertModelData($drivingTestRecord, $createdDrivingTestRecord);
    }

    /**
     * @test read
     */
    public function test_read_driving_test_record()
    {
        $drivingTestRecord = DrivingTestRecord::factory()->create();

        $dbDrivingTestRecord = $this->drivingTestRecordRepo->find($drivingTestRecord->id);

        $dbDrivingTestRecord = $dbDrivingTestRecord->toArray();
        $this->assertModelData($drivingTestRecord->toArray(), $dbDrivingTestRecord);
    }

    /**
     * @test update
     */
    public function test_update_driving_test_record()
    {
        $drivingTestRecord = DrivingTestRecord::factory()->create();
        $fakeDrivingTestRecord = DrivingTestRecord::factory()->make()->toArray();

        $updatedDrivingTestRecord = $this->drivingTestRecordRepo->update($fakeDrivingTestRecord, $drivingTestRecord->id);

        $this->assertModelData($fakeDrivingTestRecord, $updatedDrivingTestRecord->toArray());
        $dbDrivingTestRecord = $this->drivingTestRecordRepo->find($drivingTestRecord->id);
        $this->assertModelData($fakeDrivingTestRecord, $dbDrivingTestRecord->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_driving_test_record()
    {
        $drivingTestRecord = DrivingTestRecord::factory()->create();

        $resp = $this->drivingTestRecordRepo->delete($drivingTestRecord->id);

        $this->assertTrue($resp);
        $this->assertNull(DrivingTestRecord::find($drivingTestRecord->id), 'DrivingTestRecord should not exist in DB');
    }
}
