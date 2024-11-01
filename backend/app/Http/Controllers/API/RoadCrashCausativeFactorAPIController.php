<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRoadCrashCausativeFactorAPIRequest;
use App\Http\Requests\API\UpdateRoadCrashCausativeFactorAPIRequest;
use App\Models\RoadCrashCausativeFactor;
use App\Repositories\RoadCrashCausativeFactorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\RoadCrashCausativeFactorResource;
use Response;

/**
 * Class RoadCrashCausativeFactorController
 * @package App\Http\Controllers\API
 */

class RoadCrashCausativeFactorAPIController extends AppBaseController
{
    /** @var  RoadCrashCausativeFactorRepository */
    private $roadCrashCausativeFactorRepository;

    public function __construct(RoadCrashCausativeFactorRepository $roadCrashCausativeFactorRepo)
    {
        $this->roadCrashCausativeFactorRepository = $roadCrashCausativeFactorRepo;
    }

    /**
     * Display a listing of the RoadCrashCausativeFactor.
     * GET|HEAD /roadCrashCausativeFactors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read road crash causative factor')) {
            return $this->sendError('Permission Denied', 403);
        }

        $roadCrashCausativeFactors = $this->roadCrashCausativeFactorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(RoadCrashCausativeFactorResource::collection($roadCrashCausativeFactors), 'Road Crash Causative Factors retrieved successfully');
    }

    /**
     * Store a newly created RoadCrashCausativeFactor in storage.
     * POST /roadCrashCausativeFactors
     *
     * @param CreateRoadCrashCausativeFactorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRoadCrashCausativeFactorAPIRequest $request)
    {
        if (!checkPermission('create road crash causative factor')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $roadCrashCausativeFactor = $this->roadCrashCausativeFactorRepository->create($input);

        return $this->sendResponse(new RoadCrashCausativeFactorResource($roadCrashCausativeFactor), 'Road Crash Causative Factor saved successfully');
    }

    /**
     * Display the specified RoadCrashCausativeFactor.
     * GET|HEAD /roadCrashCausativeFactors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read road crash causative factor')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var RoadCrashCausativeFactor $roadCrashCausativeFactor */
        $roadCrashCausativeFactor = $this->roadCrashCausativeFactorRepository->find($id);

        if (empty($roadCrashCausativeFactor)) {
            return $this->sendError('Road Crash Causative Factor not found');
        }

        return $this->sendResponse(new RoadCrashCausativeFactorResource($roadCrashCausativeFactor), 'Road Crash Causative Factor retrieved successfully');
    }

    /**
     * Update the specified RoadCrashCausativeFactor in storage.
     * PUT/PATCH /roadCrashCausativeFactors/{id}
     *
     * @param int $id
     * @param UpdateRoadCrashCausativeFactorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoadCrashCausativeFactorAPIRequest $request)
    {
        if (!checkPermission('update road crash causative factor')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var RoadCrashCausativeFactor $roadCrashCausativeFactor */
        $roadCrashCausativeFactor = $this->roadCrashCausativeFactorRepository->find($id);

        if (empty($roadCrashCausativeFactor)) {
            return $this->sendError('Road Crash Causative Factor not found');
        }

        $roadCrashCausativeFactor = $this->roadCrashCausativeFactorRepository->update($input, $id);

        return $this->sendResponse(new RoadCrashCausativeFactorResource($roadCrashCausativeFactor), 'RoadCrashCausativeFactor updated successfully');
    }

    /**
     * Remove the specified RoadCrashCausativeFactor from storage.
     * DELETE /roadCrashCausativeFactors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete road crash causative factor')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var RoadCrashCausativeFactor $roadCrashCausativeFactor */
        $roadCrashCausativeFactor = $this->roadCrashCausativeFactorRepository->find($id);

        if (empty($roadCrashCausativeFactor)) {
            return $this->sendError('Road Crash Causative Factor not found');
        }

        $roadCrashCausativeFactor->delete();

        return $this->sendSuccess('Road Crash Causative Factor deleted successfully');
    }
}
