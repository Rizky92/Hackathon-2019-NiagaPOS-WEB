<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHargaJualRequest;
use App\Http\Requests\UpdateHargaJualRequest;
use App\Repositories\HargaJualRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Produk;

class HargaJualController extends AppBaseController
{
    /** @var  HargaJualRepository */
    private $hargaJualRepository;

    public function __construct(HargaJualRepository $hargaJualRepo)
    {
        $this->hargaJualRepository = $hargaJualRepo;
    }

    /**
     * Display a listing of the HargaJual.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->hargaJualRepository->pushCriteria(new RequestCriteria($request));
        $hargaJuals = $this->hargaJualRepository->findWhere(['site_id'=>Auth::user()->site_id]);

        return view('harga_juals.index')
            ->with('hargaJuals', $hargaJuals);
    }

    /**
     * Show the form for creating a new HargaJual.
     *
     * @return Response
     */
    public function create()
    {
        $produk=Produk::pluck('nama','id');
        return view('harga_juals.create',compact('produk'));
    }

    /**
     * Store a newly created HargaJual in storage.
     *
     * @param CreateHargaJualRequest $request
     *
     * @return Response
     */
    public function store(CreateHargaJualRequest $request)
    {
        $input = $request->all();

        $hargaJual = $this->hargaJualRepository->create($input);

        Flash::success('Harga Jual saved successfully.');

        return redirect(route('hargaJuals.index'));
    }

    /**
     * Display the specified HargaJual.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hargaJual = $this->hargaJualRepository->findWithoutFail($id);

        if (empty($hargaJual)) {
            Flash::error('Harga Jual not found');

            return redirect(route('hargaJuals.index'));
        }

        return view('harga_juals.show')->with('hargaJual', $hargaJual);
    }

    /**
     * Show the form for editing the specified HargaJual.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hargaJual = $this->hargaJualRepository->findWithoutFail($id);
        $produk=Produk::pluck('nama','id');

        if (empty($hargaJual)) {
            Flash::error('Harga Jual not found');

            return redirect(route('hargaJuals.index'));
        }

        return view('harga_juals.edit',compact('produk'))->with('hargaJual', $hargaJual);
    }

    /**
     * Update the specified HargaJual in storage.
     *
     * @param  int              $id
     * @param UpdateHargaJualRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHargaJualRequest $request)
    {
        $hargaJual = $this->hargaJualRepository->findWithoutFail($id);

        if (empty($hargaJual)) {
            Flash::error('Harga Jual not found');

            return redirect(route('hargaJuals.index'));
        }

        $hargaJual = $this->hargaJualRepository->update($request->all(), $id);

        Flash::success('Harga Jual updated successfully.');

        return redirect(route('hargaJuals.index'));
    }

    /**
     * Remove the specified HargaJual from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hargaJual = $this->hargaJualRepository->findWithoutFail($id);

        if (empty($hargaJual)) {
            Flash::error('Harga Jual not found');

            return redirect(route('hargaJuals.index'));
        }

        $this->hargaJualRepository->delete($id);

        Flash::success('Harga Jual deleted successfully.');

        return redirect(route('hargaJuals.index'));
    }
}
