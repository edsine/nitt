<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDriverLicenseIssuanceAPIRequest;
use App\Http\Requests\API\UpdateDriverLicenseIssuanceAPIRequest;
use App\Models\DriverLicenseIssuance;
use App\Repositories\DriverLicenseIssuanceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\DriverLicenseIssuanceResource;
use Response;

/**
 * Class DriverLicenseIssuanceController
 * @package App\Http\Controllers\API
 */

class DriverLicenseIssuanceAPIController extends AppBaseController
{
    /** @var  DriverLicenseIssuanceRepository */
    private $driverLicenseIssuanceRepository;

    public function __construct(DriverLicenseIssuanceRepository $driverLicenseIssuanceRepo)
    {
        $this->driverLicenseIssuanceRepository = $driverLicenseIssuanceRepo;
    }

    /**
     * Display a listing of the DriverLicenseIssuance.
     * GET|HEAD /driverLicenseIssuances
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read driver license issuance')) {
            return $this->sendError('Permission Denied', 403);
        }

        $driverLicenseIssuances = $this->driverLicenseIssuanceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(DriverLicenseIssuanceResource::collection($driverLicenseIssuances), 'Driver License Issuances retrieved successfully');
    }

    /**
     * Store a newly created DriverLicenseIssuance in storage.
     * POST /driverLicenseIssuances
     *
     * @param CreateDriverLicenseIssuanceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDriverLicenseIssuanceAPIRequest $request)
    {
        if (!checkPermission('create driver license issuance')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $driverLicenseIssuance = $this->driverLicenseIssuanceRepository->create($input);

        return $this->sendResponse(new DriverLicenseIssuanceResource($driverLicenseIssuance), 'Driver License Issuance saved successfully');
    }

    /**
     * Display the specified DriverLicenseIssuance.
     * GET|HEAD /driverLicenseIssuances/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read driver license issuance')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var DriverLicenseIssuance $driverLicenseIssuance */
        $driverLicenseIssuance = $this->driverLicenseIssuanceRepository->find($id);

        if (empty($driverLicenseIssuance)) {
            return $this->sendError('Driver License Issuance not found');
        }

        return $this->sendResponse(new DriverLicenseIssuanceResource($driverLicenseIssuance), 'Driver License Issuance retrieved successfully');
    }

    /**
     * Update the specified DriverLicenseIssuance in storage.
     * PUT/PATCH /driverLicenseIssuances/{id}
     *
     * @param int $id
     * @param UpdateDriverLicenseIssuanceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDriverLicenseIssuanceAPIRequest $request)
    {
        if (!checkPermission('update driver license issuance')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var DriverLicenseIssuance $driverLicenseIssuance */
        $driverLicenseIssuance = $this->driverLicenseIssuanceRepository->find($id);

        if (empty($driverLicenseIssuance)) {
            return $this->sendError('Driver License Issuance not found');
        }

        $driverLicenseIssuance = $this->driverLicenseIssuanceRepository->update($input, $id);

        return $this->sendResponse(new DriverLicenseIssuanceResource($driverLicenseIssuance), 'DriverLicenseIssuance updated successfully');
    }

    /**
     * Remove the specified DriverLicenseIssuance from storage.
     * DELETE /driverLicenseIssuances/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete driver license issuance')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var DriverLicenseIssuance $driverLicenseIssuance */
        $driverLicenseIssuance = $this->driverLicenseIssuanceRepository->find($id);

        if (empty($driverLicenseIssuance)) {
            return $this->sendError('Driver License Issuance not found');
        }

        $driverLicenseIssuance->delete();

        return $this->sendSuccess('Driver License Issuance deleted successfully');
    }
}
