<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCorporationPassengerTrafficAPIRequest;
use App\Http\Requests\API\UpdateCorporationPassengerTrafficAPIRequest;
use App\Models\CorporationPassengerTraffic;
use App\Repositories\CorporationPassengerTrafficRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CorporationPassengerTrafficResource;
use Response;

/**
 * Class CorporationPassengerTrafficController
 * @package App\Http\Controllers\API
 */

class CorporationPassengerTrafficAPIController extends AppBaseController
{
    /** @var  CorporationPassengerTrafficRepository */
    private $corporationPassengerTrafficRepository;

    public function __construct(CorporationPassengerTrafficRepository $corporationPassengerTrafficRepo)
    {
        $this->corporationPassengerTrafficRepository = $corporationPassengerTrafficRepo;
    }

    /**
     * Display a listing of the CorporationPassengerTraffic.
     * GET|HEAD /corporationPassengerTraffics
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read corporation passenger traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        $corporationPassengerTraffics = $this->corporationPassengerTrafficRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CorporationPassengerTrafficResource::collection($corporationPassengerTraffics), 'Corporation Passenger Traffics retrieved successfully');
    }

    /**
     * Store a newly created CorporationPassengerTraffic in storage.
     * POST /corporationPassengerTraffics
     *
     * @param CreateCorporationPassengerTrafficAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCorporationPassengerTrafficAPIRequest $request)
    {
        if (!checkPermission('create corporation passenger traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $corporationPassengerTraffic = $this->corporationPassengerTrafficRepository->create($input);

        return $this->sendResponse(new CorporationPassengerTrafficResource($corporationPassengerTraffic), 'Corporation Passenger Traffic saved successfully');
    }

    /**
     * Display the specified CorporationPassengerTraffic.
     * GET|HEAD /corporationPassengerTraffics/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read corporation passenger traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var CorporationPassengerTraffic $corporationPassengerTraffic */
        $corporationPassengerTraffic = $this->corporationPassengerTrafficRepository->find($id);

        if (empty($corporationPassengerTraffic)) {
            return $this->sendError('Corporation Passenger Traffic not found');
        }

        return $this->sendResponse(new CorporationPassengerTrafficResource($corporationPassengerTraffic), 'Corporation Passenger Traffic retrieved successfully');
    }

    /**
     * Update the specified CorporationPassengerTraffic in storage.
     * PUT/PATCH /corporationPassengerTraffics/{id}
     *
     * @param int $id
     * @param UpdateCorporationPassengerTrafficAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCorporationPassengerTrafficAPIRequest $request)
    {
        if (!checkPermission('update corporation passenger traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var CorporationPassengerTraffic $corporationPassengerTraffic */
        $corporationPassengerTraffic = $this->corporationPassengerTrafficRepository->find($id);

        if (empty($corporationPassengerTraffic)) {
            return $this->sendError('Corporation Passenger Traffic not found');
        }

        $corporationPassengerTraffic = $this->corporationPassengerTrafficRepository->update($input, $id);

        return $this->sendResponse(new CorporationPassengerTrafficResource($corporationPassengerTraffic), 'CorporationPassengerTraffic updated successfully');
    }

    /**
     * Remove the specified CorporationPassengerTraffic from storage.
     * DELETE /corporationPassengerTraffics/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete corporation passenger traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var CorporationPassengerTraffic $corporationPassengerTraffic */
        $corporationPassengerTraffic = $this->corporationPassengerTrafficRepository->find($id);

        if (empty($corporationPassengerTraffic)) {
            return $this->sendError('Corporation Passenger Traffic not found');
        }

        $corporationPassengerTraffic->delete();

        return $this->sendSuccess('Corporation Passenger Traffic deleted successfully');
    }
}
