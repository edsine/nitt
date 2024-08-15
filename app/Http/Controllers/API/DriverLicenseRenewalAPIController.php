<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDriverLicenseRenewalAPIRequest;
use App\Http\Requests\API\UpdateDriverLicenseRenewalAPIRequest;
use App\Models\DriverLicenseRenewal;
use App\Repositories\DriverLicenseRenewalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\DriverLicenseRenewalResource;
use Response;

/**
 * Class DriverLicenseRenewalController
 * @package App\Http\Controllers\API
 */

class DriverLicenseRenewalAPIController extends AppBaseController
{
    /** @var  DriverLicenseRenewalRepository */
    private $driverLicenseRenewalRepository;

    public function __construct(DriverLicenseRenewalRepository $driverLicenseRenewalRepo)
    {
        $this->driverLicenseRenewalRepository = $driverLicenseRenewalRepo;
    }

    /**
     * Display a listing of the DriverLicenseRenewal.
     * GET|HEAD /driverLicenseRenewals
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read driver license renewal')) {
            return $this->sendError('Permission Denied', 403);
        }

        $driverLicenseRenewals = $this->driverLicenseRenewalRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(DriverLicenseRenewalResource::collection($driverLicenseRenewals), 'Driver License Renewals retrieved successfully');
    }

    /**
     * Store a newly created DriverLicenseRenewal in storage.
     * POST /driverLicenseRenewals
     *
     * @param CreateDriverLicenseRenewalAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDriverLicenseRenewalAPIRequest $request)
    {
        if (!checkPermission('create driver license renewal')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $driverLicenseRenewal = $this->driverLicenseRenewalRepository->create($input);

        return $this->sendResponse(new DriverLicenseRenewalResource($driverLicenseRenewal), 'Driver License Renewal saved successfully');
    }

    /**
     * Display the specified DriverLicenseRenewal.
     * GET|HEAD /driverLicenseRenewals/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read driver license renewal')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var DriverLicenseRenewal $driverLicenseRenewal */
        $driverLicenseRenewal = $this->driverLicenseRenewalRepository->find($id);

        if (empty($driverLicenseRenewal)) {
            return $this->sendError('Driver License Renewal not found');
        }

        return $this->sendResponse(new DriverLicenseRenewalResource($driverLicenseRenewal), 'Driver License Renewal retrieved successfully');
    }

    /**
     * Update the specified DriverLicenseRenewal in storage.
     * PUT/PATCH /driverLicenseRenewals/{id}
     *
     * @param int $id
     * @param UpdateDriverLicenseRenewalAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDriverLicenseRenewalAPIRequest $request)
    {
        if (!checkPermission('update driver license renewal')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var DriverLicenseRenewal $driverLicenseRenewal */
        $driverLicenseRenewal = $this->driverLicenseRenewalRepository->find($id);

        if (empty($driverLicenseRenewal)) {
            return $this->sendError('Driver License Renewal not found');
        }

        $driverLicenseRenewal = $this->driverLicenseRenewalRepository->update($input, $id);

        return $this->sendResponse(new DriverLicenseRenewalResource($driverLicenseRenewal), 'DriverLicenseRenewal updated successfully');
    }

    /**
     * Remove the specified DriverLicenseRenewal from storage.
     * DELETE /driverLicenseRenewals/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete driver license renewal')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var DriverLicenseRenewal $driverLicenseRenewal */
        $driverLicenseRenewal = $this->driverLicenseRenewalRepository->find($id);

        if (empty($driverLicenseRenewal)) {
            return $this->sendError('Driver License Renewal not found');
        }

        $driverLicenseRenewal->delete();

        return $this->sendSuccess('Driver License Renewal deleted successfully');
    }
}
