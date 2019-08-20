<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReturnPenjualanAPIRequest;
use App\Http\Requests\API\UpdateReturnPenjualanAPIRequest;
use App\Models\ReturnPenjualan;
use App\Repositories\ReturnPenjualanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
Use DB;
use App\Models\Site;
use App\User;
use App\Models\DetilPenjualan;

/**
 * Class ReturnPenjualanController
 * @package App\Http\Controllers\API
 */

class ReturnPenjualanAPIController extends AppBaseController
{
    /** @var  ReturnPenjualanRepository */
    private $returnPenjualanRepository;

    public function __construct(ReturnPenjualanRepository $returnPenjualanRepo)
    {
        $this->returnPenjualanRepository = $returnPenjualanRepo;
    }

    /**
     * Display a listing of the ReturnPenjualan.
     * GET|HEAD /returnPenjualans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->returnPenjualanRepository->pushCriteria(new RequestCriteria($request));
        $this->returnPenjualanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $returnPenjualans = $this->returnPenjualanRepository->all();

        return $this->sendResponse($returnPenjualans->toArray(), 'Return Penjualans retrieved successfully');
    }

    /**
     * Store a newly created ReturnPenjualan in storage.
     * POST /returnPenjualans
     *
     * @param CreateReturnPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateReturnPenjualanAPIRequest $request)
    {
        $input = $request->all(); 
        try {
            DB::beginTransaction();
        foreach ($input['data'] as $returnPenjualans) {
        if(!isset($returnPenjualans['id'])){
            $returnPenjualans['id']=Uuid::uuid4();
        }
            $treturnPenjualans=ReturnPenjualan::create($returnPenjualans);
        }
            DB::commit(); 
        } catch (Exception $e) {
             DB::rollback();
                return $this->sendError('Return Penjualan not save');
        }

        return $this->sendResponse($treturnPenjualans->load('site'), 'Return Penjualan saved successfully');
    }

    /**
     * Display the specified ReturnPenjualan.
     * GET|HEAD /returnPenjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ReturnPenjualan $returnPenjualan */
        $returnPenjualan = $this->returnPenjualanRepository->findWithoutFail($id);

        if (empty($returnPenjualan)) {
            return $this->sendError('Return Penjualan not found');
        }

        return $this->sendResponse($returnPenjualan->toArray(), 'Return Penjualan retrieved successfully');
    }

    /**
     * Update the specified ReturnPenjualan in storage.
     * PUT/PATCH /returnPenjualans/{id}
     *
     * @param  int $id
     * @param UpdateReturnPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReturnPenjualanAPIRequest $request)
    {
        $input = $request->all();

        /** @var ReturnPenjualan $returnPenjualan */
        $returnPenjualan = $this->returnPenjualanRepository->findWithoutFail($id);

        if (empty($returnPenjualan)) {
            return $this->sendError('Return Penjualan not found');
        }

        $returnPenjualan = $this->returnPenjualanRepository->update($input, $id);

        return $this->sendResponse($returnPenjualan->toArray(), 'ReturnPenjualan updated successfully');
    }

    /**
     * Remove the specified ReturnPenjualan from storage.
     * DELETE /returnPenjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ReturnPenjualan $returnPenjualan */
        $returnPenjualan = $this->returnPenjualanRepository->findWithoutFail($id);

        if (empty($returnPenjualan)) {
            return $this->sendError('Return Penjualan not found');
        }

        $returnPenjualan->delete();

        return $this->sendResponse($id, 'Return Penjualan deleted successfully');
    }
}
