<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAtributBarangRequest;
use App\Http\Requests\UpdateAtributBarangRequest;
use App\Repositories\AtributBarangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Store;

class AtributBarangController extends AppBaseController
{
    /** @var  AtributBarangRepository */
    private $atributBarangRepository;

    public function __construct(AtributBarangRepository $atributBarangRepo)
    {
        $this->atributBarangRepository = $atributBarangRepo;
    }

    /**
     * Display a listing of the AtributBarang.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->atributBarangRepository->pushCriteria(new RequestCriteria($request));
        $atributBarangs = $this->atributBarangRepository->all();

        return view('atribut_barangs.index')
            ->with('atributBarangs', $atributBarangs);
    }

    /**
     * Show the form for creating a new AtributBarang.
     *
     * @return Response
     */
    public function create()

    {
        $store=Store::pluck('nama','id');
        return view('atribut_barangs.create',['store'=>$store]);
    }

    /**
     * Store a newly created AtributBarang in storage.
     *
     * @param CreateAtributBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateAtributBarangRequest $request)
    {
        $input = $request->all();

        $atributBarang = $this->atributBarangRepository->create($input);

        Flash::success('Atribut Barang saved successfully.');

        return redirect(route('atributBarangs.index'));
    }

    /**
     * Display the specified AtributBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $atributBarang = $this->atributBarangRepository->findWithoutFail($id);

        if (empty($atributBarang)) {
            Flash::error('Atribut Barang not found');

            return redirect(route('atributBarangs.index'));
        }

        return view('atribut_barangs.show')->with('atributBarang', $atributBarang);
    }

    /**
     * Show the form for editing the specified AtributBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $atributBarang = $this->atributBarangRepository->findWithoutFail($id);
        $store=Store::pluck('nama','id');

        if (empty($atributBarang)) {
            Flash::error('Atribut Barang not found');

            return redirect(route('atributBarangs.index'));
        }

        return view('atribut_barangs.edit',compact('atributBarang','store'));
    }

    /**
     * Update the specified AtributBarang in storage.
     *
     * @param  int              $id
     * @param UpdateAtributBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAtributBarangRequest $request)
    {
        $atributBarang = $this->atributBarangRepository->findWithoutFail($id);

        if (empty($atributBarang)) {
            Flash::error('Atribut Barang not found');

            return redirect(route('atributBarangs.index'));
        }

        $atributBarang = $this->atributBarangRepository->update($request->all(), $id);

        Flash::success('Atribut Barang updated successfully.');

        return redirect(route('atributBarangs.index'));
    }

    /**
     * Remove the specified AtributBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $atributBarang = $this->atributBarangRepository->findWithoutFail($id);

        if (empty($atributBarang)) {
            Flash::error('Atribut Barang not found');

            return redirect(route('atributBarangs.index'));
        }

        $this->atributBarangRepository->delete($id);

        Flash::success('Atribut Barang deleted successfully.');

        return redirect(route('atributBarangs.index'));
    }
}
