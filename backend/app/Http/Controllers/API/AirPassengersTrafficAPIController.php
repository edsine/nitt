<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAirPassengersTrafficAPIRequest;
use App\Http\Requests\API\UpdateAirPassengersTrafficAPIRequest;
use App\Models\AirPassengersTraffic;
use App\Repositories\AirPassengersTrafficRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AirPassengersTrafficController
 * @package App\Http\Controllers\API
 */

class AirPassengersTrafficAPIController extends AppBaseController
{
    /** @var  AirPassengersTrafficRepository */
    private $airPassengersTrafficRepository;

    public function __construct(AirPassengersTrafficRepository $airPassengersTrafficRepo)
    {
        $this->airPassengersTrafficRepository = $airPassengersTrafficRepo;
    }

    /**
     * Display a listing of the AirPassengersTraffic.
     * GET|HEAD /airPassengersTraffics
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(!checkPermission('read air passengers traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        $airPassengersTraffics = $this->airPassengersTrafficRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($airPassengersTraffics->toArray(), 'Air Passengers Traffics retrieved successfully');
    }

    /**
     * Store a newly created AirPassengersTraffic in storage.
     * POST /airPassengersTraffics
     *
     * @param CreateAirPassengersTrafficAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAirPassengersTrafficAPIRequest $request)
    {
        if(!checkPermission('create air passengers traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $airPassengersTraffic = $this->airPassengersTrafficRepository->create($input);

        return $this->sendResponse($airPassengersTraffic->toArray(), 'Air Passengers Traffic saved successfully');
    }

    /**
     * Display the specified AirPassengersTraffic.
     * GET|HEAD /airPassengersTraffics/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(!checkPermission('read air passengers traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var AirPassengersTraffic $airPassengersTraffic */
        $airPassengersTraffic = $this->airPassengersTrafficRepository->find($id);

        if (empty($airPassengersTraffic)) {
            return $this->sendError('Air Passengers Traffic not found');
        }

        return $this->sendResponse($airPassengersTraffic->toArray(), 'Air Passengers Traffic retrieved successfully');
    }

    /**
     * Update the specified AirPassengersTraffic in storage.
     * PUT/PATCH /airPassengersTraffics/{id}
     *
     * @param int $id
     * @param UpdateAirPassengersTrafficAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAirPassengersTrafficAPIRequest $request)
    {
        if(!checkPermission('update air passengers traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var AirPassengersTraffic $airPassengersTraffic */
        $airPassengersTraffic = $this->airPassengersTrafficRepository->find($id);

        if (empty($airPassengersTraffic)) {
            return $this->sendError('Air Passengers Traffic not found');
        }

        $airPassengersTraffic = $this->airPassengersTrafficRepository->update($input, $id);

        return $this->sendResponse($airPassengersTraffic->toArray(), 'Air Passengers Traffic updated successfully');
    }

    /**
     * Remove the specified AirPassengersTraffic from storage.
     * DELETE /airPassengersTraffics/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(!checkPermission('delete air passengers traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var AirPassengersTraffic $airPassengersTraffic */
        $airPassengersTraffic = $this->airPassengersTrafficRepository->find($id);

        if (empty($airPassengersTraffic)) {
            return $this->sendError('Air Passengers Traffic not found');
        }

        $airPassengersTraffic->delete();

        return $this->sendSuccess('Air Passengers Traffic deleted successfully');
    }
}
