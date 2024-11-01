<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFleetOperatorBrandAPIRequest;
use App\Http\Requests\API\UpdateFleetOperatorBrandAPIRequest;
use App\Models\FleetOperatorBrand;
use App\Repositories\FleetOperatorBrandRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\FleetOperatorBrandResource;
use Response;

/**
 * Class FleetOperatorBrandController
 * @package App\Http\Controllers\API
 */

class FleetOperatorBrandAPIController extends AppBaseController
{
    /** @var  FleetOperatorBrandRepository */
    private $fleetOperatorBrandRepository;

    public function __construct(FleetOperatorBrandRepository $fleetOperatorBrandRepo)
    {
        $this->fleetOperatorBrandRepository = $fleetOperatorBrandRepo;
    }

    /**
     * Display a listing of the FleetOperatorBrand.
     * GET|HEAD /fleetOperatorBrands
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read fleet operator brand')) {
            return $this->sendError('Permission Denied', 403);
        }

        $fleetOperatorBrands = $this->fleetOperatorBrandRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(FleetOperatorBrandResource::collection($fleetOperatorBrands), 'Fleet Operator Brands retrieved successfully');
    }

    /**
     * Store a newly created FleetOperatorBrand in storage.
     * POST /fleetOperatorBrands
     *
     * @param CreateFleetOperatorBrandAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFleetOperatorBrandAPIRequest $request)
    {
        if (!checkPermission('create fleet operator brand')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $fleetOperatorBrand = $this->fleetOperatorBrandRepository->create($input);

        return $this->sendResponse(new FleetOperatorBrandResource($fleetOperatorBrand), 'Fleet Operator Brand saved successfully');
    }

    /**
     * Display the specified FleetOperatorBrand.
     * GET|HEAD /fleetOperatorBrands/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read fleet operator brand')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var FleetOperatorBrand $fleetOperatorBrand */
        $fleetOperatorBrand = $this->fleetOperatorBrandRepository->find($id);

        if (empty($fleetOperatorBrand)) {
            return $this->sendError('Fleet Operator Brand not found');
        }

        return $this->sendResponse(new FleetOperatorBrandResource($fleetOperatorBrand), 'Fleet Operator Brand retrieved successfully');
    }

    /**
     * Update the specified FleetOperatorBrand in storage.
     * PUT/PATCH /fleetOperatorBrands/{id}
     *
     * @param int $id
     * @param UpdateFleetOperatorBrandAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFleetOperatorBrandAPIRequest $request)
    {
        if (!checkPermission('update fleet operator brand')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var FleetOperatorBrand $fleetOperatorBrand */
        $fleetOperatorBrand = $this->fleetOperatorBrandRepository->find($id);

        if (empty($fleetOperatorBrand)) {
            return $this->sendError('Fleet Operator Brand not found');
        }

        $fleetOperatorBrand = $this->fleetOperatorBrandRepository->update($input, $id);

        return $this->sendResponse(new FleetOperatorBrandResource($fleetOperatorBrand), 'FleetOperatorBrand updated successfully');
    }

    /**
     * Remove the specified FleetOperatorBrand from storage.
     * DELETE /fleetOperatorBrands/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete fleet operator brand')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var FleetOperatorBrand $fleetOperatorBrand */
        $fleetOperatorBrand = $this->fleetOperatorBrandRepository->find($id);

        if (empty($fleetOperatorBrand)) {
            return $this->sendError('Fleet Operator Brand not found');
        }

        $fleetOperatorBrand->delete();

        return $this->sendSuccess('Fleet Operator Brand deleted successfully');
    }
}
