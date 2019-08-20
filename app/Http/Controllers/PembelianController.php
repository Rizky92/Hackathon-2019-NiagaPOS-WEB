<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePembelianRequest;
use App\Http\Requests\UpdatePembelianRequest;
use App\Repositories\PembelianRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Distributor;

class PembelianController extends AppBaseController
{
    /** @var  PembelianRepository */
    private $pembelianRepository;

    public function __construct(PembelianRepository $pembelianRepo)
    {
        $this->pembelianRepository = $pembelianRepo;
    }

    /**
     * Display a listing of the Pembelian.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pembelianRepository->pushCriteria(new RequestCriteria($request));
        $pembelians = $this->pembelianRepository->all();

        return view('pembelians.index')
            ->with('pembelians', $pembelians);
    }

    /**
     * Show the form for creating a new Pembelian.
     *
     * @return Response
     */
    public function create()
    {
        $distributor=Distributor::pluck('nama','id');
        return view('pembelians.create',compact('distributor'));
    }

    /**
     * Store a newly created Pembelian in storage.
     *
     * @param CreatePembelianRequest $request
     *
     * @return Response
     */
    public function store(CreatePembelianRequest $request)
    {
        $input = $request->all();

        $pembelian = $this->pembelianRepository->create($input);

        Flash::success('Pembelian saved successfully.');

        return redirect(route('pembelians.index'));
    }

    /**
     * Display the specified Pembelian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pembelian = $this->pembelianRepository->findWithoutFail($id);

        if (empty($pembelian)) {
            Flash::error('Pembelian not found');

            return redirect(route('pembelians.index'));
        }

        return view('pembelians.show')->with('pembelian', $pembelian);
    }

    /**
     * Show the form for editing the specified Pembelian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pembelian = $this->pembelianRepository->findWithoutFail($id);
        $distributor=Distributor::pluck('nama','id');
        if (empty($pembelian)) {
            Flash::error('Pembelian not found');

            return redirect(route('pembelians.index'));
        }

        return view('pembelians.edit',compact('distributor'))->with('pembelian', $pembelian);
    }

    /**
     * Update the specified Pembelian in storage.
     *
     * @param  int              $id
     * @param UpdatePembelianRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePembelianRequest $request)
    {
        $pembelian = $this->pembelianRepository->findWithoutFail($id);

        if (empty($pembelian)) {
            Flash::error('Pembelian not found');

            return redirect(route('pembelians.index'));
        }

        $pembelian = $this->pembelianRepository->update($request->all(), $id);

        Flash::success('Pembelian updated successfully.');

        return redirect(route('pembelians.index'));
    }

    /**
     * Remove the specified Pembelian from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pembelian = $this->pembelianRepository->findWithoutFail($id);

        if (empty($pembelian)) {
            Flash::error('Pembelian not found');

            return redirect(route('pembelians.index'));
        }

        $this->pembelianRepository->delete($id);

        Flash::success('Pembelian deleted successfully.');

        return redirect(route('pembelians.index'));
    }
}
