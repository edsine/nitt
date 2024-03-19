<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAirModeDataAPIRequest;
use App\Http\Requests\API\UpdateAirModeDataAPIRequest;
use App\Models\AirModeData;
use App\Repositories\AirModeDataRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\AirModeDataResource;
use Response;

/**
 * Class AirModeDataController
 * @package App\Http\Controllers\API
 */

class AirModeDataAPIController extends AppBaseController
{
    /** @var  AirModeDataRepository */
    private $airModeDataRepository;

    public function __construct(AirModeDataRepository $airModeDataRepo)
    {
        $this->airModeDataRepository = $airModeDataRepo;
    }

    /**
     * Display a listing of the AirModeData.
     * GET|HEAD /airModeDatas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(!checkPermission('read air mode data')) {
            return $this->sendError('Permission Denied', 403);
        }

        $airModeDatas = $this->airModeDataRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(AirModeDataResource::collection($airModeDatas), 'Air Mode Datas retrieved successfully');
    }

    /**
     * Store a newly created AirModeData in storage.
     * POST /airModeDatas
     *
     * @param CreateAirModeDataAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAirModeDataAPIRequest $request)
    {
        if(!checkPermission('create air mode data')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $airModeData = $this->airModeDataRepository->create($input);

        return $this->sendResponse(new AirModeDataResource($airModeData), 'Air Mode Data saved successfully');
    }

    /**
     * Display the specified AirModeData.
     * GET|HEAD /airModeDatas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(!checkPermission('read air mode data')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var AirModeData $airModeData */
        $airModeData = $this->airModeDataRepository->find($id);

        if (empty($airModeData)) {
            return $this->sendError('Air Mode Data not found');
        }

        return $this->sendResponse(new AirModeDataResource($airModeData), 'Air Mode Data retrieved successfully');
    }

    /**
     * Update the specified AirModeData in storage.
     * PUT/PATCH /airModeDatas/{id}
     *
     * @param int $id
     * @param UpdateAirModeDataAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAirModeDataAPIRequest $request)
    {
        if(!checkPermission('update air mode data')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var AirModeData $airModeData */
        $airModeData = $this->airModeDataRepository->find($id);

        if (empty($airModeData)) {
            return $this->sendError('Air Mode Data not found');
        }

        $airModeData = $this->airModeDataRepository->update($input, $id);

        return $this->sendResponse(new AirModeDataResource($airModeData), 'AirModeData updated successfully');
    }

    /**
     * Remove the specified AirModeData from storage.
     * DELETE /airModeDatas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(!checkPermission('delete air mode data')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var AirModeData $airModeData */
        $airModeData = $this->airModeDataRepository->find($id);

        if (empty($airModeData)) {
            return $this->sendError('Air Mode Data not found');
        }

        $airModeData->delete();

        return $this->sendSuccess('Air Mode Data deleted successfully');
    }
}
