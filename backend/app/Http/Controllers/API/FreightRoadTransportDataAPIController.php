<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFreightRoadTransportDataAPIRequest;
use App\Http\Requests\API\UpdateFreightRoadTransportDataAPIRequest;
use App\Models\FreightRoadTransportData;
use App\Repositories\FreightRoadTransportDataRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FreightRoadTransportDataController
 * @package App\Http\Controllers\API
 */

class FreightRoadTransportDataAPIController extends AppBaseController
{
    /** @var  FreightRoadTransportDataRepository */
    private $freightRoadTransportDataRepository;

    public function __construct(FreightRoadTransportDataRepository $freightRoadTransportDataRepo)
    {
        $this->freightRoadTransportDataRepository = $freightRoadTransportDataRepo;
    }

    /**
     * Display a listing of the FreightRoadTransportData.
     * GET|HEAD /freightRoadTransportDatas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(!checkPermission('read freight road transport data')) {
            return $this->sendError('Permission Denied', 403);
        }

        $freightRoadTransportData = $this->freightRoadTransportDataRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($freightRoadTransportData->toArray(), 'Freight Road Transport Data retrieved successfully');
    }

    /**
     * Store a newly created FreightRoadTransportData in storage.
     * POST /freightRoadTransportDatas
     *
     * @param CreateFreightRoadTransportDataAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFreightRoadTransportDataAPIRequest $request)
    {
        if(!checkPermission('create freight road transport data')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $freightRoadTransportData = $this->freightRoadTransportDataRepository->create($input);

        return $this->sendResponse($freightRoadTransportData->toArray(), 'Freight Road Transport Data saved successfully');
    }

    /**
     * Display the specified FreightRoadTransportData.
     * GET|HEAD /freightRoadTransportDatas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(!checkPermission('read freight road transport data')) {
            return $this->sendError('Permission Denied', 403);
        }
        /** @var FreightRoadTransportData $freightRoadTransportData */
        $freightRoadTransportData = $this->freightRoadTransportDataRepository->find($id);

        if (empty($freightRoadTransportData)) {
            return $this->sendError('Freight Road Transport Data not found');
        }

        return $this->sendResponse($freightRoadTransportData->toArray(), 'Freight Road Transport Data retrieved successfully');
    }

    /**
     * Update the specified FreightRoadTransportData in storage.
     * PUT/PATCH /freightRoadTransportDatas/{id}
     *
     * @param int $id
     * @param UpdateFreightRoadTransportDataAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFreightRoadTransportDataAPIRequest $request)
    {
        if(!checkPermission('update freight road transport data')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var FreightRoadTransportData $freightRoadTransportData */
        $freightRoadTransportData = $this->freightRoadTransportDataRepository->find($id);

        if (empty($freightRoadTransportData)) {
            return $this->sendError('Freight Road Transport Data not found');
        }

        $freightRoadTransportData = $this->freightRoadTransportDataRepository->update($input, $id);

        return $this->sendResponse($freightRoadTransportData->toArray(), 'Freight Road Transport Data updated successfully');
    }

    /**
     * Remove the specified FreightRoadTransportData from storage.
     * DELETE /freightRoadTransportDatas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(!checkPermission('delete freight road transport data')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var FreightRoadTransportData $freightRoadTransportData */
        $freightRoadTransportData = $this->freightRoadTransportDataRepository->find($id);

        if (empty($freightRoadTransportData)) {
            return $this->sendError('Freight Road Transport Data not found');
        }

        $freightRoadTransportData->delete();

        return $this->sendSuccess('Freight Road Transport Data deleted successfully');
    }
}
