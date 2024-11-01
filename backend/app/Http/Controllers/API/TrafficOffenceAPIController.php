<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTrafficOffenceAPIRequest;
use App\Http\Requests\API\UpdateTrafficOffenceAPIRequest;
use App\Models\TrafficOffence;
use App\Repositories\TrafficOffenceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\TrafficOffenceResource;
use Response;

/**
 * Class TrafficOffenceController
 * @package App\Http\Controllers\API
 */

class TrafficOffenceAPIController extends AppBaseController
{
    /** @var  TrafficOffenceRepository */
    private $trafficOffenceRepository;

    public function __construct(TrafficOffenceRepository $trafficOffenceRepo)
    {
        $this->trafficOffenceRepository = $trafficOffenceRepo;
    }

    /**
     * Display a listing of the TrafficOffence.
     * GET|HEAD /trafficOffences
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read traffic offence')) {
            return $this->sendError('Permission Denied', 403);
        }

        $trafficOffences = $this->trafficOffenceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(TrafficOffenceResource::collection($trafficOffences), 'Traffic Offences retrieved successfully');
    }

    /**
     * Store a newly created TrafficOffence in storage.
     * POST /trafficOffences
     *
     * @param CreateTrafficOffenceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTrafficOffenceAPIRequest $request)
    {
        if (!checkPermission('create traffic offence')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $trafficOffence = $this->trafficOffenceRepository->create($input);

        return $this->sendResponse(new TrafficOffenceResource($trafficOffence), 'Traffic Offence saved successfully');
    }

    /**
     * Display the specified TrafficOffence.
     * GET|HEAD /trafficOffences/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read traffic offence')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var TrafficOffence $trafficOffence */
        $trafficOffence = $this->trafficOffenceRepository->find($id);

        if (empty($trafficOffence)) {
            return $this->sendError('Traffic Offence not found');
        }

        return $this->sendResponse(new TrafficOffenceResource($trafficOffence), 'Traffic Offence retrieved successfully');
    }

    /**
     * Update the specified TrafficOffence in storage.
     * PUT/PATCH /trafficOffences/{id}
     *
     * @param int $id
     * @param UpdateTrafficOffenceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrafficOffenceAPIRequest $request)
    {
        if (!checkPermission('update traffic offence')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var TrafficOffence $trafficOffence */
        $trafficOffence = $this->trafficOffenceRepository->find($id);

        if (empty($trafficOffence)) {
            return $this->sendError('Traffic Offence not found');
        }

        $trafficOffence = $this->trafficOffenceRepository->update($input, $id);

        return $this->sendResponse(new TrafficOffenceResource($trafficOffence), 'TrafficOffence updated successfully');
    }

    /**
     * Remove the specified TrafficOffence from storage.
     * DELETE /trafficOffences/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete traffic offence')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var TrafficOffence $trafficOffence */
        $trafficOffence = $this->trafficOffenceRepository->find($id);

        if (empty($trafficOffence)) {
            return $this->sendError('Traffic Offence not found');
        }

        $trafficOffence->delete();

        return $this->sendSuccess('Traffic Offence deleted successfully');
    }
}
