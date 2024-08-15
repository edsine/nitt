<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDrivingTestRecordAPIRequest;
use App\Http\Requests\API\UpdateDrivingTestRecordAPIRequest;
use App\Models\DrivingTestRecord;
use App\Repositories\DrivingTestRecordRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\DrivingTestRecordResource;
use Response;

/**
 * Class DrivingTestRecordController
 * @package App\Http\Controllers\API
 */

class DrivingTestRecordAPIController extends AppBaseController
{
    /** @var  DrivingTestRecordRepository */
    private $drivingTestRecordRepository;

    public function __construct(DrivingTestRecordRepository $drivingTestRecordRepo)
    {
        $this->drivingTestRecordRepository = $drivingTestRecordRepo;
    }

    /**
     * Display a listing of the DrivingTestRecord.
     * GET|HEAD /drivingTestRecords
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read driving test record')) {
            return $this->sendError('Permission Denied', 403);
        }

        $drivingTestRecords = $this->drivingTestRecordRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(DrivingTestRecordResource::collection($drivingTestRecords), 'Driving Test Records retrieved successfully');
    }

    /**
     * Store a newly created DrivingTestRecord in storage.
     * POST /drivingTestRecords
     *
     * @param CreateDrivingTestRecordAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDrivingTestRecordAPIRequest $request)
    {
        if (!checkPermission('create driving test record')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $drivingTestRecord = $this->drivingTestRecordRepository->create($input);

        return $this->sendResponse(new DrivingTestRecordResource($drivingTestRecord), 'Driving Test Record saved successfully');
    }

    /**
     * Display the specified DrivingTestRecord.
     * GET|HEAD /drivingTestRecords/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read driving test record')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var DrivingTestRecord $drivingTestRecord */
        $drivingTestRecord = $this->drivingTestRecordRepository->find($id);

        if (empty($drivingTestRecord)) {
            return $this->sendError('Driving Test Record not found');
        }

        return $this->sendResponse(new DrivingTestRecordResource($drivingTestRecord), 'Driving Test Record retrieved successfully');
    }

    /**
     * Update the specified DrivingTestRecord in storage.
     * PUT/PATCH /drivingTestRecords/{id}
     *
     * @param int $id
     * @param UpdateDrivingTestRecordAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDrivingTestRecordAPIRequest $request)
    {
        if (!checkPermission('update driving test record')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var DrivingTestRecord $drivingTestRecord */
        $drivingTestRecord = $this->drivingTestRecordRepository->find($id);

        if (empty($drivingTestRecord)) {
            return $this->sendError('Driving Test Record not found');
        }

        $drivingTestRecord = $this->drivingTestRecordRepository->update($input, $id);

        return $this->sendResponse(new DrivingTestRecordResource($drivingTestRecord), 'DrivingTestRecord updated successfully');
    }

    /**
     * Remove the specified DrivingTestRecord from storage.
     * DELETE /drivingTestRecords/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete driving test record')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var DrivingTestRecord $drivingTestRecord */
        $drivingTestRecord = $this->drivingTestRecordRepository->find($id);

        if (empty($drivingTestRecord)) {
            return $this->sendError('Driving Test Record not found');
        }

        $drivingTestRecord->delete();

        return $this->sendSuccess('Driving Test Record deleted successfully');
    }
}
