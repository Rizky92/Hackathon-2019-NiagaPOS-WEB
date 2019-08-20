<?php

namespace App\Http\Controllers;

use App\Http\Controllers\TraitController\FcmTrait;
use App\Http\Requests\CreateBeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;
use App\Repositories\BeritaRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Mockery\Exception;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;

class BeritaController extends AppBaseController
{
    use FcmTrait;
    /** @var  BeritaRepository */
    private $beritaRepository;

    public function __construct(BeritaRepository $beritaRepo)
    {
        $this->beritaRepository = $beritaRepo;
    }

    /**
     * Display a listing of the Berita.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->beritaRepository->pushCriteria(new RequestCriteria($request));
        $beritas = $this->beritaRepository->orderBy('created_at','desc')->all();

        return view('beritas.index')
            ->with('beritas', $beritas);
    }

    /**
     * Show the form for creating a new Berita.
     *
     * @return Response
     */
    public function create()
    {
        return view('beritas.create');
    }

    /**
     * Store a newly created Berita in storage.
     *
     * @param CreateBeritaRequest $request
     *
     * @return Response
     */
    public function store(CreateBeritaRequest $request)
    {
        $input = $request->except('foto');

        try{
            DB::beginTransaction();

            //Simpan kedalam database kecuali foto
            $berita = $this->beritaRepository->create($input);

            //Upload Foto dan simpan path/url foto ke dalam database
            if( $request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $berita->id.'.'.$file->getClientOriginalExtension();
                $path=$request->foto->storeAs('public/berita', $filename,'local');
                $berita->foto='storage'.substr($path,strpos($path,'/'));
                $berita->save();
            }

            DB::commit();

            $token_devices=User::whereHas('pelanggan')->pluck('token_device')->toArray();

            $data=[];
            $data['id_berita']=$berita->id;
            $data['type']='berita_baru';
            $data['title_berita']=$berita->judul;
            $data['foto_berita']=$berita->foto;
            $data['create_berita']=$berita->created_at->format('d/m/Y');

            if(!empty($token_devices)){
                $this->sendNotification($token_devices,
                    "Informasi Citra Niaga","Citra Niaga",$data);
            }
            Flash::success('Data Berita berhasil ditambah.');
        }catch (Exception $e) {
            DB::rollback();
            Flash::error('Data Berita ditambah');
        }

        Flash::success('Berita saved successfully.');

        return redirect(route('beritas.index'));
    }

    /**
     * Display the specified Berita.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $berita = $this->beritaRepository->findWithoutFail($id);

        if (empty($berita)) {
            Flash::error('Berita not found');

            return redirect(route('beritas.index'));
        }

        return view('beritas.show')->with('berita', $berita);
    }

    /**
     * Show the form for editing the specified Berita.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $berita = $this->beritaRepository->findWithoutFail($id);

        if (empty($berita)) {
            Flash::error('Berita not found');

            return redirect(route('beritas.index'));
        }

        return view('beritas.edit')->with('berita', $berita);
    }

    /**
     * Update the specified Berita in storage.
     *
     * @param  int              $id
     * @param UpdateBeritaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBeritaRequest $request)
    {
        $berita = $this->beritaRepository->findWithoutFail($id);

        if (empty($berita)) {
            Flash::error('Berita not found');

            return redirect(route('beritas.index'));
        }

        try{
            DB::beginTransaction();

            //Simpan kedalam database kecuali foto
            $berita = $this->beritaRepository->update($request->except('foto'), $id);

            //Upload Foto dan simpan path/url foto ke dalam database
            if( $request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $berita->id.'.'.$file->getClientOriginalExtension();
                $path=$request->foto->storeAs('public/berita', $filename,'local');
                $berita->foto='storage'.substr($path,strpos($path,'/'));
                $berita->save();
            }

            DB::commit();
            Flash::success('Data Berita berhasil diubah.');
        }catch (Exception $e) {
            DB::rollback();
            Flash::error('Data Berita diubah');
        }


        Flash::success('Berita updated successfully.');

        return redirect(route('beritas.index'));
    }

    /**
     * Remove the specified Berita from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $berita = $this->beritaRepository->findWithoutFail($id);

        if (empty($berita)) {
            Flash::error('Berita not found');

            return redirect(route('beritas.index'));
        }

        $this->beritaRepository->delete($id);

        Flash::success('Berita deleted successfully.');

        return redirect(route('beritas.index'));
    }
}
