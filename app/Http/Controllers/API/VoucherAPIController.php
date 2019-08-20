<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVoucherAPIRequest;
use App\Http\Requests\API\UpdateVoucherAPIRequest;
use App\Models\Voucher;
use App\Repositories\VoucherRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;

/**
 * Class VoucherController
 * @package App\Http\Controllers\API
 */

class VoucherAPIController extends AppBaseController
{
    /** @var  VoucherRepository */
    private $voucherRepository;

    public function __construct(VoucherRepository $voucherRepo)
    {
        $this->voucherRepository = $voucherRepo;
    }

    /**
     * Display a listing of the Voucher.
     * GET|HEAD /vouchers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->voucherRepository->pushCriteria(new RequestCriteria($request));
        $this->voucherRepository->pushCriteria(new LimitOffsetCriteria($request));
        $vouchers = $this->voucherRepository->orderBy('point','asc')->scopeQuery(function($query){
            return $query->where(function ($query){
                $query->where(function ($query){
                    $query->where('mulai_berlaku','<=',Carbon::now())
                        ->where('akhir_berlaku','>=',Carbon::now());
                })
                    ->orWhereNull('mulai_berlaku');
            })
                ->where('point','>',0);
        })->all();;

        return $this->sendResponse($vouchers->toArray(), 'Vouchers retrieved successfully');
    }

    public function indexVoucherPelanggan(Request $request)
    {
        $this->voucherRepository->pushCriteria(new RequestCriteria($request));
        $this->voucherRepository->pushCriteria(new LimitOffsetCriteria($request));
        $vouchers = $this->voucherRepository->all();

        return $this->sendResponse($vouchers->toArray(), 'Vouchers retrieved successfully');
    }

    /**
     * Store a newly created Voucher in storage.
     * POST /vouchers
     *
     * @param CreateVoucherAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVoucherAPIRequest $request)
    {
        $input = $request->all();

        $vouchers = $this->voucherRepository->create($input);

        return $this->sendResponse($vouchers->toArray(), 'Voucher saved successfully');
    }

    /**
     * Display the specified Voucher.
     * GET|HEAD /vouchers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Voucher $voucher */
        $voucher = $this->voucherRepository->findWithoutFail($id);

        if (empty($voucher)) {
            return $this->sendError('Voucher not found');
        }

        return $this->sendResponse($voucher->toArray(), 'Voucher retrieved successfully');
    }

    /**
     * Update the specified Voucher in storage.
     * PUT/PATCH /vouchers/{id}
     *
     * @param  int $id
     * @param UpdateVoucherAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVoucherAPIRequest $request)
    {
        $input = $request->all();

        /** @var Voucher $voucher */
        $voucher = $this->voucherRepository->findWithoutFail($id);

        if (empty($voucher)) {
            return $this->sendError('Voucher not found');
        }

        $voucher = $this->voucherRepository->update($input, $id);

        return $this->sendResponse($voucher->toArray(), 'Voucher updated successfully');
    }

    /**
     * Remove the specified Voucher from storage.
     * DELETE /vouchers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Voucher $voucher */
        $voucher = $this->voucherRepository->findWithoutFail($id);

        if (empty($voucher)) {
            return $this->sendError('Voucher not found');
        }

        $voucher->delete();

        return $this->sendResponse($id, 'Voucher deleted successfully');
    }
}
