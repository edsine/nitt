<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRoadTrafficCrashAPIRequest;
use App\Http\Requests\API\UpdateRoadTrafficCrashAPIRequest;
use App\Models\RoadTrafficCrash;
use App\Repositories\RoadTrafficCrashRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\RoadTrafficCrashResource;
use Response;

/**
 * Class RoadTrafficCrashController
 * @package App\Http\Controllers\API
 */

class RoadTrafficCrashAPIController extends AppBaseController
{
    /** @var  RoadTrafficCrashRepository */
    private $roadTrafficCrashRepository;

    public function __construct(RoadTrafficCrashRepository $roadTrafficCrashRepo)
    {
        $this->roadTrafficCrashRepository = $roadTrafficCrashRepo;
    }

    /**
     * Display a listing of the RoadTrafficCrash.
     * GET|HEAD /roadTrafficCrashes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read road traffic crash')) {
            return $this->sendError('Permission Denied', 403);
        }

        $roadTrafficCrashes = $this->roadTrafficCrashRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(RoadTrafficCrashResource::collection($roadTrafficCrashes), 'Road Traffic Crashes retrieved successfully');
    }

    /**
     * Store a newly created RoadTrafficCrash in storage.
     * POST /roadTrafficCrashes
     *
     * @param CreateRoadTrafficCrashAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRoadTrafficCrashAPIRequest $request)
    {
        if (!checkPermission('create road traffic crash')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $roadTrafficCrash = $this->roadTrafficCrashRepository->create($input);

        return $this->sendResponse(new RoadTrafficCrashResource($roadTrafficCrash), 'Road Traffic Crash saved successfully');
    }

    /**
     * Display the specified RoadTrafficCrash.
     * GET|HEAD /roadTrafficCrashes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read road traffic crash')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var RoadTrafficCrash $roadTrafficCrash */
        $roadTrafficCrash = $this->roadTrafficCrashRepository->find($id);

        if (empty($roadTrafficCrash)) {
            return $this->sendError('Road Traffic Crash not found');
        }

        return $this->sendResponse(new RoadTrafficCrashResource($roadTrafficCrash), 'Road Traffic Crash retrieved successfully');
    }

    /**
     * Update the specified RoadTrafficCrash in storage.
     * PUT/PATCH /roadTrafficCrashes/{id}
     *
     * @param int $id
     * @param UpdateRoadTrafficCrashAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoadTrafficCrashAPIRequest $request)
    {
        if (!checkPermission('update road traffic crash')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var RoadTrafficCrash $roadTrafficCrash */
        $roadTrafficCrash = $this->roadTrafficCrashRepository->find($id);

        if (empty($roadTrafficCrash)) {
            return $this->sendError('Road Traffic Crash not found');
        }

        $roadTrafficCrash = $this->roadTrafficCrashRepository->update($input, $id);

        return $this->sendResponse(new RoadTrafficCrashResource($roadTrafficCrash), 'RoadTrafficCrash updated successfully');
    }

    /**
     * Remove the specified RoadTrafficCrash from storage.
     * DELETE /roadTrafficCrashes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete road traffic crash')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var RoadTrafficCrash $roadTrafficCrash */
        $roadTrafficCrash = $this->roadTrafficCrashRepository->find($id);

        if (empty($roadTrafficCrash)) {
            return $this->sendError('Road Traffic Crash not found');
        }

        $roadTrafficCrash->delete();

        return $this->sendSuccess('Road Traffic Crash deleted successfully');
    }
}
