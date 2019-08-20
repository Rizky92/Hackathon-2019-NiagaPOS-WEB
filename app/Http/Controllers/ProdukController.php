<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Repositories\ProdukRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flash;
use DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Mockery\Exception;
use Response;
use App\Models\Kategori;
use App\Models\JenisBarang;
use App\Models\Produsen;
use App\Models\Store;
use App\Models\Distributor;
use App\Models\Satuan;
use App\Models\Site;
use App\Models\HargaJual;

class ProdukController extends AppBaseController
{
    /** @var  ProdukRepository */
    private $produkRepository;

    public function __construct(ProdukRepository $produkRepo)
    {
        $this->produkRepository = $produkRepo;
    }

    /**
     * Display a listing of the Produk.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->produkRepository->pushCriteria(new RequestCriteria($request));
        $produks = $this->produkRepository->findWhere(['store_id'=>Auth::user()->site->store_id]);

        return view('produks.index')
            ->with('produks', $produks);
    }

    /**
     * Show the form for creating a new Produk.
     *
     * @return Response
     */
    public function create()
    {
        $katagori= Kategori::pluck('nama', 'id');
        $jenis_produk= JenisBarang::pluck('nama','id');
        $produsen= Produsen::pluck('nama','id');
        $distributor = Distributor::pluck('nama','id');
        $store = Store::pluck('nama','id');
        $satuan = Satuan::pluck('nama','id');
        $iya = 'Barang Jual';

        return view('produks.create', compact('katagori','jenis_produk','produsen','distributor','store','satuan', 'iya'));
    }

    /**
     * Store a newly created Produk in storage.
     *
     * @param CreateProdukRequest $request
     *
     * @return Response
     */
    public function store(CreateProdukRequest $request)
    {
        $input = $request->except('foto');
        $input['store_id'] = Auth::User()->site->store_id;
        try{
            DB::beginTransaction();
        $produk = $this->produkRepository->create($input);
        //Upload Foto dan simpan path/url foto ke dalam database
            if( $request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $produk->id.'.'.$file->getClientOriginalExtension();
                $path=$request->foto->storeAs('public/produk', $filename,'local');
                $produk->foto='storage'.substr($path,strpos($path,'/'));
                $produk->save();
            }
        foreach(Site::all()as $store){
            $produk->sites()->attach($store);
        }
        DB::commit();
        Flash::success('Produk saved successfully.');
    }catch(Exception $e){
        DB::rollback();
        Flash::error('Produk gagal di simpan');
    }
        return redirect(route('produks.index'));
    }

    /**
     * Display the specified Produk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk not found');

            return redirect(route('produks.index'));
        }

        return view('produks.show')->with('produk', $produk);
    }

    /**
     * Show the form for editing the specified Produk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $produk = $this->produkRepository->findWithoutFail($id);
        $katagori= Kategori::pluck('nama', 'id');
        $jenis_produk= JenisBarang::pluck('nama','id');
        $produsen= Produsen::pluck('nama','id');
        $distributor = Distributor::pluck('nama','id');
        $satuan = Satuan::pluck('nama','id');
        $store = Store::pluck('nama','id');
        if (empty($produk)) {
            Flash::error('Produk not found');

            return redirect(route('produks.index'));
        }

        return view('produks.edit',compact('katagori','jenis_produk','produsen','produk','distributor','satuan','store'));
    }

    /**
     * Update the specified Produk in storage.
     *
     * @param  int              $id
     * @param UpdateProdukRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProdukRequest $request)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk not found');

            return redirect(route('produks.index'));
        }
        try {
        DB::beginTransaction();
        $produk = $this->produkRepository->update($request->except('foto'), $id);
        if( $request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $produk->id.'.'.$file->getClientOriginalExtension();
                $path=$request->foto->storeAs('public/produk', $filename,'local');
                $produk->foto='storage'.substr($path,strpos($path,'/'));
                $produk->save();
            }
        DB::commit();
            Flash::success('Data Berita berhasil diubah.');
        } catch (Exception $e) {
            DB::rollback();
            Flash::error('Data Berita diubah');
        }
        Flash::success('Produk updated successfully.');

        return redirect(route('produks.index'));
    }

    /**
     * Remove the specified Produk from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk not found');

            return redirect(route('produks.index'));
        }

        $this->produkRepository->delete($id);

        Flash::success('Produk deleted successfully.');

        return redirect(route('produks.index'));
    }
    public function composite ($id)
    {
        $produks = Produk::findOrFail($id);
         $produk1s=Produk::pluck('nama','id');

        $arrayProduks=[];
        foreach($produks->produk1s as $produk1){
            array_push($arrayProduks,$arrayProduk->id);
        }

        return view('produk_has_raws.edit', compact('produks','arrayProduks','produk1s'));
    }
    
}
