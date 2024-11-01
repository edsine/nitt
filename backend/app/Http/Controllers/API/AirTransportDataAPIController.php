<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAirTransportDataAPIRequest;
use App\Http\Requests\API\UpdateAirTransportDataAPIRequest;
use App\Models\AirTransportData;
use App\Repositories\AirTransportDataRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AirTransportDataController
 * @package App\Http\Controllers\API
 */

class AirTransportDataAPIController extends AppBaseController
{
    /** @var  AirTransportDataRepository */
    private $airTransportDataRepository;

    public function __construct(AirTransportDataRepository $airTransportDataRepo)
    {
        $this->airTransportDataRepository = $airTransportDataRepo;
    }

    /**
     * Display a listing of the AirTransportData.
     * GET|HEAD /airTransportDatas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(!checkPermission('read air transport data')) {
            return $this->sendError('Permission Denied', 403);
        }

        $airTransportDatas = $this->airTransportDataRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($airTransportDatas->toArray(), 'Air Transport Data retrieved successfully');
    }

    /**
     * Store a newly created AirTransportData in storage.
     * POST /airTransportDatas
     *
     * @param CreateAirTransportDataAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAirTransportDataAPIRequest $request)
    {
        if(!checkPermission('create air transport data')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $airTransportData = $this->airTransportDataRepository->create($input);

        return $this->sendResponse($airTransportData->toArray(), 'Air Transport Data saved successfully');
    }

    /**
     * Display the specified AirTransportData.
     * GET|HEAD /airTransportDatas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(!checkPermission('read air transport data')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var AirTransportData $airTransportData */
        $airTransportData = $this->airTransportDataRepository->find($id);

        if (empty($airTransportData)) {
            return $this->sendError('Air Transport Data not found');
        }

        return $this->sendResponse($airTransportData->toArray(), 'Air Transport Data retrieved successfully');
    }

    /**
     * Update the specified AirTransportData in storage.
     * PUT/PATCH /airTransportDatas/{id}
     *
     * @param int $id
     * @param UpdateAirTransportDataAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAirTransportDataAPIRequest $request)
    {
        if(!checkPermission('update air transport data')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var AirTransportData $airTransportData */
        $airTransportData = $this->airTransportDataRepository->find($id);

        if (empty($airTransportData)) {
            return $this->sendError('Air Transport Data not found');
        }

        $airTransportData = $this->airTransportDataRepository->update($input, $id);

        return $this->sendResponse($airTransportData->toArray(), 'Air Transport Data updated successfully');
    }

    /**
     * Remove the specified AirTransportData from storage.
     * DELETE /airTransportDatas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(!checkPermission('delete air transport data')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var AirTransportData $airTransportData */
        $airTransportData = $this->airTransportDataRepository->find($id);

        if (empty($airTransportData)) {
            return $this->sendError('Air Transport Data not found');
        }

        $airTransportData->delete();

        return $this->sendSuccess('Air Transport Data deleted successfully');
    }
}
