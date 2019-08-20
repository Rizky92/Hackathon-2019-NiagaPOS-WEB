<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePromosiRequest;
use App\Http\Requests\UpdatePromosiRequest;
use App\Repositories\PromosiRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PromosiController extends AppBaseController
{
    /** @var  PromosiRepository */
    private $promosiRepository;

    public function __construct(PromosiRepository $promosiRepo)
    {
        $this->promosiRepository = $promosiRepo;
    }

    /**
     * Display a listing of the Promosi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->promosiRepository->pushCriteria(new RequestCriteria($request));
        $promosis = $this->promosiRepository->all();
        $users = User::pluck('name')->first();

        return view('promosis.index',compact('promosis','users'));

    }

    /**
     * Show the form for creating a new Promosi.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::pluck('name','id');
        return view('promosis.create',compact('users'));
    }

    /**
     * Store a newly created Promosi in storage.
     *
     * @param CreatePromosiRequest $request
     *
     * @return Response
     */
    public function store(CreatePromosiRequest $request)
    {
        $input = $request->all();

        $promosi = $this->promosiRepository->create($input);

        Flash::success('Promosi saved successfully.');

        return redirect(route('promosis.index'));
    }

    /**
     * Display the specified Promosi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $promosi = $this->promosiRepository->findWithoutFail($id);

        if (empty($promosi)) {
            Flash::error('Promosi not found');

            return redirect(route('promosis.index'));
        }

        return view('promosis.show')->with('promosi', $promosi);
    }

    /**
     * Show the form for editing the specified Promosi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $promosi = $this->promosiRepository->findWithoutFail($id);
        $users = User::pluck('name','id');

        if (empty($promosi)) {
            Flash::error('Promosi not found');

            return redirect(route('promosis.index'));
        }

        return view('promosis.edit',compact('promosi','users'));
    }

    /**
     * Update the specified Promosi in storage.
     *
     * @param  int              $id
     * @param UpdatePromosiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePromosiRequest $request)
    {
        $promosi = $this->promosiRepository->findWithoutFail($id);

        if (empty($promosi)) {
            Flash::error('Promosi not found');

            return redirect(route('promosis.index'));
        }

        $promosi = $this->promosiRepository->update($request->all(), $id);

        Flash::success('Promosi updated successfully.');

        return redirect(route('promosis.index'));
    }

    /**
     * Remove the specified Promosi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $promosi = $this->promosiRepository->findWithoutFail($id);

        if (empty($promosi)) {
            Flash::error('Promosi not found');

            return redirect(route('promosis.index'));
        }

        $this->promosiRepository->delete($id);

        Flash::success('Promosi deleted successfully.');

        return redirect(route('promosis.index'));
    }
}
