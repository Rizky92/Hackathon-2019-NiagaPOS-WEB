<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKecamatanRequest;
use App\Http\Requests\UpdateKecamatanRequest;
use App\Repositories\KecamatanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use GuzzleHttp\Client as HttpClient;
use App\Models\Kecamatan;        

class KecamatanController extends AppBaseController
{
    /** @var  KecamatanRepository */
    private $kecamatanRepository;

    public function __construct(KecamatanRepository $kecamatanRepo)
    {
        $this->kecamatanRepository = $kecamatanRepo;
    }

    /**
     * Display a listing of the Kecamatan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kecamatanRepository->pushCriteria(new RequestCriteria($request));
        $kecamatans = $this->kecamatanRepository->all();

        return view('kecamatans.index')
            ->with('kecamatans', $kecamatans);
    }

    /**
     * Show the form for creating a new Kecamatan.
     *
     * @return Response
     */
    public function create()
    {
        return view('kecamatans.create');
    }

    /**
     * Store a newly created Kecamatan in storage.
     *
     * @param CreateKecamatanRequest $request
     *
     * @return Response
     */
    public function store(CreateKecamatanRequest $request)
    {
        $input = $request->all();

        $kecamatan = $this->kecamatanRepository->create($input);

        Flash::success('Kecamatan saved successfully.');

        return redirect(route('kecamatans.index'));
    }

    /**
     * Display the specified Kecamatan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kecamatan = $this->kecamatanRepository->findWithoutFail($id);

        if (empty($kecamatan)) {
            Flash::error('Kecamatan not found');

            return redirect(route('kecamatans.index'));
        }

        return view('kecamatans.show')->with('kecamatan', $kecamatan);
    }

    /**
     * Show the form for editing the specified Kecamatan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kecamatan = $this->kecamatanRepository->findWithoutFail($id);

        if (empty($kecamatan)) {
            Flash::error('Kecamatan not found');

            return redirect(route('kecamatans.index'));
        }

        return view('kecamatans.edit')->with('kecamatan', $kecamatan);
    }

    /**
     * Update the specified Kecamatan in storage.
     *
     * @param  int              $id
     * @param UpdateKecamatanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKecamatanRequest $request)
    {
        $kecamatan = $this->kecamatanRepository->findWithoutFail($id);

        if (empty($kecamatan)) {
            Flash::error('Kecamatan not found');

            return redirect(route('kecamatans.index'));
        }

        $kecamatan = $this->kecamatanRepository->update($request->all(), $id);

        Flash::success('Kecamatan updated successfully.');

        return redirect(route('kecamatans.index'));
    }

    /**
     * Remove the specified Kecamatan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kecamatan = $this->kecamatanRepository->findWithoutFail($id);

        if (empty($kecamatan)) {
            Flash::error('Kecamatan not found');

            return redirect(route('kecamatans.index'));
        }

        $this->kecamatanRepository->delete($id);

        Flash::success('Kecamatan deleted successfully.');

        return redirect(route('kecamatans.index'));
    }

     public function synct_data_api(){ 
        $client = new HttpClient;

        $url="http://api.samarindakota.go.id/api/v2/generate/data-monografi/kecamatan";

        $res = $client->request("GET", $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . env('TOKEN_API_SAMARINDA'),
                'Content-Type'  => 'application/json',
                'Accept' => 'application/json'
            ]
        ]);

        $res->getHeader('content-type');

        $result= json_decode($res->getBody(), true);

        foreach ($result as $item){
            /*if($item['longitude']=="-"){
                unset($item['longitude']);
            }

            if($item['latitude']=="-"){
                unset($item['latitude']);
            }*/

            Kecamatan::updateOrCreate(['id'=>$item['id']],$item);
        }

        Flash::success('Synchronize successfully.');

        return redirect(route('kecamatans.index'));
    }

}
