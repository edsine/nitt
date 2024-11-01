<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePortVehicularTrafficAPIRequest;
use App\Http\Requests\API\UpdatePortVehicularTrafficAPIRequest;
use App\Models\PortVehicularTraffic;
use App\Repositories\PortVehicularTrafficRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\PortVehicularTrafficResource;
use Response;

/**
 * Class PortVehicularTrafficController
 * @package App\Http\Controllers\API
 */

class PortVehicularTrafficAPIController extends AppBaseController
{
    /** @var  PortVehicularTrafficRepository */
    private $portVehicularTrafficRepository;

    public function __construct(PortVehicularTrafficRepository $portVehicularTrafficRepo)
    {
        $this->portVehicularTrafficRepository = $portVehicularTrafficRepo;
    }

    /**
     * Display a listing of the PortVehicularTraffic.
     * GET|HEAD /portVehicularTraffics
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read port vehicular traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        $portVehicularTraffics = $this->portVehicularTrafficRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(PortVehicularTrafficResource::collection($portVehicularTraffics), 'Port Vehicular Traffics retrieved successfully');
    }

    /**
     * Store a newly created PortVehicularTraffic in storage.
     * POST /portVehicularTraffics
     *
     * @param CreatePortVehicularTrafficAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePortVehicularTrafficAPIRequest $request)
    {
        if (!checkPermission('create port vehicular traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $portVehicularTraffic = $this->portVehicularTrafficRepository->create($input);

        return $this->sendResponse(new PortVehicularTrafficResource($portVehicularTraffic), 'Port Vehicular Traffic saved successfully');
    }

    /**
     * Display the specified PortVehicularTraffic.
     * GET|HEAD /portVehicularTraffics/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read port vehicular traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var PortVehicularTraffic $portVehicularTraffic */
        $portVehicularTraffic = $this->portVehicularTrafficRepository->find($id);

        if (empty($portVehicularTraffic)) {
            return $this->sendError('Port Vehicular Traffic not found');
        }

        return $this->sendResponse(new PortVehicularTrafficResource($portVehicularTraffic), 'Port Vehicular Traffic retrieved successfully');
    }

    /**
     * Update the specified PortVehicularTraffic in storage.
     * PUT/PATCH /portVehicularTraffics/{id}
     *
     * @param int $id
     * @param UpdatePortVehicularTrafficAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePortVehicularTrafficAPIRequest $request)
    {
        if (!checkPermission('update port vehicular traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var PortVehicularTraffic $portVehicularTraffic */
        $portVehicularTraffic = $this->portVehicularTrafficRepository->find($id);

        if (empty($portVehicularTraffic)) {
            return $this->sendError('Port Vehicular Traffic not found');
        }

        $portVehicularTraffic = $this->portVehicularTrafficRepository->update($input, $id);

        return $this->sendResponse(new PortVehicularTrafficResource($portVehicularTraffic), 'PortVehicularTraffic updated successfully');
    }

    /**
     * Remove the specified PortVehicularTraffic from storage.
     * DELETE /portVehicularTraffics/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete port vehicular traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var PortVehicularTraffic $portVehicularTraffic */
        $portVehicularTraffic = $this->portVehicularTrafficRepository->find($id);

        if (empty($portVehicularTraffic)) {
            return $this->sendError('Port Vehicular Traffic not found');
        }

        $portVehicularTraffic->delete();

        return $this->sendSuccess('Port Vehicular Traffic deleted successfully');
    }
}
