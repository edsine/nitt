<?php

namespace App\Http\Controllers\API;

use Response;
use Illuminate\Http\Request;
use App\Models\ShipContainerTraffic;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\AppBaseController;
use App\Imports\ShipContainerTrafficImport;
use App\Http\Resources\ShipContainerTrafficResource;
use App\Repositories\ShipContainerTrafficRepository;
use App\Http\Requests\API\CreateShipContainerTrafficAPIRequest;
use App\Http\Requests\API\UpdateShipContainerTrafficAPIRequest;

/**
 * Class ShipContainerTrafficController
 * @package App\Http\Controllers\API
 */

class ShipContainerTrafficAPIController extends AppBaseController
{
    /** @var  ShipContainerTrafficRepository */
    private $shipContainerTrafficRepository;

    public function __construct(ShipContainerTrafficRepository $shipContainerTrafficRepo)
    {
        $this->shipContainerTrafficRepository = $shipContainerTrafficRepo;
    }

    /**
     * Display a listing of the ShipContainerTraffic.
     * GET|HEAD /shipContainerTraffics
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read ship container traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        $shipContainerTraffics = $this->shipContainerTrafficRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ShipContainerTrafficResource::collection($shipContainerTraffics), 'Ship Container Traffics retrieved successfully');
    }

    /**
     * Store a newly created ShipContainerTraffic in storage.
     * POST /shipContainerTraffics
     *
     * @param CreateShipContainerTrafficAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateShipContainerTrafficAPIRequest $request)
    {
        if (!checkPermission('create ship container traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $shipContainerTraffic = $this->shipContainerTrafficRepository->create($input);

        return $this->sendResponse(new ShipContainerTrafficResource($shipContainerTraffic), 'Ship Container Traffic saved successfully');
    }

    /**
     * Upload ShipContainerTraffic in storage.
     * POST /shipContainerTraffic/upload
     *
     *
     * @return Response
     */
    public function bulkUpload(Request $request)
    {
        if (!checkPermission('create ship container traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $file = $request->file('file');

        $response = (new ShipContainerTrafficImport)->import($file);

        if (!$response['status']) {
            return $this->sendError('File import error: ' . $response['message'], 422);
        } else {
            return $this->sendSuccess("File imported successfully");
        }
    }

    /**
     * Display the specified ShipContainerTraffic.
     * GET|HEAD /shipContainerTraffics/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read ship container traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var ShipContainerTraffic $shipContainerTraffic */
        $shipContainerTraffic = $this->shipContainerTrafficRepository->find($id);

        if (empty($shipContainerTraffic)) {
            return $this->sendError('Ship Container Traffic not found');
        }

        return $this->sendResponse(new ShipContainerTrafficResource($shipContainerTraffic), 'Ship Container Traffic retrieved successfully');
    }

    /**
     * Update the specified ShipContainerTraffic in storage.
     * PUT/PATCH /shipContainerTraffics/{id}
     *
     * @param int $id
     * @param UpdateShipContainerTrafficAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateShipContainerTrafficAPIRequest $request)
    {
        if (!checkPermission('update ship container traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var ShipContainerTraffic $shipContainerTraffic */
        $shipContainerTraffic = $this->shipContainerTrafficRepository->find($id);

        if (empty($shipContainerTraffic)) {
            return $this->sendError('Ship Container Traffic not found');
        }

        $shipContainerTraffic = $this->shipContainerTrafficRepository->update($input, $id);

        return $this->sendResponse(new ShipContainerTrafficResource($shipContainerTraffic), 'ShipContainerTraffic updated successfully');
    }

    /**
     * Remove the specified ShipContainerTraffic from storage.
     * DELETE /shipContainerTraffics/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete ship container traffic')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var ShipContainerTraffic $shipContainerTraffic */
        $shipContainerTraffic = $this->shipContainerTrafficRepository->find($id);

        if (empty($shipContainerTraffic)) {
            return $this->sendError('Ship Container Traffic not found');
        }

        $shipContainerTraffic->delete();

        return $this->sendSuccess('Ship Container Traffic deleted successfully');
    }
}
