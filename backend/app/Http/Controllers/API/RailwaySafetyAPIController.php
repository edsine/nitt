<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRailwaySafetyAPIRequest;
use App\Http\Requests\API\UpdateRailwaySafetyAPIRequest;
use App\Models\RailwaySafety;
use App\Repositories\RailwaySafetyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RailwaySafetyController
 * @package App\Http\Controllers\API
 */

class RailwaySafetyAPIController extends AppBaseController
{
    /** @var  RailwaySafetyRepository */
    private $railwaySafetyRepository;

    public function __construct(RailwaySafetyRepository $railwaySafetyRepo)
    {
        $this->railwaySafetyRepository = $railwaySafetyRepo;
    }

    /**
     * Display a listing of the RailwaySafety.
     * GET|HEAD /railwaySafeties
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(!checkPermission('read railway safety')) {
            return $this->sendError('Permission Denied', 403);
        }

        $railwaySafeties = $this->railwaySafetyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($railwaySafeties->toArray(), 'Railway Safeties retrieved successfully');
    }

    /**
     * Store a newly created RailwaySafety in storage.
     * POST /railwaySafeties
     *
     * @param CreateRailwaySafetyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRailwaySafetyAPIRequest $request)
    {
        if(!checkPermission('create railway safety')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $railwaySafety = $this->railwaySafetyRepository->create($input);

        return $this->sendResponse($railwaySafety->toArray(), 'Railway Safety saved successfully');
    }

    /**
     * Display the specified RailwaySafety.
     * GET|HEAD /railwaySafeties/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(!checkPermission('read railway safety')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var RailwaySafety $railwaySafety */
        $railwaySafety = $this->railwaySafetyRepository->find($id);

        if (empty($railwaySafety)) {
            return $this->sendError('Railway Safety not found');
        }

        return $this->sendResponse($railwaySafety->toArray(), 'Railway Safety retrieved successfully');
    }

    /**
     * Update the specified RailwaySafety in storage.
     * PUT/PATCH /railwaySafeties/{id}
     *
     * @param int $id
     * @param UpdateRailwaySafetyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRailwaySafetyAPIRequest $request)
    {
        if(!checkPermission('update railway safety')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var RailwaySafety $railwaySafety */
        $railwaySafety = $this->railwaySafetyRepository->find($id);

        if (empty($railwaySafety)) {
            return $this->sendError('Railway Safety not found');
        }

        $railwaySafety = $this->railwaySafetyRepository->update($input, $id);

        return $this->sendResponse($railwaySafety->toArray(), 'Railway Safety updated successfully');
    }

    /**
     * Remove the specified RailwaySafety from storage.
     * DELETE /railwaySafeties/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(!checkPermission('delete railway safety')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var RailwaySafety $railwaySafety */
        $railwaySafety = $this->railwaySafetyRepository->find($id);

        if (empty($railwaySafety)) {
            return $this->sendError('Railway Safety not found');
        }

        $railwaySafety->delete();

        return $this->sendSuccess('Railway Safety deleted successfully');
    }
}
