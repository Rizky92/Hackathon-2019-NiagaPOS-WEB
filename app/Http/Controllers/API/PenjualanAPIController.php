<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePenjualanAPIRequest;
use App\Http\Requests\API\CreatePenjualanKasirAPIRequest;
use App\Http\Requests\API\UpdatePenjualanAPIRequest;
use App\Models\JenisTransaksiPenjualan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\DetilPenjualan;
use App\Repositories\PenjualanRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Auth;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Mockery\Exception;
use Prettus\Repository\Criteria\RequestCriteria;
use Ramsey\Uuid\Uuid;
use Response;
use DB;

/**
 * Class PenjualanController
 * @package App\Http\Controllers\API
 */

class PenjualanAPIController extends AppBaseController
{
    /** @var  PenjualanRepository */
    private $penjualanRepository;

    public function __construct(PenjualanRepository $penjualanRepo)
    {
        $this->penjualanRepository = $penjualanRepo;
    }

    /**
     * Display a listing of the Penjualan.
     * GET|HEAD /penjualans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->penjualanRepository->pushCriteria(new RequestCriteria($request));
        $this->penjualanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $penjualans = $this->penjualanRepository->with(['detilPenjualans'])->findWhere(['site_id'=>Auth::user()->site_id]);

        return $this->sendResponse($penjualans->toArray(), 'Penjualans retrieved successfully');
    }


    //Untuk menampilkan histori transaksi dari pelanggan
    public function indexPenjualanPelanggan(Request $request)
    {
        $this->penjualanRepository->pushCriteria(new RequestCriteria($request));
        $this->penjualanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $penjualans = $this->penjualanRepository->with(['user','site','pelanggan','pelanggan.user','jenisTransaksiPenjualan'])->orderBy('created_at','desc')->findWhere([
            'pelanggan_id'=>Auth::user()->pelanggan->id]);

        return $this->sendResponse($penjualans->toArray(), 'Penjualans retrieved successfully');
    }

    //Untuk menampilkan histori transaksi dari kasir
    public function indexPenjualanKasir(Request $request)
    {
        $this->penjualanRepository->pushCriteria(new RequestCriteria($request));
        $this->penjualanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $penjualans = $this->penjualanRepository->with(['user','site','pelanggan','pelanggan.user','jenisTransaksiPenjualan'])->orderBy('created_at','desc')->findWhere([
        'users_id'=>Auth::user()->id]);

        return $this->sendResponse($penjualans->toArray(), 'Penjualans retrieved successfully');
    }

    /**
     * Store a newly created Penjualan in storage.
     * POST /penjualans
     *
     * @param CreatePenjualanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePenjualanAPIRequest $request)
    {
        $input = $request->all();

        $penjualans = $this->penjualanRepository->create($input);

        return $this->sendResponse($penjualans->toArray(), 'Penjualan saved successfully');
    }

    public function storePenjualan(CreatePenjualanAPIRequest $request)
    {
        $input = $request->except('scan_bukti');

        try{
            DB::beginTransaction();
        foreach ($input['data'] as $penjualan) {
            /*return $penjualan;*/
        $user=User::find(Auth::id());
        //cek kasir
        if (empty($user)) {
            return $this->sendError('Kasir not found');
        }

        $pelanggan=Pelanggan::find($penjualan['pelanggan_id']);

        //cek pelanggan
        if (empty($pelanggan)) {
            return $this->sendError('Pelanggan not found');
        }

        if(!isset($penjualan['id'])){
            $penjualan['id']=Uuid::uuid4();
        }

        /*$jenisTransaksiPenjualan=JenisTransaksiPenjualan::where('nama','Cash')->first();*/

       /* $input['jenis_transaksi_penjualan_id']=$jenisTransaksiPenjualan->id;
        $input['faktur_penjualan']= $input['id'];
        $input['users_id']=$user->id;
        $input['site_id']=$user->site_id;
*/
        //Hitung point
        $penjualan['point']= ((int)$penjualan['total']) / 1000;

            $tpenjualan = Penjualan::updateOrCreate(['id'=>$penjualan['id']],$penjualan);

            foreach ($penjualan['detil_penjualans'] as $item){
                /*$item['id']=Uuid::uuid4();*/
                $detilPenjualan=DetilPenjualan::updateOrCreate(['id'=>$item['id']],array_merge($item,['penjualan_id'=>$tpenjualan->id]));
               
                $produk=$detilPenjualan->produk;
                $stokAwal=$produk->sites->find($penjualan['site_id'])->pivot->jumlah;
                $stokAkhir=$stokAwal-$detilPenjualan->jumlah;
                $produk->sites()->sync([$penjualan['site_id']=> [ 'jumlah' => $stokAkhir] ]);
            }
            $pelanggan->point=$pelanggan->point+$penjualan['point'];
            $pelanggan->save();
        }

            DB::commit();

        }catch (Exception $e) {
            DB::rollback();
            return $this->sendError('Penjualan not save');
        }
        return $this->sendResponse($tpenjualan->load('user','pelanggan','site'), 'Penjualan saved successfully');
    }


    public function storeKasir(CreatePenjualanKasirAPIRequest $request)
    {
        $input = $request->except('scan_bukti');

        $user=User::find(Auth::id());

        //cek kasir
        if (empty($user)) {
            return $this->sendError('Kasir not found');
        }

        $pelanggan=Pelanggan::find($input['pelanggan_id']);

        //cek pelanggan
        if (empty($pelanggan)) {
            return $this->sendError('Pelanggan not found');
        }

        if(!$request->has('id')){
            $input['id']=Uuid::uuid4();
        }

        $jenisTransaksiPenjualan=JenisTransaksiPenjualan::where('nama','Cash')->first();

        $input['jenis_transaksi_penjualan_id']=$jenisTransaksiPenjualan->id;
        $input['faktur_penjualan']= $input['id'];
        $input['users_id']=$user->id;
        $input['site_id']=$user->site_id;

        //Hitung point
        $input['point']= ((int)$input['total']) / 1000;

        try{
            DB::beginTransaction();

            //Simpan kedalam database kecuali foto
            $penjualans = Penjualan::create($input);

            //Upload Foto dan simpan path/url foto ke dalam database
            if( $request->hasFile('scan_bukti')) {
                $file = $request->file('scan_bukti');
                $filename = $penjualans->id.'.'.$file->getClientOriginalExtension();
                $path=$request->scan_bukti->storeAs('public/scan_bukti', $filename,'local');
                $penjualans->scan_bukti='storage'.substr($path,strpos($path,'/'));
                $penjualans->save();
            }

            $pelanggan->point=$pelanggan->point+$input['point'];
            $pelanggan->save();

            DB::commit();

        }catch (Exception $e) {
            DB::rollback();
            return $this->sendError('Penjualan not save');
        }
        return $this->sendResponse($penjualans->load('user','pelanggan','site'), 'Penjualan saved successfully');
    }

    /**
     * Display the specified Penjualan.
     * GET|HEAD /penjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Penjualan $penjualan */
        $penjualan = $this->penjualanRepository->findWithoutFail($id);

        if (empty($penjualan)) {
            return $this->sendError('Penjualan not found');
        }

        return $this->sendResponse($penjualan->toArray(), 'Penjualan retrieved successfully');
    }

    /**
     * Update the specified Penjualan in storage.
     * PUT/PATCH /penjualans/{id}
     *
     * @param  int $id
     * @param UpdatePenjualanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenjualanAPIRequest $request)
    {
        $input = $request->all();

        /** @var Penjualan $penjualan */
        $penjualan = $this->penjualanRepository->findWithoutFail($id);

        if (empty($penjualan)) {
            return $this->sendError('Penjualan not found');
        }

        $penjualan = $this->penjualanRepository->update($input, $id);

        return $this->sendResponse($penjualan->toArray(), 'Penjualan updated successfully');
    }

    /**
     * Remove the specified Penjualan from storage.
     * DELETE /penjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Penjualan $penjualan */
        $penjualan = $this->penjualanRepository->findWithoutFail($id);

        if (empty($penjualan)) {
            return $this->sendError('Penjualan not found');
        }

        $penjualan->delete();

        return $this->sendResponse($id, 'Penjualan deleted successfully');
    }
}
