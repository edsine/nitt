<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVehicleImportationAPIRequest;
use App\Http\Requests\API\UpdateVehicleImportationAPIRequest;
use App\Models\VehicleImportation;
use App\Repositories\VehicleImportationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\VehicleImportationResource;
use Response;

/**
 * Class VehicleImportationController
 * @package App\Http\Controllers\API
 */

class VehicleImportationAPIController extends AppBaseController
{
    /** @var  VehicleImportationRepository */
    private $vehicleImportationRepository;

    public function __construct(VehicleImportationRepository $vehicleImportationRepo)
    {
        $this->vehicleImportationRepository = $vehicleImportationRepo;
    }

    /**
     * Display a listing of the VehicleImportation.
     * GET|HEAD /vehicleImportations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read vehicle importation')) {
            return $this->sendError('Permission Denied', 403);
        }
        $vehicleImportations = $this->vehicleImportationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(VehicleImportationResource::collection($vehicleImportations), 'Vehicle Importations retrieved successfully');
    }

    /**
     * Store a newly created VehicleImportation in storage.
     * POST /vehicleImportations
     *
     * @param CreateVehicleImportationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVehicleImportationAPIRequest $request)
    {
        if (!checkPermission('create vehicle importation')) {
            return $this->sendError('Permission Denied', 403);
        }
        $input = $request->all();

        $vehicleImportation = null;
        try {
            $vehicleImportation = $this->vehicleImportationRepository->create($input);
        } catch (\Throwable $th) {
            if (str_contains($th->getMessage(), 'Integrity constraint violation')) {
                return $this->sendError('The same year and vehicle category already exists');
            }
            return $this->sendError('An error occured');
        }

        return $this->sendResponse($vehicleImportation->toArray(), 'Vehicle Importation saved successfully');
    }

    /**
     * Display the specified VehicleImportation.
     * GET|HEAD /vehicleImportations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read vehicle importation')) {
            return $this->sendError('Permission Denied', 403);
        }
        /** @var VehicleImportation $vehicleImportation */
        $vehicleImportation = $this->vehicleImportationRepository->find($id);

        if (empty($vehicleImportation)) {
            return $this->sendError('Vehicle Importation not found');
        }

        return $this->sendResponse($vehicleImportation->toArray(), 'Vehicle Importation retrieved successfully');
    }

    /**
     * Update the specified VehicleImportation in storage.
     * PUT/PATCH /vehicleImportations/{id}
     *
     * @param int $id
     * @param UpdateVehicleImportationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVehicleImportationAPIRequest $request)
    {
        if (!checkPermission('update vehicle importation')) {
            return $this->sendError('Permission Denied', 403);
        }
        $input = $request->all();

        /** @var VehicleImportation $vehicleImportation */
        $vehicleImportation = $this->vehicleImportationRepository->find($id);

        if (empty($vehicleImportation)) {
            return $this->sendError('Vehicle Importation not found');
        }

        $vehicleImportation = null;
        try {
            $vehicleImportation = $this->vehicleImportationRepository->update($input, $id);
        } catch (\Throwable $th) {
            if (str_contains($th->getMessage(), 'Integrity constraint violation')) {
                return $this->sendError('The same year and vehicle category already exists');
            }
            return $this->sendError('An error occured');
        }

        return $this->sendResponse($vehicleImportation->toArray(), 'Vehicle Importation updated successfully');
    }

    /**
     * Remove the specified VehicleImportation from storage.
     * DELETE /vehicleImportations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete vehicle importation')) {
            return $this->sendError('Permission Denied', 403);
        }
        /** @var VehicleImportation $vehicleImportation */
        $vehicleImportation = $this->vehicleImportationRepository->find($id);

        if (empty($vehicleImportation)) {
            return $this->sendError('Vehicle Importation not found');
        }

        $vehicleImportation->delete();

        return $this->sendSuccess('Vehicle Importation deleted successfully');
    }
}
