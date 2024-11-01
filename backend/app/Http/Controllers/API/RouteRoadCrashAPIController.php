<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRouteRoadCrashAPIRequest;
use App\Http\Requests\API\UpdateRouteRoadCrashAPIRequest;
use App\Models\RouteRoadCrash;
use App\Repositories\RouteRoadCrashRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\RouteRoadCrashResource;
use Response;

/**
 * Class RouteRoadCrashController
 * @package App\Http\Controllers\API
 */

class RouteRoadCrashAPIController extends AppBaseController
{
    /** @var  RouteRoadCrashRepository */
    private $routeRoadCrashRepository;

    public function __construct(RouteRoadCrashRepository $routeRoadCrashRepo)
    {
        $this->routeRoadCrashRepository = $routeRoadCrashRepo;
    }

    /**
     * Display a listing of the RouteRoadCrash.
     * GET|HEAD /routeRoadCrashes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read route road crash')) {
            return $this->sendError('Permission Denied', 403);
        }

        $routeRoadCrashes = $this->routeRoadCrashRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(RouteRoadCrashResource::collection($routeRoadCrashes), 'Route Road Crashes retrieved successfully');
    }

    /**
     * Store a newly created RouteRoadCrash in storage.
     * POST /routeRoadCrashes
     *
     * @param CreateRouteRoadCrashAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRouteRoadCrashAPIRequest $request)
    {
        if (!checkPermission('create route road crash')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $routeRoadCrash = $this->routeRoadCrashRepository->create($input);

        return $this->sendResponse(new RouteRoadCrashResource($routeRoadCrash), 'Route Road Crash saved successfully');
    }

    /**
     * Display the specified RouteRoadCrash.
     * GET|HEAD /routeRoadCrashes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read route road crash')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var RouteRoadCrash $routeRoadCrash */
        $routeRoadCrash = $this->routeRoadCrashRepository->find($id);

        if (empty($routeRoadCrash)) {
            return $this->sendError('Route Road Crash not found');
        }

        return $this->sendResponse(new RouteRoadCrashResource($routeRoadCrash), 'Route Road Crash retrieved successfully');
    }

    /**
     * Update the specified RouteRoadCrash in storage.
     * PUT/PATCH /routeRoadCrashes/{id}
     *
     * @param int $id
     * @param UpdateRouteRoadCrashAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRouteRoadCrashAPIRequest $request)
    {
        if (!checkPermission('update route road crash')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var RouteRoadCrash $routeRoadCrash */
        $routeRoadCrash = $this->routeRoadCrashRepository->find($id);

        if (empty($routeRoadCrash)) {
            return $this->sendError('Route Road Crash not found');
        }

        $routeRoadCrash = $this->routeRoadCrashRepository->update($input, $id);

        return $this->sendResponse(new RouteRoadCrashResource($routeRoadCrash), 'RouteRoadCrash updated successfully');
    }

    /**
     * Remove the specified RouteRoadCrash from storage.
     * DELETE /routeRoadCrashes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete route road crash')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var RouteRoadCrash $routeRoadCrash */
        $routeRoadCrash = $this->routeRoadCrashRepository->find($id);

        if (empty($routeRoadCrash)) {
            return $this->sendError('Route Road Crash not found');
        }

        $routeRoadCrash->delete();

        return $this->sendSuccess('Route Road Crash deleted successfully');
    }
}
