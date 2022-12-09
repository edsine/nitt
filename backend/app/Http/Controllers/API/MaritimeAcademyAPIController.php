<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMaritimeAcademyAPIRequest;
use App\Http\Requests\API\UpdateMaritimeAcademyAPIRequest;
use App\Models\MaritimeAcademy;
use App\Repositories\MaritimeAcademyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MaritimeAcademyController
 * @package App\Http\Controllers\API
 */

class MaritimeAcademyAPIController extends AppBaseController
{
    /** @var  MaritimeAcademyRepository */
    private $maritimeAcademyRepository;

    public function __construct(MaritimeAcademyRepository $maritimeAcademyRepo)
    {
        $this->maritimeAcademyRepository = $maritimeAcademyRepo;
    }

    /**
     * Display a listing of the MaritimeAcademy.
     * GET|HEAD /maritimeAcademies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(!checkPermission('read maritime academy')) {
            return $this->sendError('Permission Denied', 403);
        }

        $maritimeAcademies = $this->maritimeAcademyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($maritimeAcademies->toArray(), 'Maritime Academies retrieved successfully');
    }

    /**
     * Store a newly created MaritimeAcademy in storage.
     * POST /maritimeAcademies
     *
     * @param CreateMaritimeAcademyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMaritimeAcademyAPIRequest $request)
    {
        if(!checkPermission('create maritime academy')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $maritimeAcademy = $this->maritimeAcademyRepository->create($input);

        return $this->sendResponse($maritimeAcademy->toArray(), 'Maritime Academy saved successfully');
    }

    /**
     * Display the specified MaritimeAcademy.
     * GET|HEAD /maritimeAcademies/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(!checkPermission('read maritime academy')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var MaritimeAcademy $maritimeAcademy */
        $maritimeAcademy = $this->maritimeAcademyRepository->find($id);

        if (empty($maritimeAcademy)) {
            return $this->sendError('Maritime Academy not found');
        }

        return $this->sendResponse($maritimeAcademy->toArray(), 'Maritime Academy retrieved successfully');
    }

    /**
     * Update the specified MaritimeAcademy in storage.
     * PUT/PATCH /maritimeAcademies/{id}
     *
     * @param int $id
     * @param UpdateMaritimeAcademyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMaritimeAcademyAPIRequest $request)
    {
        if(!checkPermission('update maritime academy')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var MaritimeAcademy $maritimeAcademy */
        $maritimeAcademy = $this->maritimeAcademyRepository->find($id);

        if (empty($maritimeAcademy)) {
            return $this->sendError('Maritime Academy not found');
        }

        $maritimeAcademy = $this->maritimeAcademyRepository->update($input, $id);

        return $this->sendResponse($maritimeAcademy->toArray(), 'Maritime Academy updated successfully');
    }

    /**
     * Remove the specified MaritimeAcademy from storage.
     * DELETE /maritimeAcademies/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(!checkPermission('delete maritime academy')) {
            return $this->sendError('Permission Denied', 403);
        }
        /** @var MaritimeAcademy $maritimeAcademy */
        $maritimeAcademy = $this->maritimeAcademyRepository->find($id);

        if (empty($maritimeAcademy)) {
            return $this->sendError('Maritime Academy not found');
        }

        $maritimeAcademy->delete();

        return $this->sendSuccess('Maritime Academy deleted successfully');
    }
}
