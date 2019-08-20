<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use App\Models\Site;
use App\Repositories\PelangganRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use Mockery\Exception;

class PelangganController extends AppBaseController
{
    /** @var  PelangganRepository */
    private $pelangganRepository;

    public function __construct(PelangganRepository $pelangganRepo)
    {
        $this->pelangganRepository = $pelangganRepo;
    }

    /**
     * Display a listing of the Pelanggan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pelangganRepository->pushCriteria(new RequestCriteria($request));
        $pelanggans = $this->pelangganRepository->all();

        return view('pelanggans.index')
            ->with('pelanggans', $pelanggans);
    }

    /**
     * Show the form for creating a new Pelanggan.
     *
     * @return Response
     */
    public function create()
    {
        $site = Site::pluck('alamat','id');
        $user =User::pluck('name','id');
        return view('pelanggans.create',['site'=>$site,'user'=>$user]);
    }

    /**
     * Store a newly created Pelanggan in storage.
     *
     * @param CreatePelangganRequest $request
     *
     * @return Response
     */
    public function store(CreatePelangganRequest $request)
    {
        $input = $request->all();

        $pelanggan = $this->pelangganRepository->create($input);

        Flash::success('Pelanggan saved successfully.');

        return redirect(route('pelanggans.index'));
    }

    /**
     * Display the specified Pelanggan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pelanggan = $this->pelangganRepository->findWithoutFail($id);

        if (empty($pelanggan)) {
            Flash::error('Pelanggan not found');

            return redirect(route('pelanggans.index'));
        }

        return view('pelanggans.show')->with('pelanggan', $pelanggan);
    }

    /**
     * Show the form for editing the specified Pelanggan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $site = Site::pluck('alamat','id');
        $user =User::pluck('name','id');
        $pelanggan = $this->pelangganRepository->findWithoutFail($id);

        if (empty($pelanggan)) {
            Flash::error('Pelanggan not found');

            return redirect(route('pelanggans.index'));
        }

        return view('pelanggans.edit',compact('pelanggan','site','user'));
    }

    /**
     * Update the specified Pelanggan in storage.
     *
     * @param  int              $id
     * @param UpdatePelangganRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePelangganRequest $request)
    {

        $pelanggan = $this->pelangganRepository->findWithoutFail($id);

        if (empty($pelanggan)) {
            Flash::error('Pelanggan not found');

            return redirect(route('pelanggans.index'));
        }

        $pelanggan = $this->pelangganRepository->update($request->all(), $id);

        Flash::success('Pelanggan updated successfully.');

        return redirect(route('pelanggans.index'));
    }

    /**
     * Remove the specified Pelanggan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pelanggan = $this->pelangganRepository->findWithoutFail($id);

        if (empty($pelanggan)) {
            Flash::error('Pelanggan not found');

            return redirect(route('pelanggans.index'));
        }

        try{
            DB::beginTransaction();
            $pelanggan->user()->delete();
            $this->pelangganRepository->delete($id);

            DB::commit();
            Flash::success('Pelanggan deleted successfully.');
        }catch (Exception $e) {
            DB::rollback();
            Flash::error('Pelanggan cannot delete.');
        }

        return redirect(route('pelanggans.index'));
    }
}
