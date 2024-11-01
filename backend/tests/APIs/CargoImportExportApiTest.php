<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CargoImportExport;

class CargoImportExportApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cargo_import_export()
    {
        $cargoImportExport = CargoImportExport::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cargo_import_exports', $cargoImportExport
        );

        $this->assertApiResponse($cargoImportExport);
    }

    /**
     * @test
     */
    public function test_read_cargo_import_export()
    {
        $cargoImportExport = CargoImportExport::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cargo_import_exports/'.$cargoImportExport->id
        );

        $this->assertApiResponse($cargoImportExport->toArray());
    }

    /**
     * @test
     */
    public function test_update_cargo_import_export()
    {
        $cargoImportExport = CargoImportExport::factory()->create();
        $editedCargoImportExport = CargoImportExport::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cargo_import_exports/'.$cargoImportExport->id,
            $editedCargoImportExport
        );

        $this->assertApiResponse($editedCargoImportExport);
    }

    /**
     * @test
     */
    public function test_delete_cargo_import_export()
    {
        $cargoImportExport = CargoImportExport::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cargo_import_exports/'.$cargoImportExport->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cargo_import_exports/'.$cargoImportExport->id
        );

        $this->response->assertStatus(404);
    }
}
