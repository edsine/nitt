<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLicenseRenewalAPIRequest;
use App\Http\Requests\API\UpdateLicenseRenewalAPIRequest;
use App\Models\LicenseRenewal;
use App\Repositories\LicenseRenewalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\LicenseRenewalResource;
use Response;

/**
 * Class LicenseRenewalController
 * @package App\Http\Controllers\API
 */

class LicenseRenewalAPIController extends AppBaseController
{
    /** @var  LicenseRenewalRepository */
    private $licenseRenewalRepository;

    public function __construct(LicenseRenewalRepository $licenseRenewalRepo)
    {
        $this->licenseRenewalRepository = $licenseRenewalRepo;
    }

    /**
     * Display a listing of the LicenseRenewal.
     * GET|HEAD /licenseRenewals
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read license renewal')) {
            return $this->sendError('Permission Denied', 403);
        }

        $licenseRenewals = $this->licenseRenewalRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(LicenseRenewalResource::collection($licenseRenewals), 'License Renewals retrieved successfully');
    }

    /**
     * Store a newly created LicenseRenewal in storage.
     * POST /licenseRenewals
     *
     * @param CreateLicenseRenewalAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLicenseRenewalAPIRequest $request)
    {
        if (!checkPermission('create license renewal')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $licenseRenewal = $this->licenseRenewalRepository->create($input);

        return $this->sendResponse(new LicenseRenewalResource($licenseRenewal), 'License Renewal saved successfully');
    }

    /**
     * Display the specified LicenseRenewal.
     * GET|HEAD /licenseRenewals/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read license renewal')) {
            return $this->sendError('Permission Denied', 403);
        }
        /** @var LicenseRenewal $licenseRenewal */
        $licenseRenewal = $this->licenseRenewalRepository->find($id);

        if (empty($licenseRenewal)) {
            return $this->sendError('License Renewal not found');
        }

        return $this->sendResponse(new LicenseRenewalResource($licenseRenewal), 'License Renewal retrieved successfully');
    }

    /**
     * Update the specified LicenseRenewal in storage.
     * PUT/PATCH /licenseRenewals/{id}
     *
     * @param int $id
     * @param UpdateLicenseRenewalAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLicenseRenewalAPIRequest $request)
    {
        if (!checkPermission('update license renewal')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var LicenseRenewal $licenseRenewal */
        $licenseRenewal = $this->licenseRenewalRepository->find($id);

        if (empty($licenseRenewal)) {
            return $this->sendError('License Renewal not found');
        }

        $licenseRenewal = $this->licenseRenewalRepository->update($input, $id);

        return $this->sendResponse(new LicenseRenewalResource($licenseRenewal), 'LicenseRenewal updated successfully');
    }

    /**
     * Remove the specified LicenseRenewal from storage.
     * DELETE /licenseRenewals/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete license renewal')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var LicenseRenewal $licenseRenewal */
        $licenseRenewal = $this->licenseRenewalRepository->find($id);

        if (empty($licenseRenewal)) {
            return $this->sendError('License Renewal not found');
        }

        $licenseRenewal->delete();

        return $this->sendSuccess('License Renewal deleted successfully');
    }
}
