<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMaritimeAdministrationAPIRequest;
use App\Http\Requests\API\UpdateMaritimeAdministrationAPIRequest;
use App\Models\MaritimeAdministration;
use App\Repositories\MaritimeAdministrationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MaritimeAdministrationController
 * @package App\Http\Controllers\API
 */

class MaritimeAdministrationAPIController extends AppBaseController
{
    /** @var  MaritimeAdministrationRepository */
    private $maritimeAdministrationRepository;

    public function __construct(MaritimeAdministrationRepository $maritimeAdministrationRepo)
    {
        $this->maritimeAdministrationRepository = $maritimeAdministrationRepo;
    }

    /**
     * Display a listing of the MaritimeAdministration.
     * GET|HEAD /maritimeAdministrations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read maritime administration')) {
            return $this->sendError('Permission Denied', 403);
        }

        $maritimeAdministrations = $this->maritimeAdministrationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($maritimeAdministrations->toArray(), 'Maritime Administrations retrieved successfully');
    }

    /**
     * Store a newly created MaritimeAdministration in storage.
     * POST /maritimeAdministrations
     *
     * @param CreateMaritimeAdministrationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMaritimeAdministrationAPIRequest $request)
    {
        if (!checkPermission('create maritime administration')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $maritimeAdministration = $this->maritimeAdministrationRepository->create($input);

        return $this->sendResponse($maritimeAdministration->toArray(), 'Maritime Administration saved successfully');
    }

    /**
     * Display the specified MaritimeAdministration.
     * GET|HEAD /maritimeAdministrations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(!checkPermission('read maritime administration')) {
            return $this->sendError('Permission Denied', 403);
        }
        /** @var MaritimeAdministration $maritimeAdministration */
        $maritimeAdministration = $this->maritimeAdministrationRepository->find($id);

        if (empty($maritimeAdministration)) {
            return $this->sendError('Maritime Administration not found');
        }

        return $this->sendResponse($maritimeAdministration->toArray(), 'Maritime Administration retrieved successfully');
    }

    /**
     * Update the specified MaritimeAdministration in storage.
     * PUT/PATCH /maritimeAdministrations/{id}
     *
     * @param int $id
     * @param UpdateMaritimeAdministrationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMaritimeAdministrationAPIRequest $request)
    {
        if(!checkPermission('update maritime administration')) {
            return $this->sendError('Permission Denied', 403);
        }
        $input = $request->all();

        /** @var MaritimeAdministration $maritimeAdministration */
        $maritimeAdministration = $this->maritimeAdministrationRepository->find($id);

        if (empty($maritimeAdministration)) {
            return $this->sendError('Maritime Administration not found');
        }

        $maritimeAdministration = $this->maritimeAdministrationRepository->update($input, $id);

        return $this->sendResponse($maritimeAdministration->toArray(), 'Maritime Administration updated successfully');
    }

    /**
     * Remove the specified MaritimeAdministration from storage.
     * DELETE /maritimeAdministrations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(!checkPermission('delete maritime administration')) {
            return $this->sendError('Permission Denied', 403);
        }
        /** @var MaritimeAdministration $maritimeAdministration */
        $maritimeAdministration = $this->maritimeAdministrationRepository->find($id);

        if (empty($maritimeAdministration)) {
            return $this->sendError('Maritime Administration not found');
        }

        $maritimeAdministration->delete();

        return $this->sendSuccess('Maritime Administration deleted successfully');
    }
}
