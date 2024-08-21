<?php namespace Tests\Repositories;

use App\Models\GrossDomesticProduct;
use App\Repositories\GrossDomesticProductRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class GrossDomesticProductRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var GrossDomesticProductRepository
     */
    protected $grossDomesticProductRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->grossDomesticProductRepo = \App::make(GrossDomesticProductRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_gross_domestic_product()
    {
        $grossDomesticProduct = GrossDomesticProduct::factory()->make()->toArray();

        $createdGrossDomesticProduct = $this->grossDomesticProductRepo->create($grossDomesticProduct);

        $createdGrossDomesticProduct = $createdGrossDomesticProduct->toArray();
        $this->assertArrayHasKey('id', $createdGrossDomesticProduct);
        $this->assertNotNull($createdGrossDomesticProduct['id'], 'Created GrossDomesticProduct must have id specified');
        $this->assertNotNull(GrossDomesticProduct::find($createdGrossDomesticProduct['id']), 'GrossDomesticProduct with given id must be in DB');
        $this->assertModelData($grossDomesticProduct, $createdGrossDomesticProduct);
    }

    /**
     * @test read
     */
    public function test_read_gross_domestic_product()
    {
        $grossDomesticProduct = GrossDomesticProduct::factory()->create();

        $dbGrossDomesticProduct = $this->grossDomesticProductRepo->find($grossDomesticProduct->id);

        $dbGrossDomesticProduct = $dbGrossDomesticProduct->toArray();
        $this->assertModelData($grossDomesticProduct->toArray(), $dbGrossDomesticProduct);
    }

    /**
     * @test update
     */
    public function test_update_gross_domestic_product()
    {
        $grossDomesticProduct = GrossDomesticProduct::factory()->create();
        $fakeGrossDomesticProduct = GrossDomesticProduct::factory()->make()->toArray();

        $updatedGrossDomesticProduct = $this->grossDomesticProductRepo->update($fakeGrossDomesticProduct, $grossDomesticProduct->id);

        $this->assertModelData($fakeGrossDomesticProduct, $updatedGrossDomesticProduct->toArray());
        $dbGrossDomesticProduct = $this->grossDomesticProductRepo->find($grossDomesticProduct->id);
        $this->assertModelData($fakeGrossDomesticProduct, $dbGrossDomesticProduct->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_gross_domestic_product()
    {
        $grossDomesticProduct = GrossDomesticProduct::factory()->create();

        $resp = $this->grossDomesticProductRepo->delete($grossDomesticProduct->id);

        $this->assertTrue($resp);
        $this->assertNull(GrossDomesticProduct::find($grossDomesticProduct->id), 'GrossDomesticProduct should not exist in DB');
    }
}
