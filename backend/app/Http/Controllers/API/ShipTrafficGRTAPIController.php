<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateShipTrafficGRTAPIRequest;
use App\Http\Requests\API\UpdateShipTrafficGRTAPIRequest;
use App\Models\ShipTrafficGRT;
use App\Repositories\ShipTrafficGRTRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ShipTrafficGRTResource;
use Response;

/**
 * Class ShipTrafficGRTController
 * @package App\Http\Controllers\API
 */

class ShipTrafficGRTAPIController extends AppBaseController
{
    /** @var  ShipTrafficGRTRepository */
    private $shipTrafficGRTRepository;

    public function __construct(ShipTrafficGRTRepository $shipTrafficGRTRepo)
    {
        $this->shipTrafficGRTRepository = $shipTrafficGRTRepo;
    }

    /**
     * Display a listing of the ShipTrafficGRT.
     * GET|HEAD /shipTrafficGRTs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read ship traffic grt')) {
            return $this->sendError('Permission Denied', 403);
        }

        $shipTrafficGRTs = $this->shipTrafficGRTRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ShipTrafficGRTResource::collection($shipTrafficGRTs), 'Ship Traffic G R Ts retrieved successfully');
    }

    /**
     * Store a newly created ShipTrafficGRT in storage.
     * POST /shipTrafficGRTs
     *
     * @param CreateShipTrafficGRTAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateShipTrafficGRTAPIRequest $request)
    {
        if (!checkPermission('create ship traffic grt')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $shipTrafficGRT = $this->shipTrafficGRTRepository->create($input);

        return $this->sendResponse(new ShipTrafficGRTResource($shipTrafficGRT), 'Ship Traffic G R T saved successfully');
    }

    /**
     * Display the specified ShipTrafficGRT.
     * GET|HEAD /shipTrafficGRTs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read ship traffic grt')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var ShipTrafficGRT $shipTrafficGRT */
        $shipTrafficGRT = $this->shipTrafficGRTRepository->find($id);

        if (empty($shipTrafficGRT)) {
            return $this->sendError('Ship Traffic G R T not found');
        }

        return $this->sendResponse(new ShipTrafficGRTResource($shipTrafficGRT), 'Ship Traffic G R T retrieved successfully');
    }

    /**
     * Update the specified ShipTrafficGRT in storage.
     * PUT/PATCH /shipTrafficGRTs/{id}
     *
     * @param int $id
     * @param UpdateShipTrafficGRTAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateShipTrafficGRTAPIRequest $request)
    {
        if (!checkPermission('update ship traffic grt')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var ShipTrafficGRT $shipTrafficGRT */
        $shipTrafficGRT = $this->shipTrafficGRTRepository->find($id);

        if (empty($shipTrafficGRT)) {
            return $this->sendError('Ship Traffic G R T not found');
        }

        $shipTrafficGRT = $this->shipTrafficGRTRepository->update($input, $id);

        return $this->sendResponse(new ShipTrafficGRTResource($shipTrafficGRT), 'ShipTrafficGRT updated successfully');
    }

    /**
     * Remove the specified ShipTrafficGRT from storage.
     * DELETE /shipTrafficGRTs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete ship traffic grt')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var ShipTrafficGRT $shipTrafficGRT */
        $shipTrafficGRT = $this->shipTrafficGRTRepository->find($id);

        if (empty($shipTrafficGRT)) {
            return $this->sendError('Ship Traffic G R T not found');
        }

        $shipTrafficGRT->delete();

        return $this->sendSuccess('Ship Traffic G R T deleted successfully');
    }
}
