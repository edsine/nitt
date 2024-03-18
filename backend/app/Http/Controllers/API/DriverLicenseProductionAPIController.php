<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDriverLicenseProductionAPIRequest;
use App\Http\Requests\API\UpdateDriverLicenseProductionAPIRequest;
use App\Models\DriverLicenseProduction;
use App\Repositories\DriverLicenseProductionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\DriverLicenseProductionResource;
use Response;

/**
 * Class DriverLicenseProductionController
 * @package App\Http\Controllers\API
 */

class DriverLicenseProductionAPIController extends AppBaseController
{
    /** @var  DriverLicenseProductionRepository */
    private $driverLicenseProductionRepository;

    public function __construct(DriverLicenseProductionRepository $driverLicenseProductionRepo)
    {
        $this->driverLicenseProductionRepository = $driverLicenseProductionRepo;
    }

    /**
     * Display a listing of the DriverLicenseProduction.
     * GET|HEAD /driverLicenseProductions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read driver license production')) {
            return $this->sendError('Permission Denied', 403);
        }

        $driverLicenseProductions = $this->driverLicenseProductionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(DriverLicenseProductionResource::collection($driverLicenseProductions), 'Driver License Productions retrieved successfully');
    }

    /**
     * Store a newly created DriverLicenseProduction in storage.
     * POST /driverLicenseProductions
     *
     * @param CreateDriverLicenseProductionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDriverLicenseProductionAPIRequest $request)
    {
        if (!checkPermission('create driver license production')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $driverLicenseProduction = $this->driverLicenseProductionRepository->create($input);

        return $this->sendResponse(new DriverLicenseProductionResource($driverLicenseProduction), 'Driver License Production saved successfully');
    }

    /**
     * Display the specified DriverLicenseProduction.
     * GET|HEAD /driverLicenseProductions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read driver license production')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var DriverLicenseProduction $driverLicenseProduction */
        $driverLicenseProduction = $this->driverLicenseProductionRepository->find($id);

        if (empty($driverLicenseProduction)) {
            return $this->sendError('Driver License Production not found');
        }

        return $this->sendResponse(new DriverLicenseProductionResource($driverLicenseProduction), 'Driver License Production retrieved successfully');
    }

    /**
     * Update the specified DriverLicenseProduction in storage.
     * PUT/PATCH /driverLicenseProductions/{id}
     *
     * @param int $id
     * @param UpdateDriverLicenseProductionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDriverLicenseProductionAPIRequest $request)
    {
        if (!checkPermission('update driver license production')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var DriverLicenseProduction $driverLicenseProduction */
        $driverLicenseProduction = $this->driverLicenseProductionRepository->find($id);

        if (empty($driverLicenseProduction)) {
            return $this->sendError('Driver License Production not found');
        }

        $driverLicenseProduction = $this->driverLicenseProductionRepository->update($input, $id);

        return $this->sendResponse(new DriverLicenseProductionResource($driverLicenseProduction), 'DriverLicenseProduction updated successfully');
    }

    /**
     * Remove the specified DriverLicenseProduction from storage.
     * DELETE /driverLicenseProductions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete driver license production')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var DriverLicenseProduction $driverLicenseProduction */
        $driverLicenseProduction = $this->driverLicenseProductionRepository->find($id);

        if (empty($driverLicenseProduction)) {
            return $this->sendError('Driver License Production not found');
        }

        $driverLicenseProduction->delete();

        return $this->sendSuccess('Driver License Production deleted successfully');
    }
}
