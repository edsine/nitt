<?php

namespace App\Http\Controllers\API;

use Response;
use Illuminate\Http\Request;
use App\Models\RailwayPassenger;
use App\Imports\RailwayPassengerImport;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\AppBaseController;
use App\Repositories\RailwayPassengerRepository;
use App\Http\Requests\API\CreateRailwayPassengerAPIRequest;
use App\Http\Requests\API\UpdateRailwayPassengerAPIRequest;

/**
 * Class RailwayPassengerController
 * @package App\Http\Controllers\API
 */

class RailwayPassengerAPIController extends AppBaseController
{
    /** @var  RailwayPassengerRepository */
    private $railwayPassengerRepository;

    public function __construct(RailwayPassengerRepository $railwayPassengerRepo)
    {
        $this->railwayPassengerRepository = $railwayPassengerRepo;
    }

    /**
     * Display a listing of the RailwayPassenger.
     * GET|HEAD /railwayPassengers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(!checkPermission('read railway passenger')) {
            return $this->sendError('Permission Denied', 403);
        }

        $railwayPassengers = $this->railwayPassengerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($railwayPassengers->toArray(), 'Railway Passengers retrieved successfully');
    }

    private function formatData($data, $field)
    {
        $formatted = [];

        foreach ($data as $item) {
            $formatted[$item->year] = $item->$field;
        }

        return $formatted;
    }


    public function indexFormatted(Request $request)
    {
        $railwayPassenger = $this->railwayPassengerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        $formattedData = [
            'Passenger Volume' => $this->formatData($railwayPassenger, 'passengers_carried'),
            'Revenue (₦)' => $this->formatData($railwayPassenger, 'passenger_revenue_generation'),
        ];

        return $this->sendResponse(["name" => "Rail Passenger Traffic Data and Revenue accrued from 1964 to 2022", "data" => $formattedData], 'Railway Passengers retrieved successfully');
    }

    public function indexFormattedFreight(Request $request)
    {
        $railwayPassenger = $this->railwayPassengerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        $formattedData = [
            'Freight Volume' => $this->formatData($railwayPassenger, 'freight_carried'),
            'Revenue (₦)' => $this->formatData($railwayPassenger, 'freight_revenue_generation'),
        ];

        return $this->sendResponse(["name" => "Freight (Tons) and Revenue (₦) data from 1964 to 2022", "data" => $formattedData], 'Railway Freight retrieved successfully');
    }

    /**
     * Store a newly created RailwayPassenger in storage.
     * POST /railwayPassengers
     *
     * @param CreateRailwayPassengerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRailwayPassengerAPIRequest $request)
    {
        if(!checkPermission('create railway passenger')) {
            return $this->sendError('Permission Denied', 403);
        }
        $input = $request->all();

        $railwayPassenger = $this->railwayPassengerRepository->create($input);

        return $this->sendResponse($railwayPassenger->toArray(), 'Railway Passenger saved successfully');
    }

    /**
     * Upload RailwaysPassenger in storage.
     * POST /railwaysPassenger/upload
     *
     *
     * @return Response
     */
    public function bulkUpload(Request $request)
    {
        if (!checkPermission('create railway passenger')) {
            return $this->sendError('Permission Denied', 403);
        }

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $file = $request->file('file');

        $response = (new RailwayPassengerImport)->import($file);

        if (!$response['status']) {
            return $this->sendError('File import error: ' . $response['message'], 422);
        } else {
            return $this->sendSuccess("File imported successfully");
        }
    }

    /**
     * Display the specified RailwayPassenger.
     * GET|HEAD /railwayPassengers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(!checkPermission('read railway passenger')) {
            return $this->sendError('Permission Denied', 403);
        }
        /** @var RailwayPassenger $railwayPassenger */
        $railwayPassenger = $this->railwayPassengerRepository->find($id);

        if (empty($railwayPassenger)) {
            return $this->sendError('Railway Passenger not found');
        }

        return $this->sendResponse($railwayPassenger->toArray(), 'Railway Passenger retrieved successfully');
    }

    /**
     * Update the specified RailwayPassenger in storage.
     * PUT/PATCH /railwayPassengers/{id}
     *
     * @param int $id
     * @param UpdateRailwayPassengerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRailwayPassengerAPIRequest $request)
    {
        if(!checkPermission('update railway passenger')) {
            return $this->sendError('Permission Denied', 403);
        }
        $input = $request->all();

        /** @var RailwayPassenger $railwayPassenger */
        $railwayPassenger = $this->railwayPassengerRepository->find($id);

        if (empty($railwayPassenger)) {
            return $this->sendError('Railway Passenger not found');
        }

        $railwayPassenger = $this->railwayPassengerRepository->update($input, $id);

        return $this->sendResponse($railwayPassenger->toArray(), 'Railway Passenger updated successfully');
    }

    /**
     * Remove the specified RailwayPassenger from storage.
     * DELETE /railwayPassengers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(!checkPermission('delete railway passenger')) {
            return $this->sendError('Permission Denied', 403);
        }
        /** @var RailwayPassenger $railwayPassenger */
        $railwayPassenger = $this->railwayPassengerRepository->find($id);

        if (empty($railwayPassenger)) {
            return $this->sendError('Railway Passenger not found');
        }

        $railwayPassenger->delete();

        return $this->sendSuccess('Railway Passenger deleted successfully');
    }
}
