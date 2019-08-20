<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDistributorRequest;
use App\Http\Requests\UpdateDistributorRequest;
use App\Repositories\DistributorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DistributorController extends AppBaseController
{
    /** @var  DistributorRepository */
    private $distributorRepository;

    public function __construct(DistributorRepository $distributorRepo)
    {
        $this->distributorRepository = $distributorRepo;
    }

    /**
     * Display a listing of the Distributor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->distributorRepository->pushCriteria(new RequestCriteria($request));
        $distributors = $this->distributorRepository->all();

        return view('distributors.index')
            ->with('distributors', $distributors);
    }

    /**
     * Show the form for creating a new Distributor.
     *
     * @return Response
     */
    public function create()
    {
        return view('distributors.create');
    }

    /**
     * Store a newly created Distributor in storage.
     *
     * @param CreateDistributorRequest $request
     *
     * @return Response
     */
    public function store(CreateDistributorRequest $request)
    {
        $input = $request->all();

        $distributor = $this->distributorRepository->create($input);

        Flash::success('Distributor saved successfully.');

        return redirect(route('distributors.index'));
    }

    /**
     * Display the specified Distributor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $distributor = $this->distributorRepository->findWithoutFail($id);

        if (empty($distributor)) {
            Flash::error('Distributor not found');

            return redirect(route('distributors.index'));
        }

        return view('distributors.show')->with('distributor', $distributor);
    }

    /**
     * Show the form for editing the specified Distributor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $distributor = $this->distributorRepository->findWithoutFail($id);

        if (empty($distributor)) {
            Flash::error('Distributor not found');

            return redirect(route('distributors.index'));
        }

        return view('distributors.edit')->with('distributor', $distributor);
    }

    /**
     * Update the specified Distributor in storage.
     *
     * @param  int              $id
     * @param UpdateDistributorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDistributorRequest $request)
    {
        $distributor = $this->distributorRepository->findWithoutFail($id);

        if (empty($distributor)) {
            Flash::error('Distributor not found');

            return redirect(route('distributors.index'));
        }

        $distributor = $this->distributorRepository->update($request->all(), $id);

        Flash::success('Distributor updated successfully.');

        return redirect(route('distributors.index'));
    }

    /**
     * Remove the specified Distributor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $distributor = $this->distributorRepository->findWithoutFail($id);

        if (empty($distributor)) {
            Flash::error('Distributor not found');

            return redirect(route('distributors.index'));
        }

        $this->distributorRepository->delete($id);

        Flash::success('Distributor deleted successfully.');

        return redirect(route('distributors.index'));
    }
}
