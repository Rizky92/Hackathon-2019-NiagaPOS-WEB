<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRewardRequest;
use App\Http\Requests\UpdateRewardRequest;
use App\Repositories\RewardRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Mockery\Exception;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;

class RewardController extends AppBaseController
{
    /** @var  RewardRepository */
    private $rewardRepository;

    public function __construct(RewardRepository $rewardRepo)
    {
        $this->rewardRepository = $rewardRepo;
    }

    /**
     * Display a listing of the Reward.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->rewardRepository->pushCriteria(new RequestCriteria($request));
        $rewards = $this->rewardRepository->all();

        return view('rewards.index')
            ->with('rewards', $rewards);
    }

    /**
     * Show the form for creating a new Reward.
     *
     * @return Response
     */
    public function create()
    {
        return view('rewards.create');
    }

    /**
     * Store a newly created Reward in storage.
     *
     * @param CreateRewardRequest $request
     *
     * @return Response
     */
    public function store(CreateRewardRequest $request)
    {
        //get request kecuali foto
        $input = $request->except('foto');

        try{
            DB::beginTransaction();

            //Simpan kedalam database kecuali foto
            $reward = $this->rewardRepository->create($input);

            //Upload Foto dan simpan path/url foto ke dalam database
            if( $request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $reward->id.'.'.$file->getClientOriginalExtension();
                $path=$request->foto->storeAs('public/reward', $filename,'local');
                $reward->foto='storage'.substr($path,strpos($path,'/'));
                $reward->save();
            }

            DB::commit();
            Flash::success('Data Reward berhasil ditambah.');
        }catch (Exception $e) {
            DB::rollback();
            Flash::error('Data Reward ditambah');
        }

        return redirect(route('rewards.index'));
    }

    /**
     * Display the specified Reward.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reward = $this->rewardRepository->findWithoutFail($id);

        if (empty($reward)) {
            Flash::error('Reward not found');

            return redirect(route('rewards.index'));
        }

        return view('rewards.show')->with('reward', $reward);
    }

    /**
     * Show the form for editing the specified Reward.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reward = $this->rewardRepository->findWithoutFail($id);

        if (empty($reward)) {
            Flash::error('Reward not found');

            return redirect(route('rewards.index'));
        }

        return view('rewards.edit')->with('reward', $reward);
    }

    /**
     * Update the specified Reward in storage.
     *
     * @param  int              $id
     * @param UpdateRewardRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRewardRequest $request)
    {
        $reward = $this->rewardRepository->findWithoutFail($id);

        if (empty($reward)) {
            Flash::error('Reward not found');

            return redirect(route('rewards.index'));
        }

        try{
            DB::beginTransaction();

            //Simpan kedalam database kecuali foto
            $reward = $this->rewardRepository->update($request->except('foto'), $id);

            //Upload Foto dan simpan path/url foto ke dalam database
            if( $request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $reward->id.'.'.$file->getClientOriginalExtension();
                $path=$request->foto->storeAs('public/reward', $filename,'local');
                $reward->foto='storage'.substr($path,strpos($path,'/'));
                $reward->save();
            }

            DB::commit();
            Flash::success('Data Site berhasil diubah.');
        }catch (Exception $e){
            DB::rollback();
            Flash::error('Data gagal diubah');
        }

        Flash::success('Reward updated successfully.');

        return redirect(route('rewards.index'));
    }

    /**
     * Remove the specified Reward from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reward = $this->rewardRepository->findWithoutFail($id);

        if (empty($reward)) {
            Flash::error('Reward not found');

            return redirect(route('rewards.index'));
        }

        $this->rewardRepository->delete($id);

        Flash::success('Reward deleted successfully.');

        return redirect(route('rewards.index'));
    }
}
