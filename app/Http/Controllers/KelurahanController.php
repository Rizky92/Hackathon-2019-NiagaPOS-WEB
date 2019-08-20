<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKelurahanRequest;
use App\Http\Requests\UpdateKelurahanRequest;
use App\Repositories\KelurahanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use GuzzleHttp\Client as HttpClient;
use App\Models\Kelurahan;

class KelurahanController extends AppBaseController
{
    /** @var  KelurahanRepository */
    private $kelurahanRepository;

    public function __construct(KelurahanRepository $kelurahanRepo)
    {
        $this->kelurahanRepository = $kelurahanRepo;
    }

    /**
     * Display a listing of the Kelurahan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kelurahanRepository->pushCriteria(new RequestCriteria($request));
        $kelurahans = $this->kelurahanRepository->all();

        return view('kelurahans.index')
            ->with('kelurahans', $kelurahans);
    }

    /**
     * Show the form for creating a new Kelurahan.
     *
     * @return Response
     */
    public function create()
    {
        return view('kelurahans.create');
    }

    /**
     * Store a newly created Kelurahan in storage.
     *
     * @param CreateKelurahanRequest $request
     *
     * @return Response
     */
    public function store(CreateKelurahanRequest $request)
    {
        $input = $request->all();

        $kelurahan = $this->kelurahanRepository->create($input);

        Flash::success('Kelurahan saved successfully.');

        return redirect(route('kelurahans.index'));
    }

    /**
     * Display the specified Kelurahan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kelurahan = $this->kelurahanRepository->findWithoutFail($id);

        if (empty($kelurahan)) {
            Flash::error('Kelurahan not found');

            return redirect(route('kelurahans.index'));
        }

        return view('kelurahans.show')->with('kelurahan', $kelurahan);
    }

    /**
     * Show the form for editing the specified Kelurahan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kelurahan = $this->kelurahanRepository->findWithoutFail($id);

        if (empty($kelurahan)) {
            Flash::error('Kelurahan not found');

            return redirect(route('kelurahans.index'));
        }

        return view('kelurahans.edit')->with('kelurahan', $kelurahan);
    }

    /**
     * Update the specified Kelurahan in storage.
     *
     * @param  int              $id
     * @param UpdateKelurahanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKelurahanRequest $request)
    {
        $kelurahan = $this->kelurahanRepository->findWithoutFail($id);

        if (empty($kelurahan)) {
            Flash::error('Kelurahan not found');

            return redirect(route('kelurahans.index'));
        }

        $kelurahan = $this->kelurahanRepository->update($request->all(), $id);

        Flash::success('Kelurahan updated successfully.');

        return redirect(route('kelurahans.index'));
    }

    /**
     * Remove the specified Kelurahan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kelurahan = $this->kelurahanRepository->findWithoutFail($id);

        if (empty($kelurahan)) {
            Flash::error('Kelurahan not found');

            return redirect(route('kelurahans.index'));
        }

        $this->kelurahanRepository->delete($id);

        Flash::success('Kelurahan deleted successfully.');

        return redirect(route('kelurahans.index'));
    }

    public function synct_data_api(){ 
        $client = new HttpClient;

        $url="http://api.samarindakota.go.id/api/v2/generate/data-monografi/kelurahan";

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

            Kelurahan::updateOrCreate(['id'=>$item['id']],$item);
        }

        Flash::success('Synchronize successfully.');

        return redirect(route('kelurahans.index'));
    }
}
