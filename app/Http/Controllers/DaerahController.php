<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDaerahRequest;
use App\Http\Requests\UpdateDaerahRequest;
use App\Models\Daerah;
use App\Repositories\DaerahRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DaerahController extends AppBaseController
{
    /** @var  DaerahRepository */
    private $daerahRepository;

    public function __construct(DaerahRepository $daerahRepo)
    {
        $this->daerahRepository = $daerahRepo;
    }

    /**
     * Display a listing of the Daerah.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->daerahRepository->pushCriteria(new RequestCriteria($request));
        $daerahs = $this->daerahRepository->all();

        return view('daerahs.index')
            ->with('daerahs', $daerahs);
    }

    /**
     * Show the form for creating a new Daerah.
     *
     * @return Response
     */
    public function create()
    {
        $listDaerah=Daerah::pluck('nama','id');
        return view('daerahs.create',compact('listDaerah'));
    }

    /**
     * Store a newly created Daerah in storage.
     *
     * @param CreateDaerahRequest $request
     *
     * @return Response
     */
    public function store(CreateDaerahRequest $request)
    {
        $input = $request->all();

        $daerah = $this->daerahRepository->create($input);

        Flash::success('Daerah saved successfully.');

        return redirect(route('daerahs.index'));
    }

    /**
     * Display the specified Daerah.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $daerah = $this->daerahRepository->findWithoutFail($id);

        if (empty($daerah)) {
            Flash::error('Daerah not found');

            return redirect(route('daerahs.index'));
        }

        return view('daerahs.show')->with('daerah', $daerah);
    }

    /**
     * Show the form for editing the specified Daerah.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $daerah = $this->daerahRepository->findWithoutFail($id);
        $listDaerah=Daerah::where('id','<>',$daerah->id)->pluck('nama','id');
        if (empty($daerah)) {
            Flash::error('Daerah not found');

            return redirect(route('daerahs.index'));
        }

        return view('daerahs.edit',compact('listDaerah'))->with('daerah', $daerah);
    }

    /**
     * Update the specified Daerah in storage.
     *
     * @param  int              $id
     * @param UpdateDaerahRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDaerahRequest $request)
    {
        $daerah = $this->daerahRepository->findWithoutFail($id);

        if (empty($daerah)) {
            Flash::error('Daerah not found');

            return redirect(route('daerahs.index'));
        }

        $daerah = $this->daerahRepository->update($request->all(), $id);

        Flash::success('Daerah updated successfully.');

        return redirect(route('daerahs.index'));
    }

    /**
     * Remove the specified Daerah from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $daerah = $this->daerahRepository->findWithoutFail($id);

        if (empty($daerah)) {
            Flash::error('Daerah not found');

            return redirect(route('daerahs.index'));
        }

        $this->daerahRepository->delete($id);

        Flash::success('Daerah deleted successfully.');

        return redirect(route('daerahs.index'));
    }
}
