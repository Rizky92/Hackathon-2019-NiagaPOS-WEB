<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVoucherRequest;
use App\Http\Requests\UpdateVoucherRequest;
use App\Models\Voucher;
use App\Repositories\VoucherRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;

class VoucherController extends AppBaseController
{
    /** @var  VoucherRepository */
    private $voucherRepository;

    public function __construct(VoucherRepository $voucherRepo)
    {
        $this->voucherRepository = $voucherRepo;
    }

    /**
     * Display a listing of the Voucher.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->voucherRepository->pushCriteria(new RequestCriteria($request));
        $vouchers = $this->voucherRepository->orderBy('created_at','desc')->all();
        $users = User::pluck('name')->first();

        return view('vouchers.index',compact('users', 'vouchers'));

    }

    /**
     * Show the form for creating a new Voucher.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::pluck('name','id');

        return view('vouchers.create',compact('users'));
    }

    /**
     * Store a newly created Voucher in storage.
     *
     * @param CreateVoucherRequest $request
     *
     * @return Response
     */
    public function store(CreateVoucherRequest $request)
    {
        $input = $request->except('foto');



        try{
            DB::beginTransaction();

            //Simpan kedalam database kecuali foto
            $voucher = $this->voucherRepository->create($input);

            //Upload Foto dan simpan path/url foto ke dalam database
            if( $request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $voucher->id.'.'.$file->getClientOriginalExtension();
                $path=$request->foto->storeAs('public/voucher', $filename,'local');
                $voucher->foto='storage'.substr($path,strpos($path,'/'));
                $voucher->save();
            }

            DB::commit();
            Flash::success('Data Berita berhasil diubah.');
        }catch (Exception $e) {
            DB::rollback();
            Flash::error('Data Berita diubah');
        }

        Flash::success('Voucher saved successfully.');

        return redirect(route('vouchers.index'));
    }

    /**
     * Display the specified Voucher.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $voucher = $this->voucherRepository->findWithoutFail($id);

        if (empty($voucher)) {
            Flash::error('Voucher not found');

            return redirect(route('vouchers.index'));
        }

        return view('vouchers.show')->with('voucher', $voucher);
    }

    /**
     * Show the form for editing the specified Voucher.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $voucher = $this->voucherRepository->findWithoutFail($id);

        if (empty($voucher)) {
            Flash::error('Voucher not found');

            return redirect(route('vouchers.index'));
        }

        return view('vouchers.edit')->with('voucher', $voucher);
    }

    /**
     * Update the specified Voucher in storage.
     *
     * @param  int              $id
     * @param UpdateVoucherRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVoucherRequest $request)
    {
        $voucher = $this->voucherRepository->findWithoutFail($id);

        if (empty($voucher)) {
            Flash::error('Voucher not found');

            return redirect(route('vouchers.index'));
        }



        try{
            DB::beginTransaction();

            //Simpan kedalam database kecuali foto
            $voucher = $this->voucherRepository->update($request->except('foto'), $id);

            //Upload Foto dan simpan path/url foto ke dalam database
            if( $request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $voucher->id.'.'.$file->getClientOriginalExtension();
                $path=$request->foto->storeAs('public/voucher', $filename,'local');
                $voucher->foto='storage'.substr($path,strpos($path,'/'));
                $voucher->save();
            }

            DB::commit();
            Flash::success('Data Berita berhasil diubah.');
        }catch (Exception $e) {
            DB::rollback();
            Flash::error('Data Berita diubah');
        }

        Flash::success('Voucher updated successfully.');

        return redirect(route('vouchers.index'));
    }

    /**
     * Remove the specified Voucher from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $voucher = $this->voucherRepository->findWithoutFail($id);

        if (empty($voucher)) {
            Flash::error('Voucher not found');

            return redirect(route('vouchers.index'));
        }

        $this->voucherRepository->delete($id);

        Flash::success('Voucher deleted successfully.');

        return redirect(route('vouchers.index'));
    }

}
