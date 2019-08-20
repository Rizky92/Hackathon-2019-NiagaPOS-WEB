<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProdukHasRawRequest;
use App\Http\Requests\UpdateProdukHasRawRequest;
use App\Repositories\ProdukHasRawRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Produk;

class ProdukHasRawController extends AppBaseController
{
    /** @var  ProdukHasRawRepository */
    private $produkHasRawRepository;

    public function __construct(ProdukHasRawRepository $produkHasRawRepo)
    {
        $this->produkHasRawRepository = $produkHasRawRepo;
    }

    /**
     * Display a listing of the ProdukHasRaw.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        /*$this->produkHasRawRepository->pushCriteria(new RequestCriteria($request));
        $produkHasRaws = $this->produkHasRawRepository->all();

        return view('produk_has_raws.index')
            ->with('produkHasRaws', $produkHasRaws);*/
        $produkid = Produk::where('nama','like','%'.(isset($request->search)?$request->search:'').'%')->paginate(isset($request->pagination)?$request->pagination:25);
        $title='Tabel Produk Detail'; 
        return view('produk_has_raws.index', compact('produkid','title'));
    }

    /**
     * Show the form for creating a new ProdukHasRaw.
     *
     * @return Response
     */
    public function create()
    {
        return view('produk_has_raws.create');
    }

    /**
     * Store a newly created ProdukHasRaw in storage.
     *
     * @param CreateProdukHasRawRequest $request
     *
     * @return Response
     */
    public function store(CreateProdukHasRawRequest $request)
    {
        $input = $request->all();

        $produkHasRaw = $this->produkHasRawRepository->create($input);

        Flash::success('Produk Has Raw saved successfully.');

        return redirect(route('produkHasRaws.index'));
    }

    /**
     * Display the specified ProdukHasRaw.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $produkHasRaw = $this->produkHasRawRepository->findWithoutFail($id);

        if (empty($produkHasRaw)) {
            Flash::error('Produk Has Raw not found');

            return redirect(route('produkHasRaws.index'));
        }

        return view('produk_has_raws.show')->with('produkHasRaw', $produkHasRaw);
    }

    /**
     * Show the form for editing the specified ProdukHasRaw.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $produkHasRaw = $this->produkHasRawRepository->findWithoutFail($id);

        if (empty($produkHasRaw)) {
            Flash::error('Produk Has Raw not found');

            return redirect(route('produkHasRaws.index'));
        }

        return view('produk_has_raws.edit')->with('produkHasRaw', $produkHasRaw);
    }

    /**
     * Update the specified ProdukHasRaw in storage.
     *
     * @param  int              $id
     * @param UpdateProdukHasRawRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProdukHasRawRequest $request)
    {
        $produkHasRaw = $this->produkHasRawRepository->findWithoutFail($id);

        if (empty($produkHasRaw)) {
            Flash::error('Produk Has Raw not found');

            return redirect(route('produkHasRaws.index'));
        }

        $produkHasRaw = $this->produkHasRawRepository->update($request->all(), $id);

        Flash::success('Produk Has Raw updated successfully.');

        return redirect(route('produkHasRaws.index'));
    }

    /**
     * Remove the specified ProdukHasRaw from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $produkHasRaw = $this->produkHasRawRepository->findWithoutFail($id);

        if (empty($produkHasRaw)) {
            Flash::error('Produk Has Raw not found');

            return redirect(route('produkHasRaws.index'));
        }

        $this->produkHasRawRepository->delete($id);

        Flash::success('Produk Has Raw deleted successfully.');

        return redirect(route('produkHasRaws.index'));
    }
}
