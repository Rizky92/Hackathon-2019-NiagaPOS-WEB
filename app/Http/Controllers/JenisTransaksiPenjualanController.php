<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJenisTransaksiPenjualanRequest;
use App\Http\Requests\UpdateJenisTransaksiPenjualanRequest;
use App\Repositories\JenisTransaksiPenjualanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class JenisTransaksiPenjualanController extends AppBaseController
{
    /** @var  JenisTransaksiPenjualanRepository */
    private $jenisTransaksiPenjualanRepository;

    public function __construct(JenisTransaksiPenjualanRepository $jenisTransaksiPenjualanRepo)
    {
        $this->jenisTransaksiPenjualanRepository = $jenisTransaksiPenjualanRepo;
    }

    /**
     * Display a listing of the JenisTransaksiPenjualan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jenisTransaksiPenjualanRepository->pushCriteria(new RequestCriteria($request));
        $jenisTransaksiPenjualans = $this->jenisTransaksiPenjualanRepository->findWhere(['store_id'=>Auth::user()->site->store_id]);

        return view('jenis_transaksi_penjualans.index')
            ->with('jenisTransaksiPenjualans', $jenisTransaksiPenjualans);
    }

    /**
     * Show the form for creating a new JenisTransaksiPenjualan.
     *
     * @return Response
     */
    public function create()
    {
        return view('jenis_transaksi_penjualans.create');
    }

    /**
     * Store a newly created JenisTransaksiPenjualan in storage.
     *
     * @param CreateJenisTransaksiPenjualanRequest $request
     *
     * @return Response
     */
    public function store(CreateJenisTransaksiPenjualanRequest $request)
    {
        $input = $request->all();

        $jenisTransaksiPenjualan = $this->jenisTransaksiPenjualanRepository->create($input);

        Flash::success('Jenis Transaksi Penjualan saved successfully.');

        return redirect(route('jenisTransaksiPenjualans.index'));
    }

    /**
     * Display the specified JenisTransaksiPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jenisTransaksiPenjualan = $this->jenisTransaksiPenjualanRepository->findWithoutFail($id);

        if (empty($jenisTransaksiPenjualan)) {
            Flash::error('Jenis Transaksi Penjualan not found');

            return redirect(route('jenisTransaksiPenjualans.index'));
        }

        return view('jenis_transaksi_penjualans.show')->with('jenisTransaksiPenjualan', $jenisTransaksiPenjualan);
    }

    /**
     * Show the form for editing the specified JenisTransaksiPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jenisTransaksiPenjualan = $this->jenisTransaksiPenjualanRepository->findWithoutFail($id);

        if (empty($jenisTransaksiPenjualan)) {
            Flash::error('Jenis Transaksi Penjualan not found');

            return redirect(route('jenisTransaksiPenjualans.index'));
        }

        return view('jenis_transaksi_penjualans.edit')->with('jenisTransaksiPenjualan', $jenisTransaksiPenjualan);
    }

    /**
     * Update the specified JenisTransaksiPenjualan in storage.
     *
     * @param  int              $id
     * @param UpdateJenisTransaksiPenjualanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJenisTransaksiPenjualanRequest $request)
    {
        $jenisTransaksiPenjualan = $this->jenisTransaksiPenjualanRepository->findWithoutFail($id);

        if (empty($jenisTransaksiPenjualan)) {
            Flash::error('Jenis Transaksi Penjualan not found');

            return redirect(route('jenisTransaksiPenjualans.index'));
        }

        $jenisTransaksiPenjualan = $this->jenisTransaksiPenjualanRepository->update($request->all(), $id);

        Flash::success('Jenis Transaksi Penjualan updated successfully.');

        return redirect(route('jenisTransaksiPenjualans.index'));
    }

    /**
     * Remove the specified JenisTransaksiPenjualan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jenisTransaksiPenjualan = $this->jenisTransaksiPenjualanRepository->findWithoutFail($id);

        if (empty($jenisTransaksiPenjualan)) {
            Flash::error('Jenis Transaksi Penjualan not found');

            return redirect(route('jenisTransaksiPenjualans.index'));
        }

        $this->jenisTransaksiPenjualanRepository->delete($id);

        Flash::success('Jenis Transaksi Penjualan deleted successfully.');

        return redirect(route('jenisTransaksiPenjualans.index'));
    }
}
