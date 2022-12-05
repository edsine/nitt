<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMaritimeTransportAPIRequest;
use App\Http\Requests\API\UpdateMaritimeTransportAPIRequest;
use App\Models\MaritimeTransport;
use App\Repositories\MaritimeTransportRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MaritimeTransportController
 * @package App\Http\Controllers\API
 */

class MaritimeTransportAPIController extends AppBaseController
{
    /** @var  MaritimeTransportRepository */
    private $maritimeTransportRepository;

    public function __construct(MaritimeTransportRepository $maritimeTransportRepo)
    {
        $this->maritimeTransportRepository = $maritimeTransportRepo;
    }

    /**
     * Display a listing of the MaritimeTransport.
     * GET|HEAD /maritimeTransports
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $maritimeTransports = $this->maritimeTransportRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($maritimeTransports->toArray(), 'Maritime Transports retrieved successfully');
    }

    /**
     * Store a newly created MaritimeTransport in storage.
     * POST /maritimeTransports
     *
     * @param CreateMaritimeTransportAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMaritimeTransportAPIRequest $request)
    {
        $input = $request->all();

        $maritimeTransport = $this->maritimeTransportRepository->create($input);

        return $this->sendResponse($maritimeTransport->toArray(), 'Maritime Transport saved successfully');
    }

    /**
     * Display the specified MaritimeTransport.
     * GET|HEAD /maritimeTransports/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MaritimeTransport $maritimeTransport */
        $maritimeTransport = $this->maritimeTransportRepository->find($id);

        if (empty($maritimeTransport)) {
            return $this->sendError('Maritime Transport not found');
        }

        return $this->sendResponse($maritimeTransport->toArray(), 'Maritime Transport retrieved successfully');
    }

    /**
     * Update the specified MaritimeTransport in storage.
     * PUT/PATCH /maritimeTransports/{id}
     *
     * @param int $id
     * @param UpdateMaritimeTransportAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMaritimeTransportAPIRequest $request)
    {
        $input = $request->all();

        /** @var MaritimeTransport $maritimeTransport */
        $maritimeTransport = $this->maritimeTransportRepository->find($id);

        if (empty($maritimeTransport)) {
            return $this->sendError('Maritime Transport not found');
        }

        $maritimeTransport = $this->maritimeTransportRepository->update($input, $id);

        return $this->sendResponse($maritimeTransport->toArray(), 'MaritimeTransport updated successfully');
    }

    /**
     * Remove the specified MaritimeTransport from storage.
     * DELETE /maritimeTransports/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MaritimeTransport $maritimeTransport */
        $maritimeTransport = $this->maritimeTransportRepository->find($id);

        if (empty($maritimeTransport)) {
            return $this->sendError('Maritime Transport not found');
        }

        $maritimeTransport->delete();

        return $this->sendSuccess('Maritime Transport deleted successfully');
    }
}
