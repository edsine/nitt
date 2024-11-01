<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFleetSizeCompositionAPIRequest;
use App\Http\Requests\API\UpdateFleetSizeCompositionAPIRequest;
use App\Models\FleetSizeComposition;
use App\Repositories\FleetSizeCompositionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\FleetSizeCompositionResource;
use Response;

/**
 * Class FleetSizeCompositionController
 * @package App\Http\Controllers\API
 */

class FleetSizeCompositionAPIController extends AppBaseController
{
    /** @var  FleetSizeCompositionRepository */
    private $fleetSizeCompositionRepository;

    public function __construct(FleetSizeCompositionRepository $fleetSizeCompositionRepo)
    {
        $this->fleetSizeCompositionRepository = $fleetSizeCompositionRepo;
    }

    /**
     * Display a listing of the FleetSizeComposition.
     * GET|HEAD /fleetSizeCompositions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read fleet size composition')) {
            return $this->sendError('Permission Denied', 403);
        }

        $fleetSizeCompositions = $this->fleetSizeCompositionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(FleetSizeCompositionResource::collection($fleetSizeCompositions), 'Fleet Size Compositions retrieved successfully');
    }

    /**
     * Store a newly created FleetSizeComposition in storage.
     * POST /fleetSizeCompositions
     *
     * @param CreateFleetSizeCompositionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFleetSizeCompositionAPIRequest $request)
    {
        if (!checkPermission('create fleet size composition')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $fleetSizeComposition = $this->fleetSizeCompositionRepository->create($input);

        return $this->sendResponse(new FleetSizeCompositionResource($fleetSizeComposition), 'Fleet Size Composition saved successfully');
    }

    /**
     * Display the specified FleetSizeComposition.
     * GET|HEAD /fleetSizeCompositions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read fleet size composition')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var FleetSizeComposition $fleetSizeComposition */
        $fleetSizeComposition = $this->fleetSizeCompositionRepository->find($id);

        if (empty($fleetSizeComposition)) {
            return $this->sendError('Fleet Size Composition not found');
        }

        return $this->sendResponse(new FleetSizeCompositionResource($fleetSizeComposition), 'Fleet Size Composition retrieved successfully');
    }

    /**
     * Update the specified FleetSizeComposition in storage.
     * PUT/PATCH /fleetSizeCompositions/{id}
     *
     * @param int $id
     * @param UpdateFleetSizeCompositionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFleetSizeCompositionAPIRequest $request)
    {
        if (!checkPermission('update fleet size composition')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var FleetSizeComposition $fleetSizeComposition */
        $fleetSizeComposition = $this->fleetSizeCompositionRepository->find($id);

        if (empty($fleetSizeComposition)) {
            return $this->sendError('Fleet Size Composition not found');
        }

        $fleetSizeComposition = $this->fleetSizeCompositionRepository->update($input, $id);

        return $this->sendResponse(new FleetSizeCompositionResource($fleetSizeComposition), 'FleetSizeComposition updated successfully');
    }

    /**
     * Remove the specified FleetSizeComposition from storage.
     * DELETE /fleetSizeCompositions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete fleet size composition')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var FleetSizeComposition $fleetSizeComposition */
        $fleetSizeComposition = $this->fleetSizeCompositionRepository->find($id);

        if (empty($fleetSizeComposition)) {
            return $this->sendError('Fleet Size Composition not found');
        }

        $fleetSizeComposition->delete();

        return $this->sendSuccess('Fleet Size Composition deleted successfully');
    }
}
