<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTrainPunctualityAPIRequest;
use App\Http\Requests\API\UpdateTrainPunctualityAPIRequest;
use App\Models\TrainPunctuality;
use App\Repositories\TrainPunctualityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TrainPunctualityController
 * @package App\Http\Controllers\API
 */

class TrainPunctualityAPIController extends AppBaseController
{
    /** @var  TrainPunctualityRepository */
    private $trainPunctualityRepository;

    public function __construct(TrainPunctualityRepository $trainPunctualityRepo)
    {
        $this->trainPunctualityRepository = $trainPunctualityRepo;
    }

    /**
     * Display a listing of the TrainPunctuality.
     * GET|HEAD /trainPunctualities
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(!checkPermission('read train punctuality')) {
            return $this->sendError('Permission Denied', 403);
        }

        $trainPunctualities = $this->trainPunctualityRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($trainPunctualities->toArray(), 'Train Punctualities retrieved successfully');
    }

    /**
     * Store a newly created TrainPunctuality in storage.
     * POST /trainPunctualities
     *
     * @param CreateTrainPunctualityAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTrainPunctualityAPIRequest $request)
    {
        if(!checkPermission('create train punctuality')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $trainPunctuality = $this->trainPunctualityRepository->create($input);

        return $this->sendResponse($trainPunctuality->toArray(), 'Train Punctuality saved successfully');
    }

    /**
     * Display the specified TrainPunctuality.
     * GET|HEAD /trainPunctualities/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(!checkPermission('read train punctuality')) {
            return $this->sendError('Permission Denied', 403);
        }
        /** @var TrainPunctuality $trainPunctuality */
        $trainPunctuality = $this->trainPunctualityRepository->find($id);

        if (empty($trainPunctuality)) {
            return $this->sendError('Train Punctuality not found');
        }

        return $this->sendResponse($trainPunctuality->toArray(), 'Train Punctuality retrieved successfully');
    }

    /**
     * Update the specified TrainPunctuality in storage.
     * PUT/PATCH /trainPunctualities/{id}
     *
     * @param int $id
     * @param UpdateTrainPunctualityAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrainPunctualityAPIRequest $request)
    {
        if(!checkPermission('update train punctuality')) {
            return $this->sendError('Permission Denied', 403);
        }
        $input = $request->all();

        /** @var TrainPunctuality $trainPunctuality */
        $trainPunctuality = $this->trainPunctualityRepository->find($id);

        if (empty($trainPunctuality)) {
            return $this->sendError('Train Punctuality not found');
        }

        $trainPunctuality = $this->trainPunctualityRepository->update($input, $id);

        return $this->sendResponse($trainPunctuality->toArray(), 'Train Punctuality updated successfully');
    }

    /**
     * Remove the specified TrainPunctuality from storage.
     * DELETE /trainPunctualities/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(!checkPermission('delete train punctuality')) {
            return $this->sendError('Permission Denied', 403);
        }
        /** @var TrainPunctuality $trainPunctuality */
        $trainPunctuality = $this->trainPunctualityRepository->find($id);

        if (empty($trainPunctuality)) {
            return $this->sendError('Train Punctuality not found');
        }

        $trainPunctuality->delete();

        return $this->sendSuccess('Train Punctuality deleted successfully');
    }
}
