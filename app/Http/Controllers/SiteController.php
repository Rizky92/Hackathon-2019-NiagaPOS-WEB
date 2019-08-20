<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Models\Daerah;
use App\Models\Store;
use App\Repositories\SiteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use DB;
use Mockery\Exception;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SiteController extends AppBaseController
{
    /** @var  SiteRepository */
    private $siteRepository;

    public function __construct(SiteRepository $siteRepo)
    {
        $this->siteRepository = $siteRepo;
    }

    /**
     * Display a listing of the Site.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->siteRepository->pushCriteria(new RequestCriteria($request));
        $sites = $this->siteRepository->all();

        return view('sites.index')
            ->with('sites', $sites);
    }

    /**
     * Show the form for creating a new Site.
     *
     * @return Response
     */
    public function create()
    {
        $store=Store::pluck('nama','id');
        $listDaerah=Daerah::allLeaves()->pluck('nama','id');
        return view('sites.create',['store'=>$store,'listDaerah'=>$listDaerah]);
    }

    /**
     * Store a newly created Site in storage.
     *
     * @param CreateSiteRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteRequest $request)
    {
        $input = $request->except('foto');
        try{
            DB::beginTransaction();

            //Simpan kedalam database kecuali foto
            $site = $this->siteRepository->create($input);

            //Upload Foto dan simpan path/url foto ke dalam database
            if( $request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $site->id.'.'.$file->getClientOriginalExtension();
                $path=$request->file('foto')->storeAs('public/site', $filename,'local');
                $site->foto='storage'.substr($path,strpos($path,'/'));

                $site->save();
            }

            DB::commit();
            Flash::success('Data Site berhasil ditambah.');
        }catch (Exception $e){
            DB::rollback();
            Flash::error('Data gagal ditambah');
        }

        return redirect(route('sites.index'));
    }

    /**
     * Display the specified Site.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $site = $this->siteRepository->findWithoutFail($id);

        if (empty($site)) {
            Flash::error('Site not found');

            return redirect(route('sites.index'));
        }

        return view('sites.show')->with('site', $site);
    }

    /**
     * Show the form for editing the specified Site.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $store=Store::pluck('nama','id');
        $site = $this->siteRepository->findWithoutFail($id);
        $listDaerah=Daerah::allLeaves()->pluck('nama','id');
        if (empty($site)) {
            Flash::error('Site not found');

            return redirect(route('sites.index'));
        }

        return view('sites.edit',['site'=>$site,'store'=>$store,'listDaerah'=>$listDaerah]);
    }

    /**
     * Update the specified Site in storage.
     *
     * @param  int              $id
     * @param UpdateSiteRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $site = $this->siteRepository->findWithoutFail($id);

        if (empty($site)) {
            Flash::error('Site not found');

            return redirect(route('sites.index'));
        }

        try{
            DB::beginTransaction();

            //Simpan kedalam database kecuali foto
            $site = $this->siteRepository->update($request->except('foto'), $id);

            //Upload Foto dan simpan path/url foto ke dalam database
            if( $request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $site->id.'.'.$file->getClientOriginalExtension();

                $path=$request->file('foto')->storeAs('public/site', $filename,'local');
                $site->foto='storage'.substr($path,strpos($path,'/'));
                $site->save();
            }

            DB::commit();
            Flash::success('Data Site berhasil diubah.');
        }catch (Exception $e){
            DB::rollback();
            Flash::error('Data gagal diubah');
        }

        return redirect(route('sites.index'));
    }

    /**
     * Remove the specified Site from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $site = $this->siteRepository->findWithoutFail($id);

        if (empty($site)) {
            Flash::error('Site not found');

            return redirect(route('sites.index'));
        }

        $this->siteRepository->delete($id);

        Flash::success('Site deleted successfully.');

        return redirect(route('sites.index'));
    }
}
