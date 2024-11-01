<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCargoImportExportAPIRequest;
use App\Http\Requests\API\UpdateCargoImportExportAPIRequest;
use App\Models\CargoImportExport;
use App\Repositories\CargoImportExportRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CargoImportExportResource;
use Response;

/**
 * Class CargoImportExportController
 * @package App\Http\Controllers\API
 */

class CargoImportExportAPIController extends AppBaseController
{
    /** @var  CargoImportExportRepository */
    private $cargoImportExportRepository;

    public function __construct(CargoImportExportRepository $cargoImportExportRepo)
    {
        $this->cargoImportExportRepository = $cargoImportExportRepo;
    }

    /**
     * Display a listing of the CargoImportExport.
     * GET|HEAD /cargoImportExports
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read cargo import export')) {
            return $this->sendError('Permission Denied', 403);
        }

        $cargoImportExports = $this->cargoImportExportRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CargoImportExportResource::collection($cargoImportExports), 'Cargo Import Exports retrieved successfully');
    }

    /**
     * Store a newly created CargoImportExport in storage.
     * POST /cargoImportExports
     *
     * @param CreateCargoImportExportAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCargoImportExportAPIRequest $request)
    {
        if (!checkPermission('create cargo import export')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $cargoImportExport = $this->cargoImportExportRepository->create($input);

        return $this->sendResponse(new CargoImportExportResource($cargoImportExport), 'Cargo Import Export saved successfully');
    }

    /**
     * Display the specified CargoImportExport.
     * GET|HEAD /cargoImportExports/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read cargo import export')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var CargoImportExport $cargoImportExport */
        $cargoImportExport = $this->cargoImportExportRepository->find($id);

        if (empty($cargoImportExport)) {
            return $this->sendError('Cargo Import Export not found');
        }

        return $this->sendResponse(new CargoImportExportResource($cargoImportExport), 'Cargo Import Export retrieved successfully');
    }

    /**
     * Update the specified CargoImportExport in storage.
     * PUT/PATCH /cargoImportExports/{id}
     *
     * @param int $id
     * @param UpdateCargoImportExportAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCargoImportExportAPIRequest $request)
    {
        if (!checkPermission('update cargo import export')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var CargoImportExport $cargoImportExport */
        $cargoImportExport = $this->cargoImportExportRepository->find($id);

        if (empty($cargoImportExport)) {
            return $this->sendError('Cargo Import Export not found');
        }

        $cargoImportExport = $this->cargoImportExportRepository->update($input, $id);

        return $this->sendResponse(new CargoImportExportResource($cargoImportExport), 'CargoImportExport updated successfully');
    }

    /**
     * Remove the specified CargoImportExport from storage.
     * DELETE /cargoImportExports/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete cargo import export')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var CargoImportExport $cargoImportExport */
        $cargoImportExport = $this->cargoImportExportRepository->find($id);

        if (empty($cargoImportExport)) {
            return $this->sendError('Cargo Import Export not found');
        }

        $cargoImportExport->delete();

        return $this->sendSuccess('Cargo Import Export deleted successfully');
    }
}
