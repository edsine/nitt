<?php

namespace App\Http\Controllers\API;

use Response;
use Illuminate\Http\Request;
use App\Models\GrossDomesticProduct;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\AppBaseController;
use App\Imports\GrossDomesticProductImport;
use App\Http\Resources\GrossDomesticProductResource;
use App\Repositories\GrossDomesticProductRepository;
use App\Http\Requests\API\CreateGrossDomesticProductAPIRequest;
use App\Http\Requests\API\UpdateGrossDomesticProductAPIRequest;

/**
 * Class GrossDomesticProductController
 * @package App\Http\Controllers\API
 */

class GrossDomesticProductAPIController extends AppBaseController
{
    /** @var  GrossDomesticProductRepository */
    private $grossDomesticProductRepository;

    public function __construct(GrossDomesticProductRepository $grossDomesticProductRepo)
    {
        $this->grossDomesticProductRepository = $grossDomesticProductRepo;
    }

    /**
     * Display a listing of the GrossDomesticProduct.
     * GET|HEAD /grossDomesticProducts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (!checkPermission('read gross domestic product')) {
            return $this->sendError('Permission Denied', 403);
        }

        $grossDomesticProducts = $this->grossDomesticProductRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(GrossDomesticProductResource::collection($grossDomesticProducts), 'Gross Domestic Products retrieved successfully');
    }

    private function formatData($data, $field)
    {
        $formatted = [];

        foreach ($data as $item) {
            $formatted[$item->year] = $item->$field;
        }

        return $formatted;
    }

    private function formatDataByPercentage($data, $field)
    {
        $formatted = [];

        // Calculate the total of all transportation modes for each year
        foreach ($data as $item) {
            $total = $item->road_transport + $item->rail_transport_and_pipelines +
                $item->water_transport + $item->air_transport +
                $item->pipeline_transport + $item->post_and_courierservices;

            // Calculate the percentage for the specified field
            if ($total != 0) {
                $formatted[$item->year] = number_format(($item->$field / $total) * 100, 2) . '%';
            } else {
                // Handle the case where total is zero to avoid division by zero error
                $formatted[$item->year] = '0%';
            }
        }

        return $formatted;
    }


    public function indexFormatted(Request $request)
    {
        $grossDomesticProducts = $this->grossDomesticProductRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        $formattedData = [
            'Road Transport' => $this->formatData($grossDomesticProducts, 'road_transport'),
            'Rail Transport and Pipelines' => $this->formatData($grossDomesticProducts, 'rail_transport_and_pipelines'),
            'Water Transport' => $this->formatData($grossDomesticProducts, 'water_transport'),
            'Air Transport' => $this->formatData($grossDomesticProducts, 'air_transport'),
            'Pipeline Transport' => $this->formatData($grossDomesticProducts, 'pipeline_transport'),
            'Post and Courier Services' => $this->formatData($grossDomesticProducts, 'post_and_courierservices'),
        ];

        return $this->sendResponse(["name" => "Gross Domestic Product at Current Basic Prices From 1981-2021 - Annual 1 (₦ Billion)", "data" => $formattedData], 'Gross Domestic Products retrieved successfully');
    }

    public function indexFormattedByPercentage(Request $request)
    {
        $grossDomesticProducts = $this->grossDomesticProductRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        $formattedData = [
            'Road Transport' => $this->formatDataByPercentage($grossDomesticProducts, 'road_transport'),
            'Rail Transport and Pipelines' => $this->formatDataByPercentage($grossDomesticProducts, 'rail_transport_and_pipelines'),
            'Water Transport' => $this->formatDataByPercentage($grossDomesticProducts, 'water_transport'),
            'Air Transport' => $this->formatDataByPercentage($grossDomesticProducts, 'air_transport'),
            'Pipeline Transport' => $this->formatDataByPercentage($grossDomesticProducts, 'pipeline_transport'),
            'Post and Courier Services' => $this->formatDataByPercentage($grossDomesticProducts, 'post_and_courierservices'),
        ];

        return $this->sendResponse(["name" => "Gross Domestic Product at Current Basic Prices From 1981-2021 - Annual (%)", "data" => $formattedData], 'Gross Domestic Products retrieved successfully');
    }

    /**
     * Store a newly created GrossDomesticProduct in storage.
     * POST /grossDomesticProducts
     *
     * @param CreateGrossDomesticProductAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGrossDomesticProductAPIRequest $request)
    {
        if (!checkPermission('create gross domestic product')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $grossDomesticProduct = $this->grossDomesticProductRepository->create($input);

        return $this->sendResponse(new GrossDomesticProductResource($grossDomesticProduct), 'Gross Domestic Product saved successfully');
    }

    /**
     * Upload GrossDomesticProduct in storage.
     * POST /grossDomesticProducts/upload
     *
     * @param CreateGrossDomesticProductAPIRequest $request
     *
     * @return Response
     */
    public function bulkUpload(Request $request)
    {
        if (!checkPermission('create gross domestic product')) {
            return $this->sendError('Permission Denied', 403);
        }

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $file = $request->file('file');

        $response = (new GrossDomesticProductImport)->import($file);

        if (!$response['status']) {
            return $this->sendError('File import error: ' . $response['message'], 422);
        } else {
            return $this->sendSuccess("File imported successfully");
        }
    }

    /**
     * Display the specified GrossDomesticProduct.
     * GET|HEAD /grossDomesticProducts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (!checkPermission('read gross domestic product')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var GrossDomesticProduct $grossDomesticProduct */
        $grossDomesticProduct = $this->grossDomesticProductRepository->find($id);

        if (empty($grossDomesticProduct)) {
            return $this->sendError('Gross Domestic Product not found');
        }

        return $this->sendResponse(new GrossDomesticProductResource($grossDomesticProduct), 'Gross Domestic Product retrieved successfully');
    }

    /**
     * Update the specified GrossDomesticProduct in storage.
     * PUT/PATCH /grossDomesticProducts/{id}
     *
     * @param int $id
     * @param UpdateGrossDomesticProductAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGrossDomesticProductAPIRequest $request)
    {
        if (!checkPermission('update gross domestic product')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        /** @var GrossDomesticProduct $grossDomesticProduct */
        $grossDomesticProduct = $this->grossDomesticProductRepository->find($id);

        if (empty($grossDomesticProduct)) {
            return $this->sendError('Gross Domestic Product not found');
        }

        $grossDomesticProduct = $this->grossDomesticProductRepository->update($input, $id);

        return $this->sendResponse(new GrossDomesticProductResource($grossDomesticProduct), 'GrossDomesticProduct updated successfully');
    }

    /**
     * Remove the specified GrossDomesticProduct from storage.
     * DELETE /grossDomesticProducts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (!checkPermission('delete gross domestic product')) {
            return $this->sendError('Permission Denied', 403);
        }

        /** @var GrossDomesticProduct $grossDomesticProduct */
        $grossDomesticProduct = $this->grossDomesticProductRepository->find($id);

        if (empty($grossDomesticProduct)) {
            return $this->sendError('Gross Domestic Product not found');
        }

        $grossDomesticProduct->delete();

        return $this->sendSuccess('Gross Domestic Product deleted successfully');
    }
}
