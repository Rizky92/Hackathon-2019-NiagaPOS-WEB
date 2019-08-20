<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePromosiAPIRequest;
use App\Http\Requests\API\UpdatePromosiAPIRequest;
use App\Models\Promosi;
use App\Repositories\PromosiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
/**
 * Class PromosiController
 * @package App\Http\Controllers\API
 */

class PromosiAPIController extends AppBaseController
{
    /** @var  PromosiRepository */
    private $promosiRepository;

    public function __construct(PromosiRepository $promosiRepo)
    {
        $this->promosiRepository = $promosiRepo;
    }

    /**
     * Display a listing of the Promosi.
     * GET|HEAD /promosis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->promosiRepository->pushCriteria(new RequestCriteria($request));
        $this->promosiRepository->pushCriteria(new LimitOffsetCriteria($request));
        $promosis = $this->promosiRepository->findWhere(['users_id'=>Auth::user()->id]); 

        return $this->sendResponse($promosis->toArray(), 'Promosis retrieved successfully');
    }

    /**
     * Store a newly created Promosi in storage.
     * POST /promosis
     *
     * @param CreatePromosiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePromosiAPIRequest $request)
    {
        $input = $request->all();

        $promosis = $this->promosiRepository->create($input);

        return $this->sendResponse($promosis->toArray(), 'Promosi saved successfully');
    }

    /**
     * Display the specified Promosi.
     * GET|HEAD /promosis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Promosi $promosi */
        $promosi = $this->promosiRepository->findWithoutFail($id);

        if (empty($promosi)) {
            return $this->sendError('Promosi not found');
        }

        return $this->sendResponse($promosi->toArray(), 'Promosi retrieved successfully');
    }

    /**
     * Update the specified Promosi in storage.
     * PUT/PATCH /promosis/{id}
     *
     * @param  int $id
     * @param UpdatePromosiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePromosiAPIRequest $request)
    {
        $input = $request->all();

        /** @var Promosi $promosi */
        $promosi = $this->promosiRepository->findWithoutFail($id);

        if (empty($promosi)) {
            return $this->sendError('Promosi not found');
        }

        $promosi = $this->promosiRepository->update($input, $id);

        return $this->sendResponse($promosi->toArray(), 'Promosi updated successfully');
    }

    /**
     * Remove the specified Promosi from storage.
     * DELETE /promosis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Promosi $promosi */
        $promosi = $this->promosiRepository->findWithoutFail($id);

        if (empty($promosi)) {
            return $this->sendError('Promosi not found');
        }

        $promosi->delete();

        return $this->sendResponse($id, 'Promosi deleted successfully');
    }
}
