<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGrossDomesticProductAPIRequest;
use App\Http\Requests\API\UpdateGrossDomesticProductAPIRequest;
use App\Models\GrossDomesticProduct;
use App\Repositories\GrossDomesticProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\GrossDomesticProductResource;
use Response;

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
