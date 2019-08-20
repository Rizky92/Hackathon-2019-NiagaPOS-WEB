<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStokRequest;
use App\Http\Requests\UpdateStokRequest;
use App\Repositories\StokRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StokController extends AppBaseController
{
    /** @var  StokRepository */
    private $stokRepository;

    public function __construct(StokRepository $stokRepo)
    {
        $this->stokRepository = $stokRepo;
    }

    /**
     * Display a listing of the Stok.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->stokRepository->pushCriteria(new RequestCriteria($request));
        $stoks = $this->stokRepository->findWhere(['site_id'=>Auth::user()->site_id]);

        return view('stoks.index')
            ->with('stoks', $stoks);
    }

    /**
     * Show the form for creating a new Stok.
     *
     * @return Response
     */
    public function create()
    {
        return view('stoks.create');
    }

    /**
     * Store a newly created Stok in storage.
     *
     * @param CreateStokRequest $request
     *
     * @return Response
     */
    public function store(CreateStokRequest $request)
    {
        $input = $request->all();

        $stok = $this->stokRepository->create($input);

        Flash::success('Stok saved successfully.');

        return redirect(route('stoks.index'));
    }

    /**
     * Display the specified Stok.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stok = $this->stokRepository->findWithoutFail($id);

        if (empty($stok)) {
            Flash::error('Stok not found');

            return redirect(route('stoks.index'));
        }

        return view('stoks.show')->with('stok', $stok);
    }

    /**
     * Show the form for editing the specified Stok.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stok = $this->stokRepository->findWithoutFail($id);

        if (empty($stok)) {
            Flash::error('Stok not found');

            return redirect(route('stoks.index'));
        }

        return view('stoks.edit')->with('stok', $stok);
    }

    /**
     * Update the specified Stok in storage.
     *
     * @param  int              $id
     * @param UpdateStokRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStokRequest $request)
    {
        $stok = $this->stokRepository->findWithoutFail($id);

        if (empty($stok)) {
            Flash::error('Stok not found');

            return redirect(route('stoks.index'));
        }

        $stok = $this->stokRepository->update($request->all(), $id);

        Flash::success('Stok updated successfully.');

        return redirect(route('stoks.index'));
    }

    /**
     * Remove the specified Stok from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stok = $this->stokRepository->findWithoutFail($id);

        if (empty($stok)) {
            Flash::error('Stok not found');

            return redirect(route('stoks.index'));
        }

        $this->stokRepository->delete($id);

        Flash::success('Stok deleted successfully.');

        return redirect(route('stoks.index'));
    }
}
