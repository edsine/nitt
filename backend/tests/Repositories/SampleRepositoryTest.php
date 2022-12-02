<?php namespace Tests\Repositories;

use App\Models\Sample;
use App\Repositories\SampleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SampleRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SampleRepository
     */
    protected $sampleRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->sampleRepo = \App::make(SampleRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sample()
    {
        $sample = Sample::factory()->make()->toArray();

        $createdSample = $this->sampleRepo->create($sample);

        $createdSample = $createdSample->toArray();
        $this->assertArrayHasKey('id', $createdSample);
        $this->assertNotNull($createdSample['id'], 'Created Sample must have id specified');
        $this->assertNotNull(Sample::find($createdSample['id']), 'Sample with given id must be in DB');
        $this->assertModelData($sample, $createdSample);
    }

    /**
     * @test read
     */
    public function test_read_sample()
    {
        $sample = Sample::factory()->create();

        $dbSample = $this->sampleRepo->find($sample->id);

        $dbSample = $dbSample->toArray();
        $this->assertModelData($sample->toArray(), $dbSample);
    }

    /**
     * @test update
     */
    public function test_update_sample()
    {
        $sample = Sample::factory()->create();
        $fakeSample = Sample::factory()->make()->toArray();

        $updatedSample = $this->sampleRepo->update($fakeSample, $sample->id);

        $this->assertModelData($fakeSample, $updatedSample->toArray());
        $dbSample = $this->sampleRepo->find($sample->id);
        $this->assertModelData($fakeSample, $dbSample->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sample()
    {
        $sample = Sample::factory()->create();

        $resp = $this->sampleRepo->delete($sample->id);

        $this->assertTrue($resp);
        $this->assertNull(Sample::find($sample->id), 'Sample should not exist in DB');
    }
}
