<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\GrossDomesticProduct;

class GrossDomesticProductApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_gross_domestic_product()
    {
        $grossDomesticProduct = GrossDomesticProduct::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/gross_domestic_products', $grossDomesticProduct
        );

        $this->assertApiResponse($grossDomesticProduct);
    }

    /**
     * @test
     */
    public function test_read_gross_domestic_product()
    {
        $grossDomesticProduct = GrossDomesticProduct::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/gross_domestic_products/'.$grossDomesticProduct->id
        );

        $this->assertApiResponse($grossDomesticProduct->toArray());
    }

    /**
     * @test
     */
    public function test_update_gross_domestic_product()
    {
        $grossDomesticProduct = GrossDomesticProduct::factory()->create();
        $editedGrossDomesticProduct = GrossDomesticProduct::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/gross_domestic_products/'.$grossDomesticProduct->id,
            $editedGrossDomesticProduct
        );

        $this->assertApiResponse($editedGrossDomesticProduct);
    }

    /**
     * @test
     */
    public function test_delete_gross_domestic_product()
    {
        $grossDomesticProduct = GrossDomesticProduct::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/gross_domestic_products/'.$grossDomesticProduct->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/gross_domestic_products/'.$grossDomesticProduct->id
        );

        $this->response->assertStatus(404);
    }
}
