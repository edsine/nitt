<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRailwayRollingStockAPIRequest;
use App\Http\Requests\API\UpdateRailwayRollingStockAPIRequest;
use App\Models\RailwayRollingStock;
use App\Repositories\RailwayRollingStockRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RailwayRollingStockController
 * @package App\Http\Controllers\API
 */

class RailwayRollingStockAPIController extends AppBaseController
{
    /** @var  RailwayRollingStockRepository */
    private $railwayRollingStockRepository;

    public function __construct(RailwayRollingStockRepository $railwayRollingStockRepo)
    {
        $this->railwayRollingStockRepository = $railwayRollingStockRepo;
    }

    /**
     * Display a listing of the RailwayRollingStock.
     * GET|HEAD /railwayRollingStocks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(!checkPermission('read railway rolling stock')) {
            return $this->sendError('Permission Denied', 403);
        }

        $railwayRollingStocks = $this->railwayRollingStockRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($railwayRollingStocks->toArray(), 'Railway Rolling Stocks retrieved successfully');
    }

    /**
     * Store a newly created RailwayRollingStock in storage.
     * POST /railwayRollingStocks
     *
     * @param CreateRailwayRollingStockAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRailwayRollingStockAPIRequest $request)
    {
        if(!checkPermission('create railway rolling stock')) {
            return $this->sendError('Permission Denied', 403);
        }

        $input = $request->all();

        $railwayRollingStock = $this->railwayRollingStockRepository->create($input);

        return $this->sendResponse($railwayRollingStock->toArray(), 'Railway Rolling Stock saved successfully');
    }

    /**
     * Display the specified RailwayRollingStock.
     * GET|HEAD /railwayRollingStocks/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(!checkPermission('read railway rolling stock')) {
            return $this->sendError('Permission Denied', 403);
        }
        /** @var RailwayRollingStock $railwayRollingStock */
        $railwayRollingStock = $this->railwayRollingStockRepository->find($id);

        if (empty($railwayRollingStock)) {
            return $this->sendError('Railway Rolling Stock not found');
        }

        return $this->sendResponse($railwayRollingStock->toArray(), 'Railway Rolling Stock retrieved successfully');
    }

    /**
     * Update the specified RailwayRollingStock in storage.
     * PUT/PATCH /railwayRollingStocks/{id}
     *
     * @param int $id
     * @param UpdateRailwayRollingStockAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRailwayRollingStockAPIRequest $request)
    {
        if(!checkPermission('update railway rolling stock')) {
            return $this->sendError('Permission Denied', 403);
        }
        $input = $request->all();

        /** @var RailwayRollingStock $railwayRollingStock */
        $railwayRollingStock = $this->railwayRollingStockRepository->find($id);

        if (empty($railwayRollingStock)) {
            return $this->sendError('Railway Rolling Stock not found');
        }

        $railwayRollingStock = $this->railwayRollingStockRepository->update($input, $id);

        return $this->sendResponse($railwayRollingStock->toArray(), 'Railway Rolling Stock updated successfully');
    }

    /**
     * Remove the specified RailwayRollingStock from storage.
     * DELETE /railwayRollingStocks/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(!checkPermission('delete railway rolling stock')) {
            return $this->sendError('Permission Denied', 403);
        }
        /** @var RailwayRollingStock $railwayRollingStock */
        $railwayRollingStock = $this->railwayRollingStockRepository->find($id);

        if (empty($railwayRollingStock)) {
            return $this->sendError('Railway Rolling Stock not found');
        }

        $railwayRollingStock->delete();

        return $this->sendSuccess('Railway Rolling Stock deleted successfully');
    }
}
