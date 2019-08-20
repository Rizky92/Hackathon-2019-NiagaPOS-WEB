<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\TraitController\SmsTrait;
use App\Http\Requests\API\CreatePelangganAPIRequest;
use App\Http\Requests\API\UpdatePelangganAPIRequest;
use App\Models\Pelanggan;
use App\Repositories\PelangganRepository;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Mockery\Exception;
use Prettus\Repository\Criteria\RequestCriteria;
use Ramsey\Uuid\Uuid;
use Response;
use DB;
use Auth;

/**
 * Class PelangganController
 * @package App\Http\Controllers\API
 */

class PelangganAPIController extends AppBaseController
{
    use SmsTrait;
    /** @var  PelangganRepository */
    private $pelangganRepository;

    public function __construct(PelangganRepository $pelangganRepo)
    {
        $this->pelangganRepository = $pelangganRepo;
    }

    /**
     * Display a listing of the Pelanggan.
     * GET|HEAD /pelanggans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) 
    {
        $this->pelangganRepository->pushCriteria(new RequestCriteria($request));
        $this->pelangganRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pelanggans = $this->pelangganRepository->with(['user'])->whereHas('site',function ($query){$query->where('store_id',Auth::User()->site->store_id);
    })->all();
        /*$pelanggans = $this->pelangganRepository->findWhere(['site_id'=>Auth::user()->site->store_id]);*/
        /*$pelanggans = $this->pelangganRepository->whereHas('user',function($q){$q->whereHas('site',function($q){
            $q->where('store_id',Auth::User()->site->store_id);
        })
    });*/
            
        return $this->sendResponse($pelanggans->toArray(), 'Pelanggans retrieved successfully');
    }

    /**
     * Store a newly created Pelanggan in storage.
     * POST /pelanggans
     *
     * @param CreatePelangganAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePelangganAPIRequest $request)
    {
        $input = $request->all();

        if(!empty(User::where('kontak', $input['kontak'])->where('verified',1)->first())){
            return $this->sendError('Kontak Sudah Ada ');
        }

        try {
            DB::beginTransaction();
            $input['id'] = Uuid::uuid4();
            $input['name'] = $input['nama'];
            $input['verification_token']=rand(100000,999999);

            $user = User::updateOrCreate(
                ['kontak' => $input['kontak']],
                $input
            );

            $user->password=bcrypt($input['password']);
            $user->save();

            $input['users_id'] = $user->id;
            $input['id'] = Uuid::uuid4();
            $pelanggans = Pelanggan::updateOrCreate(
                ['users_id'=>$user->id],
                $input);

            $this->sendOTP($user->kontak,$user->verification_token);

            DB::commit();
            return $this->sendResponse($user->load('pelanggan'), 'Pelanggan saved successfully');
        } catch (Exception $e){
            DB::rollBack();
            return $this->sendError('pelanggan gagal ditambah '.$e ->getMessage());
        }

    }

    public function test($kontak,$pesan){
        return $this->sendOTP($kontak,$pesan);
    }

    /**
     * Display the specified Pelanggan.
     * GET|HEAD /pelanggans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pelanggan $pelanggan */
        $pelanggan = $this->pelangganRepository->findWithoutFail($id);

        if (empty($pelanggan)) {
            return $this->sendError('Pelanggan not found');
        }

        return $this->sendResponse($pelanggan->load('user'), 'Pelanggan retrieved successfully');
    }

    /**
     * Update the specified Pelanggan in storage.
     * PUT/PATCH /pelanggans/{id}
     *
     * @param  int $id
     * @param UpdatePelangganAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePelangganAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pelanggan $pelanggan */
        $pelanggan = $this->pelangganRepository->findWithoutFail($id);

        if (empty($pelanggan)) {
            return $this->sendError('Pelanggan not found');
        }

        $pelanggan = $this->pelangganRepository->update($input, $id);

        return $this->sendResponse($pelanggan->toArray(), 'Pelanggan updated successfully');
    }

    /**
     * Remove the specified Pelanggan from storage.
     * DELETE /pelanggans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pelanggan $pelanggan */
        $pelanggan = $this->pelangganRepository->findWithoutFail($id);

        if (empty($pelanggan)) {
            return $this->sendError('Pelanggan not found');
        }

        $pelanggan->delete();

        return $this->sendResponse($id, 'Pelanggan deleted successfully');
    }
}
