<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDetilPenjualanAPIRequest;
use App\Http\Requests\API\UpdateDetilPenjualanAPIRequest;
use App\Models\DetilPenjualan;
use App\Repositories\DetilPenjualanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DetilPenjualanController
 * @package App\Http\Controllers\API
 */

class DetilPenjualanAPIController extends AppBaseController
{
    /** @var  DetilPenjualanRepository */
    private $detilPenjualanRepository;

    public function __construct(DetilPenjualanRepository $detilPenjualanRepo)
    {
        $this->detilPenjualanRepository = $detilPenjualanRepo;
    }

    /**
     * Display a listing of the DetilPenjualan.
     * GET|HEAD /detilPenjualans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->detilPenjualanRepository->pushCriteria(new RequestCriteria($request));
        $this->detilPenjualanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $detilPenjualans = $this->detilPenjualanRepository->all();

        return $this->sendResponse($detilPenjualans->toArray(), 'Detil Penjualans retrieved successfully');
    }

    /**
     * Store a newly created DetilPenjualan in storage.
     * POST /detilPenjualans
     *
     * @param CreateDetilPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDetilPenjualanAPIRequest $request)
    {
        $input = $request->all();

        $detilPenjualans = $this->detilPenjualanRepository->create($input);

        return $this->sendResponse($detilPenjualans->toArray(), 'Detil Penjualan saved successfully');
    }

    /**
     * Display the specified DetilPenjualan.
     * GET|HEAD /detilPenjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DetilPenjualan $detilPenjualan */
        $detilPenjualan = $this->detilPenjualanRepository->findWithoutFail($id);

        if (empty($detilPenjualan)) {
            return $this->sendError('Detil Penjualan not found');
        }

        return $this->sendResponse($detilPenjualan->toArray(), 'Detil Penjualan retrieved successfully');
    }

    /**
     * Update the specified DetilPenjualan in storage.
     * PUT/PATCH /detilPenjualans/{id}
     *
     * @param  int $id
     * @param UpdateDetilPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetilPenjualanAPIRequest $request)
    {
        $input = $request->all();

        /** @var DetilPenjualan $detilPenjualan */
        $detilPenjualan = $this->detilPenjualanRepository->findWithoutFail($id);

        if (empty($detilPenjualan)) {
            return $this->sendError('Detil Penjualan not found');
        }

        $detilPenjualan = $this->detilPenjualanRepository->update($input, $id);

        return $this->sendResponse($detilPenjualan->toArray(), 'DetilPenjualan updated successfully');
    }

    /**
     * Remove the specified DetilPenjualan from storage.
     * DELETE /detilPenjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DetilPenjualan $detilPenjualan */
        $detilPenjualan = $this->detilPenjualanRepository->findWithoutFail($id);

        if (empty($detilPenjualan)) {
            return $this->sendError('Detil Penjualan not found');
        }

        $detilPenjualan->delete();

        return $this->sendResponse($id, 'Detil Penjualan deleted successfully');
    }
}
