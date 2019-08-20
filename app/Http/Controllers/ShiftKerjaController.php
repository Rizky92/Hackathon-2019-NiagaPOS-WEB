<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShiftKerjaRequest;
use App\Http\Requests\UpdateShiftKerjaRequest;
use App\Repositories\ShiftKerjaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ShiftKerjaController extends AppBaseController
{
    /** @var  ShiftKerjaRepository */
    private $shiftKerjaRepository;

    public function __construct(ShiftKerjaRepository $shiftKerjaRepo)
    {
        $this->shiftKerjaRepository = $shiftKerjaRepo;
    }

    /**
     * Display a listing of the ShiftKerja.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->shiftKerjaRepository->pushCriteria(new RequestCriteria($request));
        $shiftKerjas = $this->shiftKerjaRepository->all();

        return view('shift_kerjas.index')
            ->with('shiftKerjas', $shiftKerjas);
    }

    /**
     * Show the form for creating a new ShiftKerja.
     *
     * @return Response
     */
    public function create()
    {
        return view('shift_kerjas.create');
    }

    /**
     * Store a newly created ShiftKerja in storage.
     *
     * @param CreateShiftKerjaRequest $request
     *
     * @return Response
     */
    public function store(CreateShiftKerjaRequest $request)
    {
        $input = $request->all();

        $shiftKerja = $this->shiftKerjaRepository->create($input);

        Flash::success('Shift Kerja saved successfully.');

        return redirect(route('shiftKerjas.index'));
    }

    /**
     * Display the specified ShiftKerja.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shiftKerja = $this->shiftKerjaRepository->findWithoutFail($id);

        if (empty($shiftKerja)) {
            Flash::error('Shift Kerja not found');

            return redirect(route('shiftKerjas.index'));
        }

        return view('shift_kerjas.show')->with('shiftKerja', $shiftKerja);
    }

    /**
     * Show the form for editing the specified ShiftKerja.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shiftKerja = $this->shiftKerjaRepository->findWithoutFail($id);

        if (empty($shiftKerja)) {
            Flash::error('Shift Kerja not found');

            return redirect(route('shiftKerjas.index'));
        }

        return view('shift_kerjas.edit')->with('shiftKerja', $shiftKerja);
    }

    /**
     * Update the specified ShiftKerja in storage.
     *
     * @param  int              $id
     * @param UpdateShiftKerjaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateShiftKerjaRequest $request)
    {
        $shiftKerja = $this->shiftKerjaRepository->findWithoutFail($id);

        if (empty($shiftKerja)) {
            Flash::error('Shift Kerja not found');

            return redirect(route('shiftKerjas.index'));
        }

        $shiftKerja = $this->shiftKerjaRepository->update($request->all(), $id);

        Flash::success('Shift Kerja updated successfully.');

        return redirect(route('shiftKerjas.index'));
    }

    /**
     * Remove the specified ShiftKerja from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shiftKerja = $this->shiftKerjaRepository->findWithoutFail($id);

        if (empty($shiftKerja)) {
            Flash::error('Shift Kerja not found');

            return redirect(route('shiftKerjas.index'));
        }

        $this->shiftKerjaRepository->delete($id);

        Flash::success('Shift Kerja deleted successfully.');

        return redirect(route('shiftKerjas.index'));
    }
}
