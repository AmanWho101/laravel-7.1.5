<?php

namespace App\Http\Controllers\Admin\Datamanagers;

use App\Http\Requests;
use App\Http\Requests\Datamanagers\CreateDatamanagerRequest;
use App\Http\Requests\Datamanagers\UpdateDatamanagerRequest;
use App\Repositories\Datamanagers\DatamanagerRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Datamanagers\Datamanager;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DatamanagerController extends InfyOmBaseController
{
    /** @var  DatamanagerRepository */
    private $datamanagerRepository;

    public function __construct(DatamanagerRepository $datamanagerRepo)
    {
        $this->datamanagerRepository = $datamanagerRepo;
    }

    /**
     * Display a listing of the Datamanager.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->datamanagerRepository->pushCriteria(new RequestCriteria($request));
        $datamanagers = $this->datamanagerRepository->all();
        return view('admin.datamanagers.datamanagers.index')
            ->with('datamanagers', $datamanagers);
    }

    /**
     * Show the form for creating a new Datamanager.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.datamanagers.datamanagers.create');
    }

    /**
     * Store a newly created Datamanager in storage.
     *
     * @param CreateDatamanagerRequest $request
     *
     * @return Response
     */
    public function store(CreateDatamanagerRequest $request)
    {
        $input = $request->all();

        $datamanager = $this->datamanagerRepository->create($input);

        Flash::success('Datamanager saved successfully.');

        return redirect(route('admin.datamanagers.datamanagers.index'));
    }

    /**
     * Display the specified Datamanager.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $datamanager = $this->datamanagerRepository->findWithoutFail($id);

        if (empty($datamanager)) {
            Flash::error('Datamanager not found');

            return redirect(route('datamanagers.index'));
        }

        return view('admin.datamanagers.datamanagers.show')->with('datamanager', $datamanager);
    }

    /**
     * Show the form for editing the specified Datamanager.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $datamanager = $this->datamanagerRepository->findWithoutFail($id);

        if (empty($datamanager)) {
            Flash::error('Datamanager not found');

            return redirect(route('datamanagers.index'));
        }

        return view('admin.datamanagers.datamanagers.edit')->with('datamanager', $datamanager);
    }

    /**
     * Update the specified Datamanager in storage.
     *
     * @param  int              $id
     * @param UpdateDatamanagerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDatamanagerRequest $request)
    {
        $datamanager = $this->datamanagerRepository->findWithoutFail($id);

        

        if (empty($datamanager)) {
            Flash::error('Datamanager not found');

            return redirect(route('datamanagers.index'));
        }

        $datamanager = $this->datamanagerRepository->update($request->all(), $id);

        Flash::success('Datamanager updated successfully.');

        return redirect(route('admin.datamanagers.datamanagers.index'));
    }

    /**
     * Remove the specified Datamanager from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.datamanagers.datamanagers.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Datamanager::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.datamanagers.datamanagers.index'))->with('success', Lang::get('message.success.delete'));

       }

}
