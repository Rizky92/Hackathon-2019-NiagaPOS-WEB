<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProdusenRequest;
use App\Http\Requests\UpdateProdusenRequest;
use App\Models\Store;
use App\Repositories\ProdusenRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProdusenController extends AppBaseController
{
    /** @var  ProdusenRepository */
    private $produsenRepository;

    public function __construct(ProdusenRepository $produsenRepo)
    {
        $this->produsenRepository = $produsenRepo;
    }

    /**
     * Display a listing of the Produsen.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->produsenRepository->pushCriteria(new RequestCriteria($request));
        $produsens = $this->produsenRepository->findWhere(['store_id'=>Auth::user()->site->store_id]);
        $store=Store::pluck('nama');

        return view('produsens.index',compact('produsens','store'));

    }

    /**
     * Show the form for creating a new Produsen.
     *
     * @return Response
     */
    public function create()
    {
        $store=Store::pluck('nama','id');
        return view('produsens.create',compact('store'));
    }

    /**
     * Store a newly created Produsen in storage.
     *
     * @param CreateProdusenRequest $request
     *
     * @return Response
     */
    public function store(CreateProdusenRequest $request)
    {
        $input = $request->all();

        $produsen = $this->produsenRepository->create($input);

        Flash::success('Produsen saved successfully.');


        return redirect(route('produsens.index'));
    }

    /**
     * Display the specified Produsen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $produsen = $this->produsenRepository->findWithoutFail($id);

        if (empty($produsen)) {
            Flash::error('Produsen not found');

            return redirect(route('produsens.index'));
        }

        return view('produsens.show')->with('produsen', $produsen);
    }

    /**
     * Show the form for editing the specified Produsen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $produsen = $this->produsenRepository->findWithoutFail($id);
        $store=Store::pluck('nama','id');

        if (empty($produsen)) {
            Flash::error('Produsen not found');

            return redirect(route('produsens.index'));
        }

        return view('produsens.edit',compact('store'))->with('produsen', $produsen);
    }

    /**
     * Update the specified Produsen in storage.
     *
     * @param  int              $id
     * @param UpdateProdusenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProdusenRequest $request)
    {
        $produsen = $this->produsenRepository->findWithoutFail($id);

        if (empty($produsen)) {
            Flash::error('Produsen not found');

            return redirect(route('produsens.index'));
        }

        $produsen = $this->produsenRepository->update($request->all(), $id);

        Flash::success('Produsen updated successfully.');

        return redirect(route('produsens.index'));
    }

    /**
     * Remove the specified Produsen from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $produsen = $this->produsenRepository->findWithoutFail($id);

        if (empty($produsen)) {
            Flash::error('Produsen not found');

            return redirect(route('produsens.index'));
        }

        $this->produsenRepository->delete($id);

        Flash::success('Produsen deleted successfully.');

        return redirect(route('produsens.index'));
    }
}
