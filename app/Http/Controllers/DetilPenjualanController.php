<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDetilPenjualanRequest;
use App\Http\Requests\UpdateDetilPenjualanRequest;
use App\Repositories\DetilPenjualanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DetilPenjualanController extends AppBaseController
{
    /** @var  DetilPenjualanRepository */
    private $detilPenjualanRepository;

    public function __construct(DetilPenjualanRepository $detilPenjualanRepo)
    {
        $this->detilPenjualanRepository = $detilPenjualanRepo;
    }

    /**
     * Display a listing of the DetilPenjualan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->detilPenjualanRepository->pushCriteria(new RequestCriteria($request));
        $detilPenjualans = $this->detilPenjualanRepository->all();

        return view('detil_penjualans.index')
            ->with('detilPenjualans', $detilPenjualans);
    }

    /**
     * Show the form for creating a new DetilPenjualan.
     *
     * @return Response
     */
    public function create()
    {
        return view('detil_penjualans.create');
    }

    /**
     * Store a newly created DetilPenjualan in storage.
     *
     * @param CreateDetilPenjualanRequest $request
     *
     * @return Response
     */
    public function store(CreateDetilPenjualanRequest $request)
    {
        $input = $request->all();

        $detilPenjualan = $this->detilPenjualanRepository->create($input);

        Flash::success('Detil Penjualan saved successfully.');

        return redirect(route('detilPenjualans.index'));
    }

    /**
     * Display the specified DetilPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detilPenjualan = $this->detilPenjualanRepository->findWithoutFail($id);

        if (empty($detilPenjualan)) {
            Flash::error('Detil Penjualan not found');

            return redirect(route('detilPenjualans.index'));
        }

        return view('detil_penjualans.show')->with('detilPenjualan', $detilPenjualan);
    }

    /**
     * Show the form for editing the specified DetilPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detilPenjualan = $this->detilPenjualanRepository->findWithoutFail($id);

        if (empty($detilPenjualan)) {
            Flash::error('Detil Penjualan not found');

            return redirect(route('detilPenjualans.index'));
        }

        return view('detil_penjualans.edit')->with('detilPenjualan', $detilPenjualan);
    }

    /**
     * Update the specified DetilPenjualan in storage.
     *
     * @param  int              $id
     * @param UpdateDetilPenjualanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetilPenjualanRequest $request)
    {
        $detilPenjualan = $this->detilPenjualanRepository->findWithoutFail($id);

        if (empty($detilPenjualan)) {
            Flash::error('Detil Penjualan not found');

            return redirect(route('detilPenjualans.index'));
        }

        $detilPenjualan = $this->detilPenjualanRepository->update($request->all(), $id);

        Flash::success('Detil Penjualan updated successfully.');

        return redirect(route('detilPenjualans.index'));
    }

    /**
     * Remove the specified DetilPenjualan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detilPenjualan = $this->detilPenjualanRepository->findWithoutFail($id);

        if (empty($detilPenjualan)) {
            Flash::error('Detil Penjualan not found');

            return redirect(route('detilPenjualans.index'));
        }

        $this->detilPenjualanRepository->delete($id);

        Flash::success('Detil Penjualan deleted successfully.');

        return redirect(route('detilPenjualans.index'));
    }
}
