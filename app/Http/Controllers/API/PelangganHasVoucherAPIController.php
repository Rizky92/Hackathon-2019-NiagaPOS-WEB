<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePelangganHasVoucherAPIRequest;
use App\Http\Requests\API\UpdatePelangganHasVoucherAPIRequest;
use App\Models\PelangganHasVoucher;
use App\Models\Voucher;
use App\Repositories\PelangganHasVoucherRepository;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Mockery\Exception;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use DB;

/**
 * Class PelangganHasVoucherController
 * @package App\Http\Controllers\API
 */

class PelangganHasVoucherAPIController extends AppBaseController
{
    /** @var  PelangganHasVoucherRepository */
    private $pelangganHasVoucherRepository;

    public function __construct(PelangganHasVoucherRepository $pelangganHasVoucherRepo)
    {
        $this->pelangganHasVoucherRepository = $pelangganHasVoucherRepo;
    }

    /**
     * Display a listing of the PelangganHasVoucher.
     * GET|HEAD /pelangganHasVouchers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pelangganHasVoucherRepository->pushCriteria(new RequestCriteria($request));
        $this->pelangganHasVoucherRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pelangganHasVouchers = $this->pelangganHasVoucherRepository
            ->orderBy('created_at','asc')
            ->with(['pelanggan','voucher','user'])
            ->findWhere(['pelanggan_id'=>Auth::user()->pelanggan->id,
                'users_id'=>null]);

        return $this->sendResponse($pelangganHasVouchers->toArray(), 'Pelanggan Has Vouchers retrieved successfully');
    }

    /**
     * Store a newly created PelangganHasVoucher in storage.
     * POST /pelangganHasVouchers
     *
     * @param CreatePelangganHasVoucherAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePelangganHasVoucherAPIRequest $request)
    {
        $input = $request->all();
        $voucher=Voucher::find($input['voucher_id']);

        if (empty($voucher)) {
            return $this->sendError('Voucher not found');
        }

        $pelanggan=Auth::user()->pelanggan;

        if($voucher->point > $pelanggan->point){
            return $this->sendError('Point tidak cukup');
        }

        $input['pelanggan_id']=$pelanggan->id;

        try{
            DB::beginTransaction();

            $pelanggan->point=$pelanggan->point-$voucher->point;
            $pelanggan->save();

            $pelangganHasVouchers = $this->pelangganHasVoucherRepository->create($input);

            DB::commit();

        }catch (Exception $e) {
            DB::rollback();
            return $this->sendError('Pelanggan has voucher not save');
        }

        return $this->sendResponse($pelangganHasVouchers->load('pelanggan'), 'Pelanggan Has Voucher saved successfully');
    }

    /**
     * Display the specified PelangganHasVoucher.
     * GET|HEAD /pelangganHasVouchers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PelangganHasVoucher $pelangganHasVoucher */
        $pelangganHasVoucher = $this->pelangganHasVoucherRepository->findWithoutFail($id);

        if (empty($pelangganHasVoucher)) {
            return $this->sendError('Pelanggan Has Voucher not found');
        }

        return $this->sendResponse($pelangganHasVoucher->toArray(), 'Pelanggan Has Voucher retrieved successfully');
    }

    /**
     * Update the specified PelangganHasVoucher in storage.
     * PUT/PATCH /pelangganHasVouchers/{id}
     *
     * @param  int $id
     * @param UpdatePelangganHasVoucherAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePelangganHasVoucherAPIRequest $request)
    {
        $input = $request->all();

        /** @var PelangganHasVoucher $pelangganHasVoucher */
        $pelangganHasVoucher = $this->pelangganHasVoucherRepository->findWithoutFail($id);

        if (empty($pelangganHasVoucher)) {
            return $this->sendError('Pelanggan Has Voucher not found');
        }

        $pelangganHasVoucher = $this->pelangganHasVoucherRepository->update($input, $id);

        return $this->sendResponse($pelangganHasVoucher->toArray(), 'PelangganHasVoucher updated successfully');
    }

    /**
     * Remove the specified PelangganHasVoucher from storage.
     * DELETE /pelangganHasVouchers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PelangganHasVoucher $pelangganHasVoucher */
        $pelangganHasVoucher = $this->pelangganHasVoucherRepository->findWithoutFail($id);

        if (empty($pelangganHasVoucher)) {
            return $this->sendError('Pelanggan Has Voucher not found');
        }

        $pelangganHasVoucher->delete();

        return $this->sendResponse($id, 'Pelanggan Has Voucher deleted successfully');
    }

    public function useVoucher($id)
    {
        /** @var PelangganHasVoucher $pelangganHasVoucher */
        $pelangganHasVoucher = $this->pelangganHasVoucherRepository->findWithoutFail($id);

        if (empty($pelangganHasVoucher)) {
            return $this->sendError('Voucher tidak ditemukan');
        }

        if ($pelangganHasVoucher->pelanggan_id!==Auth::user()->pelanggan->id) {
            return $this->sendError('Pelanggan tidak memiliki voucher');
        }

        if ($pelangganHasVoucher->users_id!=null) {
            return $this->sendError('voucher sudah digunakan');
        }

        $kasir=Role::where('name','kasir')->first()->users()->first();

        if (empty($kasir)) {
            return $this->sendError('tidak ada kasir');
        }
        $pelangganHasVoucher->users_id=$kasir->id;
        $pelangganHasVoucher->save();

        return $this->sendResponse($pelangganHasVoucher->load('voucher','pelanggan','user'), 'Pelanggan Has Voucher retrieved successfully');
    }
}
