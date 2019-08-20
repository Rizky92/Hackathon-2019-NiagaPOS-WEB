<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJenisBarangRequest;
use App\Http\Requests\UpdateJenisBarangRequest;
use App\Repositories\JenisBarangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Store;

class JenisBarangController extends AppBaseController
{
    /** @var  JenisBarangRepository */
    private $jenisBarangRepository;

    public function __construct(JenisBarangRepository $jenisBarangRepo)
    {
        $this->jenisBarangRepository = $jenisBarangRepo;
    }

    /**
     * Display a listing of the JenisBarang.
     *
     * @param Request $request
     * @return Response
     */ 
    public function index(Request $request)
    {
        $this->jenisBarangRepository->pushCriteria(new RequestCriteria($request));
        $jenisBarangs = $this->jenisBarangRepository->findWhere(['store_id'=>Auth::user()->site->store_id]);

        return view('jenis_barangs.index')
            ->with('jenisBarangs', $jenisBarangs);
    }

    /**
     * Show the form for creating a new JenisBarang.
     *
     * @return Response
     */
    public function create()
    {
        $store=Store::pluck('nama','id');
        return view('jenis_barangs.create',['store'=>$store]);
    }

    /**
     * Store a newly created JenisBarang in storage.
     *
     * @param CreateJenisBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateJenisBarangRequest $request)
    {
        $input = $request->all();

        $jenisBarang = $this->jenisBarangRepository->create($input);

        Flash::success('Jenis Barang saved successfully.');

        return redirect(route('jenisBarangs.index'));
    }

    /**
     * Display the specified JenisBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jenisBarang = $this->jenisBarangRepository->findWithoutFail($id);

        if (empty($jenisBarang)) {
            Flash::error('Jenis Barang not found');

            return redirect(route('jenisBarangs.index'));
        }

        return view('jenis_barangs.show')->with('jenisBarang', $jenisBarang);
    }

    /**
     * Show the form for editing the specified JenisBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jenisBarang = $this->jenisBarangRepository->findWithoutFail($id);
        $store=Store::pluck('nama','id');

        if (empty($jenisBarang)) {
            Flash::error('Jenis Barang not found');

            return redirect(route('jenisBarangs.index'));
        }

        return view('jenis_barangs.edit',compact('jenisBarang','store'));
    }

    /**
     * Update the specified JenisBarang in storage.
     *
     * @param  int              $id
     * @param UpdateJenisBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJenisBarangRequest $request)
    {
        $jenisBarang = $this->jenisBarangRepository->findWithoutFail($id);

        if (empty($jenisBarang)) {
            Flash::error('Jenis Barang not found');

            return redirect(route('jenisBarangs.index'));
        }

        $jenisBarang = $this->jenisBarangRepository->update($request->all(), $id);

        Flash::success('Jenis Barang updated successfully.');

        return redirect(route('jenisBarangs.index'));
    }

    /**
     * Remove the specified JenisBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jenisBarang = $this->jenisBarangRepository->findWithoutFail($id);

        if (empty($jenisBarang)) {
            Flash::error('Jenis Barang not found');

            return redirect(route('jenisBarangs.index'));
        }

        $this->jenisBarangRepository->delete($id);

        Flash::success('Jenis Barang deleted successfully.');

        return redirect(route('jenisBarangs.index'));
    }
}
