<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFleetOperatorRoadTrafficCrashAPIRequest;
use App\Http\Requests\API\UpdateFleetOperatorRoadTrafficCrashAPIRequest;
use App\Models\FleetOperatorRoadTrafficCrash;
use App\Repositories\FleetOperatorRoadTrafficCrashRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\FleetOperatorRoadTrafficCrashResource;
use Response;

/**
 * Class FleetOperatorRoadTrafficCrashController
 * @package App\Http\Controllers\API
 */

class FleetOperatorRoadTrafficCrashAPIController extends AppBaseController
{
    /** @var  FleetOperatorRoadTrafficCrashRepository */
    private $fleetOperatorRoadTrafficCrashRepository;

    public function __construct(FleetOperatorRoadTrafficCrashRepository $fleetOperatorRoadTrafficCrashRepo)
    {
        $this->fleetOperatorRoadTrafficCrashRepository = $fleetOperatorRoadTrafficCrashRepo;
    }

    /**
     * Display a listing of the FleetOperatorRoadTrafficCrash.
     * GET|HEAD /fleetOperatorRoadTrafficCrashes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read fleet operator road traffic crash')) {
            return $this->sendError('Permission Denied', 403);
        }

        $fleetOperatorRoadTrafficCrashes = $this->fleetOperatorRoadTrafficCrashRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(FleetOperatorRoadTrafficCrashResource::collection($fleetOperatorRoadTrafficCrashes), 'Fleet Operator Road Traffic Crashes retrieved successfully');
    }

    /**
     * Store a newly created FleetOperatorRoadTrafficCrash in storage.
     * POST /fleetOperatorRoadTrafficCrashes
     *
     * @param CreateFleetOperatorRoadTrafficCrashAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFleetOperatorRoadTrafficCrashAPIRequest $request)
    {
        if (!checkPermission('create fleet operator road traffic crash')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $fleetOperatorRoadTrafficCrash = $this->fleetOperatorRoadTrafficCrashRepository->create($input);

        return $this->sendResponse(new FleetOperatorRoadTrafficCrashResource($fleetOperatorRoadTrafficCrash), 'Fleet Operator Road Traffic Crash saved successfully');
    }

    /**
     * Display the specified FleetOperatorRoadTrafficCrash.
     * GET|HEAD /fleetOperatorRoadTrafficCrashes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read fleet operator road traffic crash')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var FleetOperatorRoadTrafficCrash $fleetOperatorRoadTrafficCrash */
        $fleetOperatorRoadTrafficCrash = $this->fleetOperatorRoadTrafficCrashRepository->find($id);

        if (empty($fleetOperatorRoadTrafficCrash)) {
            return $this->sendError('Fleet Operator Road Traffic Crash not found');
        }

        return $this->sendResponse(new FleetOperatorRoadTrafficCrashResource($fleetOperatorRoadTrafficCrash), 'Fleet Operator Road Traffic Crash retrieved successfully');
    }

    /**
     * Update the specified FleetOperatorRoadTrafficCrash in storage.
     * PUT/PATCH /fleetOperatorRoadTrafficCrashes/{id}
     *
     * @param int $id
     * @param UpdateFleetOperatorRoadTrafficCrashAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFleetOperatorRoadTrafficCrashAPIRequest $request)
    {
        if (!checkPermission('update fleet operator road traffic crash')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var FleetOperatorRoadTrafficCrash $fleetOperatorRoadTrafficCrash */
        $fleetOperatorRoadTrafficCrash = $this->fleetOperatorRoadTrafficCrashRepository->find($id);

        if (empty($fleetOperatorRoadTrafficCrash)) {
            return $this->sendError('Fleet Operator Road Traffic Crash not found');
        }

        $fleetOperatorRoadTrafficCrash = $this->fleetOperatorRoadTrafficCrashRepository->update($input, $id);

        return $this->sendResponse(new FleetOperatorRoadTrafficCrashResource($fleetOperatorRoadTrafficCrash), 'FleetOperatorRoadTrafficCrash updated successfully');
    }

    /**
     * Remove the specified FleetOperatorRoadTrafficCrash from storage.
     * DELETE /fleetOperatorRoadTrafficCrashes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete fleet operator road traffic crash')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var FleetOperatorRoadTrafficCrash $fleetOperatorRoadTrafficCrash */
        $fleetOperatorRoadTrafficCrash = $this->fleetOperatorRoadTrafficCrashRepository->find($id);

        if (empty($fleetOperatorRoadTrafficCrash)) {
            return $this->sendError('Fleet Operator Road Traffic Crash not found');
        }

        $fleetOperatorRoadTrafficCrash->delete();

        return $this->sendSuccess('Fleet Operator Road Traffic Crash deleted successfully');
    }
}
