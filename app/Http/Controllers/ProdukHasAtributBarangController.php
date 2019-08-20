<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProdukHasAtributBarangRequest;
use App\Http\Requests\UpdateProdukHasAtributBarangRequest;
use App\Repositories\ProdukHasAtributBarangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Produk;
use App\Models\AtributBarang;
use Illuminate\Support\Facades\DB;

class ProdukHasAtributBarangController extends AppBaseController
{
    /** @var  ProdukHasAtributBarangRepository */
    private $produkHasAtributBarangRepository;

    public function __construct(ProdukHasAtributBarangRepository $produkHasAtributBarangRepo)
    {
        $this->produkHasAtributBarangRepository = $produkHasAtributBarangRepo;
    }

    /**
     * Display a listing of the ProdukHasAtributBarang.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        /*$this->produkHasAtributBarangRepository->pushCriteria(new RequestCriteria($request));
        $produkHasAtributBarangs = $this->produkHasAtributBarangRepository->all();

        return view('produk_has_atribut_barangs.index')
            ->with('produkHasAtributBarangs', $produkHasAtributBarangs);*/

        $produkHasAtributBarangs = Produk::where('nama','like','%'.(isset($request->search)?$request->search:'').'%')->paginate(isset($request->pagination)?$request->pagination:25);
        $title='Tabel Produk Detail'; 
        return view('produk_has_atribut_barangs.index', compact('produkHasAtributBarangs','title'));
        /*$produks1= Produk::get();
        return view('produk_has_atribut_barangs.index', compact('produks1'));*/
    }

    /**
     * Show the form for creating a new ProdukHasAtributBarang.
     *
     * @return Response
     */
    public function create()
    {
        return view('produk_has_atribut_barangs.create');
    }

    /**
     * Store a newly created ProdukHasAtributBarang in storage.
     *
     * @param CreateProdukHasAtributBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateProdukHasAtributBarangRequest $request)
    {
        $input = $request->all();

        $produkHasAtributBarang = $this->produkHasAtributBarangRepository->create($input);

        Flash::success('Produk Has Atribut Barang saved successfully.');

        return redirect(route('produkHasAtributBarangs.index'));
    }

    /**
     * Display the specified ProdukHasAtributBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $produkHasAtributBarang = $this->produkHasAtributBarangRepository->findWithoutFail($id);

        if (empty($produkHasAtributBarang)) {
            Flash::error('Produk Has Atribut Barang not found');

            return redirect(route('produkHasAtributBarangs.index'));
        }

        return view('produk_has_atribut_barangs.show')->with('produkHasAtributBarang', $produkHasAtributBarang);
    }

    /**
     * Show the form for editing the specified ProdukHasAtributBarang.
     *
     * @param  int $id
     *
     * @return Response
     */ 
    public function edit($id)
    {
/*        $produkHasAtributBarang = $this->produkHasAtributBarangRepository->findWithoutFail($id);

        if (empty($produkHasAtributBarang)) {
            Flash::error('Produk Has Atribut Barang not found');

            return redirect(route('produkHasAtributBarangs.index'));
        }

        return view('produk_has_atribut_barangs.edit')->with('produkHasAtributBarang', $produkHasAtributBarang);*/
         $produkHasAtributBarang = Produk::findOrFail($id);
         $atributs=AtributBarang::pluck('nama','id');

        $arrayAtribut=[];
        foreach($produkHasAtributBarang->atributbarangs as $atributbarang){
            array_push($arrayAtribut,$atributbarang->id);
        }

        return view('produk_has_atribut_barangs.edit', compact('produkHasAtributBarang','title','arrayAtribut','atributs'));
    }

    /**
     * Update the specified ProdukHasAtributBarang in storage.
     *
     * @param  int              $id
     * @param UpdateProdukHasAtributBarangRequest $request
     *
     * @return Response
     */
    public function update($id, request $request)
    {
       /* $produkHasAtributBarang = $this->produkHasAtributBarangRepository->findWithoutFail($id);

        if (empty($produkHasAtributBarang)) {
            Flash::error('Produk Has Atribut Barang not found');

            return redirect(route('produkHasAtributBarangs.index'));
        }

        $produkHasAtributBarang = $this->produkHasAtributBarangRepository->update($request->all(), $id);

        Flash::success('Produk Has Atribut Barang updated successfully.');

        return redirect(route('produkHasAtributBarangs.index'));*/

        $requestData = $request->all();
        
        $produkHasAtributBarang = Produk::findOrFail($id);

        $requestatributBarangs=[];
        if(isset($request->atributbarangs)) {
            foreach ($request->atributbarangs as $atributbarang) {
                $value = ["id" => $atributbarang];
                array_push($requestatributBarangs, $value);
            }
        }

        try{
            DB::beginTransaction();

            $produkHasAtributBarang->atributbarang()->sync([]);
            $produkHasAtributBarang->attachatributBarangs($requestatributBarangs);

            DB::commit();
            Session::flash('flash_message', 'atribut produk berhasil ditambah!');
        }catch (Exception $e){
            DB::rollback();
            Session::flash('flash_message', 'atribut produk gagal diubah!');
        }

        return redirect('produkHasAtributBarang');
    }

    /**
     * Remove the specified ProdukHasAtributBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $produkHasAtributBarang = $this->produkHasAtributBarangRepository->findWithoutFail($id);

        if (empty($produkHasAtributBarang)) {
            Flash::error('Produk Has Atribut Barang not found');

            return redirect(route('produkHasAtributBarangs.index'));
        }

        $this->produkHasAtributBarangRepository->delete($id);

        Flash::success('Produk Has Atribut Barang deleted successfully.');

        return redirect(route('produkHasAtributBarangs.index'));
    }
}
