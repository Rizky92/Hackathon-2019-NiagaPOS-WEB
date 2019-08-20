<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStokAPIRequest;
use App\Http\Requests\API\UpdateStokAPIRequest;
use App\Models\Stok;
use App\Repositories\StokRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class StokController
 * @package App\Http\Controllers\API
 */

class StokAPIController extends AppBaseController
{
    /** @var  StokRepository */
    private $stokRepository;

    public function __construct(StokRepository $stokRepo)
    {
        $this->stokRepository = $stokRepo;
    }

    /**
     * Display a listing of the Stok.
     * GET|HEAD /stoks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->stokRepository->pushCriteria(new RequestCriteria($request));
        $this->stokRepository->pushCriteria(new LimitOffsetCriteria($request));
        $stoks = $this->stokRepository->all();

        return $this->sendResponse($stoks->toArray(), 'Stoks retrieved successfully');
    }

    /**
     * Store a newly created Stok in storage.
     * POST /stoks
     *
     * @param CreateStokAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStokAPIRequest $request)
    {
        $input = $request->all();

        $stoks = $this->stokRepository->create($input);

        return $this->sendResponse($stoks->toArray(), 'Stok saved successfully');
    }

    /**
     * Display the specified Stok.
     * GET|HEAD /stoks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($produk_id)
    {
        /** @var Stok $stok */
        $stok = $this->stokRepository->findWithoutFail($produk_id);

        if (empty($stok)) {
            return $this->sendError('Stok not found');
        }

        return $this->sendResponse($stok->toArray(), 'Stok retrieved successfully');
    }

    /**
     * Update the specified Stok in storage.
     * PUT/PATCH /stoks/{id}
     *
     * @param  int $id
     * @param UpdateStokAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStokAPIRequest $request)
    {
        $input = $request->all();

        /** @var Stok $stok */
        $stok = $this->stokRepository->findWithoutFail($id);

        if (empty($stok)) {
            return $this->sendError('Stok not found');
        }

        $stok = $this->stokRepository->update($input, $id);

        return $this->sendResponse($stok->toArray(), 'Stok updated successfully');
    }

    /**
     * Remove the specified Stok from storage.
     * DELETE /stoks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Stok $stok */
        $stok = $this->stokRepository->findWithoutFail($id);

        if (empty($stok)) {
            return $this->sendError('Stok not found');
        }

        $stok->delete();

        return $this->sendResponse($id, 'Stok deleted successfully');
    }
}
