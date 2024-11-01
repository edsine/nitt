<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFleetAccidentAPIRequest;
use App\Http\Requests\API\UpdateFleetAccidentAPIRequest;
use App\Models\FleetAccident;
use App\Repositories\FleetAccidentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\FleetAccidentResource;
use Response;

/**
 * Class FleetAccidentController
 * @package App\Http\Controllers\API
 */

class FleetAccidentAPIController extends AppBaseController
{
    /** @var  FleetAccidentRepository */
    private $fleetAccidentRepository;

    public function __construct(FleetAccidentRepository $fleetAccidentRepo)
    {
        $this->fleetAccidentRepository = $fleetAccidentRepo;
    }

    /**
     * Display a listing of the FleetAccident.
     * GET|HEAD /fleetAccidents
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read fleet accident')) {
            return $this->sendError('Permission Denied', 403);
        }

        $fleetAccidents = $this->fleetAccidentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(FleetAccidentResource::collection($fleetAccidents), 'Fleet Accidents retrieved successfully');
    }

    /**
     * Store a newly created FleetAccident in storage.
     * POST /fleetAccidents
     *
     * @param CreateFleetAccidentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFleetAccidentAPIRequest $request)
    {
        if (!checkPermission('create fleet accident')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $fleetAccident = $this->fleetAccidentRepository->create($input);

        return $this->sendResponse(new FleetAccidentResource($fleetAccident), 'Fleet Accident saved successfully');
    }

    /**
     * Display the specified FleetAccident.
     * GET|HEAD /fleetAccidents/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read fleet accident')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var FleetAccident $fleetAccident */
        $fleetAccident = $this->fleetAccidentRepository->find($id);

        if (empty($fleetAccident)) {
            return $this->sendError('Fleet Accident not found');
        }

        return $this->sendResponse(new FleetAccidentResource($fleetAccident), 'Fleet Accident retrieved successfully');
    }

    /**
     * Update the specified FleetAccident in storage.
     * PUT/PATCH /fleetAccidents/{id}
     *
     * @param int $id
     * @param UpdateFleetAccidentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFleetAccidentAPIRequest $request)
    {
        if (!checkPermission('update fleet accident')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var FleetAccident $fleetAccident */
        $fleetAccident = $this->fleetAccidentRepository->find($id);

        if (empty($fleetAccident)) {
            return $this->sendError('Fleet Accident not found');
        }

        $fleetAccident = $this->fleetAccidentRepository->update($input, $id);

        return $this->sendResponse(new FleetAccidentResource($fleetAccident), 'FleetAccident updated successfully');
    }

    /**
     * Remove the specified FleetAccident from storage.
     * DELETE /fleetAccidents/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete fleet accident')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var FleetAccident $fleetAccident */
        $fleetAccident = $this->fleetAccidentRepository->find($id);

        if (empty($fleetAccident)) {
            return $this->sendError('Fleet Accident not found');
        }

        $fleetAccident->delete();

        return $this->sendSuccess('Fleet Accident deleted successfully');
    }
}
