<?php
namespace App\Http\Controllers\API;
/**
 * Created by PhpStorm.
 * User: (M)-T
 * Date: 2018-10-24
 * Time: 1:56 PM
 */

use App\Http\Controllers\AppBaseController;
use App\Models\Pelanggan;
use App\Models\PelangganHasVoucher;
use App\Models\Voucher;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use JWTAuth;
use Mockery\Exception;
use Ramsey\Uuid\Uuid;
use Tymon\JWTAuth\Exceptions\JWTException;
use DB;

class AuthenticateController extends AppBaseController
{
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return $this->sendError('invalid_credentials', 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->sendError('could_not_create_token', 500);
        }

        if(!Auth::user()->hasRole(['kasir','admin'])){
            return $this->sendError('invalid_credentials', 401);
        }

        // all good so return the token
        return $this->sendResponse(['token'=>$token,
            'expires' => auth('api')->factory()->getTTL() * 60,
            'user'=>Auth::user()],'Authentikasi Sukses');
    }

    public function authenticatePelanggan(Request $request)
    {
        $this->validate($request, [
            'kontak'   => 'required',
            'password'           => 'required|min:4',
        ]);

        // grab credentials from the request
        $credentials = $request->only('kontak', 'password');

        $user = User::where('kontak',$credentials['kontak'])->first();

        if(empty($user)){
            return $this->sendError('invalid_credentials', 401);
        }

        if(!Hash::check($credentials['password'],$user->password)){
            return $this->sendError('invalid_credentials', 401);
        }

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return $this->sendError('invalid_credentials', 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->sendError('could_not_create_token', 500);
        }

        if(Auth::user()->verified==0){
            return $this->sendError('belum verifikasi kode', 401);
        }

        if(!Auth::user()->hasRole('pelanggan')){
            return $this->sendError('invalid_credentials', 401);
        }

        // all good so return the token
        return $this->sendResponse(['token'=>$token,
            'expires' => auth('api')->factory()->getTTL() * 60,
            'user'=>Auth::user()->load('pelanggan')],'Authentikasi Sukses');
    }

    public function aktifasiPelanggan(Request $request)
    {
        $this->validate($request, [
            'kode_aktivasi'   => 'required',
            'kontak'           => 'required',
        ]);

        $input=$request->only(['kode_aktivasi','kontak']);

        $user = User::where('kontak',$input['kontak'])->where('verification_token',$input['kode_aktivasi'])
            ->where('verified',0)->first();

        if(empty($user)){
            return $this->sendError('invalid_credentials', 401);
        }

        $voucher=Voucher::where('promo_awal',1)->first();

        try {
            DB::beginTransaction();
            $user->verified=1;
            $user->save();

            $role=Role::where('name','pelanggan')->first();

            $user->attachRole($role);

            if(!empty($voucher)){
                PelangganHasVoucher::create([
                    'pelanggan_id'=>$user->pelanggan->id,
                    'voucher_id'=>$voucher->id,
                    'point'=>0
            ]);
            }

            DB::commit();
            return $this->sendResponse($user->load('pelanggan'), 'Aktifasi berhasil');
        } catch (Exception $e){
            DB::rollBack();
            return $this->sendError('aktifasi gagal '.$e ->getMessage());
        }
    }

    public function removeUser(Request $request)
    {
        $this->validate($request, [
            'kontak'           => 'required',
        ]);

        $input=$request->only(['kontak']);

        $user = User::where('kontak',$input['kontak'])
            ->where('verified',0)
            ->first();

        if(empty($user)){
            return $this->sendError('invalid_credentials', 401);
        }

        try {
            DB::beginTransaction();

            $user->forceDelete();

            DB::commit();
            return $this->sendResponse($user, 'User berhasil dihapus');
        } catch (Exception $e){
            DB::rollBack();
            return $this->sendError('hapus user gagal '.$e ->getMessage());
        }
    }

    public function getAuthenticatedUser()
    {


            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        // the token is valid and we have found the user via the sub claim
        return $this->sendResponse($user,'Authentikasi Sukses');
    }

    public function getAuthenticatedPelanggan()
    {
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['user_not_found'], 404);
        }

        $user=$user->load('pelanggan');

        // the token is valid and we have found the user via the sub claim
        return $this->sendResponse($user,'Authentikasi Sukses');
    }
}