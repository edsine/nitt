<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePassengerRoadTransportDataAPIRequest;
use App\Http\Requests\API\UpdatePassengerRoadTransportDataAPIRequest;
use App\Models\PassengerRoadTransportData;
use App\Repositories\PassengerRoadTransportDataRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PassengerRoadTransportDataController
 * @package App\Http\Controllers\API
 */

class PassengerRoadTransportDataAPIController extends AppBaseController
{
    /** @var  PassengerRoadTransportDataRepository */
    private $passengerRoadTransportDataRepository;

    public function __construct(PassengerRoadTransportDataRepository $passengerRoadTransportDataRepo)
    {
        $this->passengerRoadTransportDataRepository = $passengerRoadTransportDataRepo;
    }

    /**
     * Display a listing of the PassengerRoadTransportData.
     * GET|HEAD /passengerRoadTransportDatas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(!checkPermission('read passenger road transport data')) {
            return $this->sendError('Permission Denied', 403);
        }

        $passengerRoadTransportDatas = $this->passengerRoadTransportDataRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($passengerRoadTransportDatas->toArray(), 'Passenger Road Transport Data retrieved successfully');
    }

    /**
     * Store a newly created PassengerRoadTransportData in storage.
     * POST /passengerRoadTransportDatas
     *
     * @param CreatePassengerRoadTransportDataAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePassengerRoadTransportDataAPIRequest $request)
    {
        if(!checkPermission('create passenger road transport data')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $passengerRoadTransportData = $this->passengerRoadTransportDataRepository->create($input);

        return $this->sendResponse($passengerRoadTransportData->toArray(), 'Passenger Road Transport Data saved successfully');
    }

    /**
     * Display the specified PassengerRoadTransportData.
     * GET|HEAD /passengerRoadTransportDatas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(!checkPermission('read passenger road transport data')) {
            return $this->sendError('Permission Denied', 403);
        }
        /** @var PassengerRoadTransportData $passengerRoadTransportData */
        $passengerRoadTransportData = $this->passengerRoadTransportDataRepository->find($id);

        if (empty($passengerRoadTransportData)) {
            return $this->sendError('Passenger Road Transport Data not found');
        }

        return $this->sendResponse($passengerRoadTransportData->toArray(), 'Passenger Road Transport Data retrieved successfully');
    }

    /**
     * Update the specified PassengerRoadTransportData in storage.
     * PUT/PATCH /passengerRoadTransportDatas/{id}
     *
     * @param int $id
     * @param UpdatePassengerRoadTransportDataAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePassengerRoadTransportDataAPIRequest $request)
    {
        if(!checkPermission('update passenger road transport data')) {
            return $this->sendError('Permission Denied', 403);
        }
        $input = $request->all();

        /** @var PassengerRoadTransportData $passengerRoadTransportData */
        $passengerRoadTransportData = $this->passengerRoadTransportDataRepository->find($id);

        if (empty($passengerRoadTransportData)) {
            return $this->sendError('Passenger Road Transport Data not found');
        }

        $passengerRoadTransportData = $this->passengerRoadTransportDataRepository->update($input, $id);

        return $this->sendResponse($passengerRoadTransportData->toArray(), 'Passenger Road Transport Data updated successfully');
    }

    /**
     * Remove the specified PassengerRoadTransportData from storage.
     * DELETE /passengerRoadTransportDatas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(!checkPermission('delete passenger road transport data')) {
            return $this->sendError('Permission Denied', 403);
        }
        /** @var PassengerRoadTransportData $passengerRoadTransportData */
        $passengerRoadTransportData = $this->passengerRoadTransportDataRepository->find($id);

        if (empty($passengerRoadTransportData)) {
            return $this->sendError('Passenger Road Transport Data not found');
        }

        $passengerRoadTransportData->delete();

        return $this->sendSuccess('Passenger Road Transport Data deleted successfully');
    }
}
