<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRailwayPassengerAPIRequest;
use App\Http\Requests\API\UpdateRailwayPassengerAPIRequest;
use App\Models\RailwayPassenger;
use App\Repositories\RailwayPassengerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RailwayPassengerController
 * @package App\Http\Controllers\API
 */

class RailwayPassengerAPIController extends AppBaseController
{
    /** @var  RailwayPassengerRepository */
    private $railwayPassengerRepository;

    public function __construct(RailwayPassengerRepository $railwayPassengerRepo)
    {
        $this->railwayPassengerRepository = $railwayPassengerRepo;
    }

    /**
     * Display a listing of the RailwayPassenger.
     * GET|HEAD /railwayPassengers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $railwayPassengers = $this->railwayPassengerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($railwayPassengers->toArray(), 'Railway Passengers retrieved successfully');
    }

    /**
     * Store a newly created RailwayPassenger in storage.
     * POST /railwayPassengers
     *
     * @param CreateRailwayPassengerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRailwayPassengerAPIRequest $request)
    {
        $input = $request->all();

        $railwayPassenger = $this->railwayPassengerRepository->create($input);

        return $this->sendResponse($railwayPassenger->toArray(), 'Railway Passenger saved successfully');
    }

    /**
     * Display the specified RailwayPassenger.
     * GET|HEAD /railwayPassengers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RailwayPassenger $railwayPassenger */
        $railwayPassenger = $this->railwayPassengerRepository->find($id);

        if (empty($railwayPassenger)) {
            return $this->sendError('Railway Passenger not found');
        }

        return $this->sendResponse($railwayPassenger->toArray(), 'Railway Passenger retrieved successfully');
    }

    /**
     * Update the specified RailwayPassenger in storage.
     * PUT/PATCH /railwayPassengers/{id}
     *
     * @param int $id
     * @param UpdateRailwayPassengerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRailwayPassengerAPIRequest $request)
    {
        $input = $request->all();

        /** @var RailwayPassenger $railwayPassenger */
        $railwayPassenger = $this->railwayPassengerRepository->find($id);

        if (empty($railwayPassenger)) {
            return $this->sendError('Railway Passenger not found');
        }

        $railwayPassenger = $this->railwayPassengerRepository->update($input, $id);

        return $this->sendResponse($railwayPassenger->toArray(), 'RailwayPassenger updated successfully');
    }

    /**
     * Remove the specified RailwayPassenger from storage.
     * DELETE /railwayPassengers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RailwayPassenger $railwayPassenger */
        $railwayPassenger = $this->railwayPassengerRepository->find($id);

        if (empty($railwayPassenger)) {
            return $this->sendError('Railway Passenger not found');
        }

        $railwayPassenger->delete();

        return $this->sendSuccess('Railway Passenger deleted successfully');
    }
}
