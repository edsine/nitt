<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVehiclePlateProductionAPIRequest;
use App\Http\Requests\API\UpdateVehiclePlateProductionAPIRequest;
use App\Models\VehiclePlateProduction;
use App\Repositories\VehiclePlateProductionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\VehiclePlateProductionResource;
use Response;

/**
 * Class VehiclePlateProductionController
 * @package App\Http\Controllers\API
 */

class VehiclePlateProductionAPIController extends AppBaseController
{
    /** @var  VehiclePlateProductionRepository */
    private $vehiclePlateProductionRepository;

    public function __construct(VehiclePlateProductionRepository $vehiclePlateProductionRepo)
    {
        $this->vehiclePlateProductionRepository = $vehiclePlateProductionRepo;
    }

    /**
     * Display a listing of the VehiclePlateProduction.
     * GET|HEAD /vehiclePlateProductions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read vehicle plate production')) {
            return $this->sendError('Permission Denied', 403);
        }

        $vehiclePlateProductions = $this->vehiclePlateProductionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(VehiclePlateProductionResource::collection($vehiclePlateProductions), 'Vehicle Plate Productions retrieved successfully');
    }

    /**
     * Store a newly created VehiclePlateProduction in storage.
     * POST /vehiclePlateProductions
     *
     * @param CreateVehiclePlateProductionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVehiclePlateProductionAPIRequest $request)
    {
        if (!checkPermission('create vehicle plate production')) {
            return $this->sendError('Permission Denied', 403);
        }


        $input = $request->all();

        $vehiclePlateProduction = $this->vehiclePlateProductionRepository->create($input);

        return $this->sendResponse(new VehiclePlateProductionResource($vehiclePlateProduction), 'Vehicle Plate Production saved successfully');
    }

    /**
     * Display the specified VehiclePlateProduction.
     * GET|HEAD /vehiclePlateProductions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read vehicle plate production')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var VehiclePlateProduction $vehiclePlateProduction */
        $vehiclePlateProduction = $this->vehiclePlateProductionRepository->find($id);

        if (empty($vehiclePlateProduction)) {
            return $this->sendError('Vehicle Plate Production not found');
        }

        return $this->sendResponse(new VehiclePlateProductionResource($vehiclePlateProduction), 'Vehicle Plate Production retrieved successfully');
    }

    /**
     * Update the specified VehiclePlateProduction in storage.
     * PUT/PATCH /vehiclePlateProductions/{id}
     *
     * @param int $id
     * @param UpdateVehiclePlateProductionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVehiclePlateProductionAPIRequest $request)
    {
        if (!checkPermission('update vehicle plate production')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var VehiclePlateProduction $vehiclePlateProduction */
        $vehiclePlateProduction = $this->vehiclePlateProductionRepository->find($id);

        if (empty($vehiclePlateProduction)) {
            return $this->sendError('Vehicle Plate Production not found');
        }

        $vehiclePlateProduction = $this->vehiclePlateProductionRepository->update($input, $id);

        return $this->sendResponse(new VehiclePlateProductionResource($vehiclePlateProduction), 'VehiclePlateProduction updated successfully');
    }

    /**
     * Remove the specified VehiclePlateProduction from storage.
     * DELETE /vehiclePlateProductions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete vehicle plate production')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var VehiclePlateProduction $vehiclePlateProduction */
        $vehiclePlateProduction = $this->vehiclePlateProductionRepository->find($id);

        if (empty($vehiclePlateProduction)) {
            return $this->sendError('Vehicle Plate Production not found');
        }

        $vehiclePlateProduction->delete();

        return $this->sendSuccess('Vehicle Plate Production deleted successfully');
    }
}
