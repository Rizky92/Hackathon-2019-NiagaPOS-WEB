<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePembelianAPIRequest;
use App\Http\Requests\API\UpdatePembelianAPIRequest;
use App\Models\Pembelian;
use App\Repositories\PembelianRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PembelianController
 * @package App\Http\Controllers\API
 */

class PembelianAPIController extends AppBaseController
{
    /** @var  PembelianRepository */
    private $pembelianRepository;

    public function __construct(PembelianRepository $pembelianRepo)
    {
        $this->pembelianRepository = $pembelianRepo;
    }

    /**
     * Display a listing of the Pembelian.
     * GET|HEAD /pembelians
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pembelianRepository->pushCriteria(new RequestCriteria($request));
        $this->pembelianRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pembelians = $this->pembelianRepository->all();

        return $this->sendResponse($pembelians->toArray(), 'Pembelians retrieved successfully');
    }

    /**
     * Store a newly created Pembelian in storage.
     * POST /pembelians
     *
     * @param CreatePembelianAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePembelianAPIRequest $request)
    {
        $input = $request->all();

        $pembelians = $this->pembelianRepository->create($input);

        return $this->sendResponse($pembelians->toArray(), 'Pembelian saved successfully');
    }

    /**
     * Display the specified Pembelian.
     * GET|HEAD /pembelians/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pembelian $pembelian */
        $pembelian = $this->pembelianRepository->findWithoutFail($id);

        if (empty($pembelian)) {
            return $this->sendError('Pembelian not found');
        }

        return $this->sendResponse($pembelian->toArray(), 'Pembelian retrieved successfully');
    }

    /**
     * Update the specified Pembelian in storage.
     * PUT/PATCH /pembelians/{id}
     *
     * @param  int $id
     * @param UpdatePembelianAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePembelianAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pembelian $pembelian */
        $pembelian = $this->pembelianRepository->findWithoutFail($id);

        if (empty($pembelian)) {
            return $this->sendError('Pembelian not found');
        }

        $pembelian = $this->pembelianRepository->update($input, $id);

        return $this->sendResponse($pembelian->toArray(), 'Pembelian updated successfully');
    }

    /**
     * Remove the specified Pembelian from storage.
     * DELETE /pembelians/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pembelian $pembelian */
        $pembelian = $this->pembelianRepository->findWithoutFail($id);

        if (empty($pembelian)) {
            return $this->sendError('Pembelian not found');
        }

        $pembelian->delete();

        return $this->sendResponse($id, 'Pembelian deleted successfully');
    }
}
