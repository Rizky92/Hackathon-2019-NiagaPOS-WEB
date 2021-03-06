<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;
use App\Repositories\PenjualanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PenjualanController extends AppBaseController
{
    /** @var  PenjualanRepository */
    private $penjualanRepository;

    public function __construct(PenjualanRepository $penjualanRepo)
    {
        $this->penjualanRepository = $penjualanRepo;
    }

    /**
     * Display a listing of the Penjualan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->penjualanRepository->pushCriteria(new RequestCriteria($request));
        $penjualans = $this->penjualanRepository->all();

        return view('penjualans.index')
            ->with('penjualans', $penjualans);
    }

    /**
     * Show the form for creating a new Penjualan.
     *
     * @return Response
     */
    public function create()
    {
        return view('penjualans.create');
    }

    /**
     * Store a newly created Penjualan in storage.
     *
     * @param CreatePenjualanRequest $request
     *
     * @return Response
     */
    public function store(CreatePenjualanRequest $request)
    {
        $input = $request->all();

        $penjualan = $this->penjualanRepository->create($input);

        Flash::success('Penjualan saved successfully.');

        return redirect(route('penjualans.index'));
    }

    /**
     * Display the specified Penjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $penjualan = $this->penjualanRepository->findWithoutFail($id);

        if (empty($penjualan)) {
            Flash::error('Penjualan not found');

            return redirect(route('penjualans.index'));
        }

        return view('penjualans.show')->with('penjualan', $penjualan);
    }

    /**
     * Show the form for editing the specified Penjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $penjualan = $this->penjualanRepository->findWithoutFail($id);

        if (empty($penjualan)) {
            Flash::error('Penjualan not found');

            return redirect(route('penjualans.index'));
        }

        return view('penjualans.edit')->with('penjualan', $penjualan);
    }

    /**
     * Update the specified Penjualan in storage.
     *
     * @param  int              $id
     * @param UpdatePenjualanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenjualanRequest $request)
    {
        $penjualan = $this->penjualanRepository->findWithoutFail($id);

        if (empty($penjualan)) {
            Flash::error('Penjualan not found');

            return redirect(route('penjualans.index'));
        }

        $penjualan = $this->penjualanRepository->update($request->all(), $id);

        Flash::success('Penjualan updated successfully.');

        return redirect(route('penjualans.index'));
    }

    /**
     * Remove the specified Penjualan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penjualan = $this->penjualanRepository->findWithoutFail($id);

        if (empty($penjualan)) {
            Flash::error('Penjualan not found');

            return redirect(route('penjualans.index'));
        }

        $this->penjualanRepository->delete($id);

        Flash::success('Penjualan deleted successfully.');

        return redirect(route('penjualans.index'));
    }
}
