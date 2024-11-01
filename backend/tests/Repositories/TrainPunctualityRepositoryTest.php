<?php namespace Tests\Repositories;

use App\Models\TrainPunctuality;
use App\Repositories\TrainPunctualityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TrainPunctualityRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TrainPunctualityRepository
     */
    protected $trainPunctualityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->trainPunctualityRepo = \App::make(TrainPunctualityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_train_punctuality()
    {
        $trainPunctuality = TrainPunctuality::factory()->make()->toArray();

        $createdTrainPunctuality = $this->trainPunctualityRepo->create($trainPunctuality);

        $createdTrainPunctuality = $createdTrainPunctuality->toArray();
        $this->assertArrayHasKey('id', $createdTrainPunctuality);
        $this->assertNotNull($createdTrainPunctuality['id'], 'Created TrainPunctuality must have id specified');
        $this->assertNotNull(TrainPunctuality::find($createdTrainPunctuality['id']), 'TrainPunctuality with given id must be in DB');
        $this->assertModelData($trainPunctuality, $createdTrainPunctuality);
    }

    /**
     * @test read
     */
    public function test_read_train_punctuality()
    {
        $trainPunctuality = TrainPunctuality::factory()->create();

        $dbTrainPunctuality = $this->trainPunctualityRepo->find($trainPunctuality->id);

        $dbTrainPunctuality = $dbTrainPunctuality->toArray();
        $this->assertModelData($trainPunctuality->toArray(), $dbTrainPunctuality);
    }

    /**
     * @test update
     */
    public function test_update_train_punctuality()
    {
        $trainPunctuality = TrainPunctuality::factory()->create();
        $fakeTrainPunctuality = TrainPunctuality::factory()->make()->toArray();

        $updatedTrainPunctuality = $this->trainPunctualityRepo->update($fakeTrainPunctuality, $trainPunctuality->id);

        $this->assertModelData($fakeTrainPunctuality, $updatedTrainPunctuality->toArray());
        $dbTrainPunctuality = $this->trainPunctualityRepo->find($trainPunctuality->id);
        $this->assertModelData($fakeTrainPunctuality, $dbTrainPunctuality->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_train_punctuality()
    {
        $trainPunctuality = TrainPunctuality::factory()->create();

        $resp = $this->trainPunctualityRepo->delete($trainPunctuality->id);

        $this->assertTrue($resp);
        $this->assertNull(TrainPunctuality::find($trainPunctuality->id), 'TrainPunctuality should not exist in DB');
    }
}
