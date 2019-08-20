<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHargaJualAPIRequest;
use App\Http\Requests\API\UpdateHargaJualAPIRequest;
use App\Models\HargaJual;
use App\Repositories\HargaJualRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;

/**
 * Class HargaJualController
 * @package App\Http\Controllers\API
 */

class HargaJualAPIController extends AppBaseController
{
    /** @var  HargaJualRepository */
    private $hargaJualRepository; 

    public function __construct(HargaJualRepository $hargaJualRepo)
    {
        $this->hargaJualRepository = $hargaJualRepo;
    }

    /**
     * Display a listing of the HargaJual.
     * GET|HEAD /hargaJuals
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->hargaJualRepository->pushCriteria(new RequestCriteria($request));
        $this->hargaJualRepository->pushCriteria(new LimitOffsetCriteria($request));
        $hargaJuals = $this->hargaJualRepository->findWhere(['site_id'=>Auth::user()->site_id]);

        return $this->sendResponse($hargaJuals->toArray(), 'Berhasil mengambil data Harga Jual');
    }

    /**
     * Store a newly created HargaJual in storage.
     * POST /hargaJuals
     *
     * @param CreateHargaJualAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateHargaJualAPIRequest $request)
    {
        $input = $request->all();

        $hargaJuals = $this->hargaJualRepository->create($input);

        return $this->sendResponse($hargaJuals->toArray(), 'Harga Jual saved successfully');
    }

    /**
     * Display the specified HargaJual.
     * GET|HEAD /hargaJuals/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var HargaJual $hargaJual */
        $hargaJual = $this->hargaJualRepository->findWithoutFail($id);

        if (empty($hargaJual)) {
            return $this->sendError('Harga Jual not found');
        }

        return $this->sendResponse($hargaJual->toArray(), 'Harga Jual retrieved successfully');
    }

    /**
     * Update the specified HargaJual in storage.
     * PUT/PATCH /hargaJuals/{id}
     *
     * @param  int $id
     * @param UpdateHargaJualAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHargaJualAPIRequest $request)
    {
        $input = $request->all();

        /** @var HargaJual $hargaJual */
        $hargaJual = $this->hargaJualRepository->findWithoutFail($id);

        if (empty($hargaJual)) {
            return $this->sendError('Harga Jual not found');
        }

        $hargaJual = $this->hargaJualRepository->update($input, $id);

        return $this->sendResponse($hargaJual->toArray(), 'HargaJual updated successfully');
    }

    /**
     * Remove the specified HargaJual from storage.
     * DELETE /hargaJuals/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var HargaJual $hargaJual */
        $hargaJual = $this->hargaJualRepository->findWithoutFail($id);

        if (empty($hargaJual)) {
            return $this->sendError('Harga Jual not found');
        }

        $hargaJual->delete();

        return $this->sendResponse($id, 'Harga Jual deleted successfully');
    }
}
