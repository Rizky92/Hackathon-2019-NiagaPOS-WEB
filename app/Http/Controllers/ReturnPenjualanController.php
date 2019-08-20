<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReturnPenjualanRequest;
use App\Http\Requests\UpdateReturnPenjualanRequest;
use App\Repositories\ReturnPenjualanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\DetilPenjualan;
use Auth;

class ReturnPenjualanController extends AppBaseController
{
    /** @var  ReturnPenjualanRepository */
    private $returnPenjualanRepository;

    public function __construct(ReturnPenjualanRepository $returnPenjualanRepo)
    {
        $this->returnPenjualanRepository = $returnPenjualanRepo;
    }

    /**
     * Display a listing of the ReturnPenjualan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->returnPenjualanRepository->pushCriteria(new RequestCriteria($request));
        $returnPenjualans = $this->returnPenjualanRepository->all();

        return view('return_penjualans.index')
            ->with('returnPenjualans', $returnPenjualans);
    }

    /**
     * Show the form for creating a new ReturnPenjualan.
     *
     * @return Response
     */
    public function create()
    {
        $detilpenjualan=DetilPenjualan::pluck('penjualan_id','id');
        return view('return_penjualans.create',compact('detilpenjualan'));
    }

    /**
     * Store a newly created ReturnPenjualan in storage.
     *
     * @param CreateReturnPenjualanRequest $request
     *
     * @return Response
     */
    public function store(CreateReturnPenjualanRequest $request)
    {
        $input = $request->all();

        $returnPenjualan = $this->returnPenjualanRepository->create($input);

        Flash::success('Return Penjualan saved successfully.');

        return redirect(route('returnPenjualans.index'));
    }

    /**
     * Display the specified ReturnPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $returnPenjualan = $this->returnPenjualanRepository->findWithoutFail($id);

        if (empty($returnPenjualan)) {
            Flash::error('Return Penjualan not found');

            return redirect(route('returnPenjualans.index'));
        }

        return view('return_penjualans.show')->with('returnPenjualan', $returnPenjualan);
    }

    /**
     * Show the form for editing the specified ReturnPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $returnPenjualan = $this->returnPenjualanRepository->findWithoutFail($id);

        if (empty($returnPenjualan)) {
            Flash::error('Return Penjualan not found');

            return redirect(route('returnPenjualans.index'));
        }

        return view('return_penjualans.edit')->with('returnPenjualan', $returnPenjualan);
    }

    /**
     * Update the specified ReturnPenjualan in storage.
     *
     * @param  int              $id
     * @param UpdateReturnPenjualanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReturnPenjualanRequest $request)
    {
        $returnPenjualan = $this->returnPenjualanRepository->findWithoutFail($id);

        if (empty($returnPenjualan)) {
            Flash::error('Return Penjualan not found');

            return redirect(route('returnPenjualans.index'));
        }

        $returnPenjualan = $this->returnPenjualanRepository->update($request->all(), $id);

        Flash::success('Return Penjualan updated successfully.');

        return redirect(route('returnPenjualans.index'));
    }

    /**
     * Remove the specified ReturnPenjualan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $returnPenjualan = $this->returnPenjualanRepository->findWithoutFail($id);

        if (empty($returnPenjualan)) {
            Flash::error('Return Penjualan not found');

            return redirect(route('returnPenjualans.index'));
        }

        $this->returnPenjualanRepository->delete($id);

        Flash::success('Return Penjualan deleted successfully.');

        return redirect(route('returnPenjualans.index'));
    }
}
