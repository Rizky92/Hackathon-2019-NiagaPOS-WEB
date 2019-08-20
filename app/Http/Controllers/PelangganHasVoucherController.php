<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePelangganHasVoucherRequest;
use App\Http\Requests\UpdatePelangganHasVoucherRequest;
use App\Repositories\PelangganHasVoucherRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PelangganHasVoucherController extends AppBaseController
{
    /** @var  PelangganHasVoucherRepository */
    private $pelangganHasVoucherRepository;

    public function __construct(PelangganHasVoucherRepository $pelangganHasVoucherRepo)
    {
        $this->pelangganHasVoucherRepository = $pelangganHasVoucherRepo;
    }

    /**
     * Display a listing of the PelangganHasVoucher.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pelangganHasVoucherRepository->pushCriteria(new RequestCriteria($request));
        $pelangganHasVouchers = $this->pelangganHasVoucherRepository->all();

        return view('pelanggan_has_vouchers.index')
            ->with('pelangganHasVouchers', $pelangganHasVouchers);
    }

    /**
     * Show the form for creating a new PelangganHasVoucher.
     *
     * @return Response
     */
    public function create()
    {
        return view('pelanggan_has_vouchers.create');
    }

    /**
     * Store a newly created PelangganHasVoucher in storage.
     *
     * @param CreatePelangganHasVoucherRequest $request
     *
     * @return Response
     */
    public function store(CreatePelangganHasVoucherRequest $request)
    {
        $input = $request->all();

        $pelangganHasVoucher = $this->pelangganHasVoucherRepository->create($input);

        Flash::success('Pelanggan Has Voucher saved successfully.');

        return redirect(route('pelangganHasVouchers.index'));
    }

    /**
     * Display the specified PelangganHasVoucher.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pelangganHasVoucher = $this->pelangganHasVoucherRepository->findWithoutFail($id);

        if (empty($pelangganHasVoucher)) {
            Flash::error('Pelanggan Has Voucher not found');

            return redirect(route('pelangganHasVouchers.index'));
        }

        return view('pelanggan_has_vouchers.show')->with('pelangganHasVoucher', $pelangganHasVoucher);
    }

    /**
     * Show the form for editing the specified PelangganHasVoucher.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pelangganHasVoucher = $this->pelangganHasVoucherRepository->findWithoutFail($id);

        if (empty($pelangganHasVoucher)) {
            Flash::error('Pelanggan Has Voucher not found');

            return redirect(route('pelangganHasVouchers.index'));
        }

        return view('pelanggan_has_vouchers.edit')->with('pelangganHasVoucher', $pelangganHasVoucher);
    }

    /**
     * Update the specified PelangganHasVoucher in storage.
     *
     * @param  int              $id
     * @param UpdatePelangganHasVoucherRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePelangganHasVoucherRequest $request)
    {
        $pelangganHasVoucher = $this->pelangganHasVoucherRepository->findWithoutFail($id);

        if (empty($pelangganHasVoucher)) {
            Flash::error('Pelanggan Has Voucher not found');

            return redirect(route('pelangganHasVouchers.index'));
        }

        $pelangganHasVoucher = $this->pelangganHasVoucherRepository->update($request->all(), $id);

        Flash::success('Pelanggan Has Voucher updated successfully.');

        return redirect(route('pelangganHasVouchers.index'));
    }

    /**
     * Remove the specified PelangganHasVoucher from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pelangganHasVoucher = $this->pelangganHasVoucherRepository->findWithoutFail($id);

        if (empty($pelangganHasVoucher)) {
            Flash::error('Pelanggan Has Voucher not found');

            return redirect(route('pelangganHasVouchers.index'));
        }

        $this->pelangganHasVoucherRepository->delete($id);

        Flash::success('Pelanggan Has Voucher deleted successfully.');

        return redirect(route('pelangganHasVouchers.index'));
    }
}
