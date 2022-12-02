<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSampleAPIRequest;
use App\Http\Requests\API\UpdateSampleAPIRequest;
use App\Models\Sample;
use App\Repositories\SampleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SampleController
 * @package App\Http\Controllers\API
 */

class SampleAPIController extends AppBaseController
{
    /** @var  SampleRepository */
    private $sampleRepository;

    public function __construct(SampleRepository $sampleRepo)
    {
        $this->sampleRepository = $sampleRepo;
    }

    /**
     * Display a listing of the Sample.
     * GET|HEAD /samples
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $samples = $this->sampleRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($samples->toArray(), 'Samples retrieved successfully');
    }

    /**
     * Store a newly created Sample in storage.
     * POST /samples
     *
     * @param CreateSampleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSampleAPIRequest $request)
    {
        $input = $request->all();

        $sample = $this->sampleRepository->create($input);

        return $this->sendResponse($sample->toArray(), 'Sample saved successfully');
    }

    /**
     * Display the specified Sample.
     * GET|HEAD /samples/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Sample $sample */
        $sample = $this->sampleRepository->find($id);

        if (empty($sample)) {
            return $this->sendError('Sample not found');
        }

        return $this->sendResponse($sample->toArray(), 'Sample retrieved successfully');
    }

    /**
     * Update the specified Sample in storage.
     * PUT/PATCH /samples/{id}
     *
     * @param int $id
     * @param UpdateSampleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSampleAPIRequest $request)
    {
        $input = $request->all();

        /** @var Sample $sample */
        $sample = $this->sampleRepository->find($id);

        if (empty($sample)) {
            return $this->sendError('Sample not found');
        }

        $sample = $this->sampleRepository->update($input, $id);

        return $this->sendResponse($sample->toArray(), 'Sample updated successfully');
    }

    /**
     * Remove the specified Sample from storage.
     * DELETE /samples/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Sample $sample */
        $sample = $this->sampleRepository->find($id);

        if (empty($sample)) {
            return $this->sendError('Sample not found');
        }

        $sample->delete();

        return $this->sendSuccess('Sample deleted successfully');
    }
}
