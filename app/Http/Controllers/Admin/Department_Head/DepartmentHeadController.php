<?php

namespace App\Http\Controllers\Admin\Department_Head;

use App\Http\Requests;
use App\Http\Requests\Department_Head\CreateDepartmentHeadRequest;
use App\Http\Requests\Department_Head\UpdateDepartmentHeadRequest;
use App\Repositories\Department_Head\DepartmentHeadRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Department_Head\DepartmentHead;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DepartmentHeadController extends InfyOmBaseController
{
    /** @var  DepartmentHeadRepository */
    private $departmentHeadRepository;

    public function __construct(DepartmentHeadRepository $departmentHeadRepo)
    {
        $this->departmentHeadRepository = $departmentHeadRepo;
    }

    /**
     * Display a listing of the DepartmentHead.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->departmentHeadRepository->pushCriteria(new RequestCriteria($request));
        $departmentHeads = $this->departmentHeadRepository->all();
        return view('admin.departmentHead.departmentHeads.index')
            ->with('departmentHeads', $departmentHeads);
    }

    /**
     * Show the form for creating a new DepartmentHead.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.departmentHead.departmentHeads.create');
    }

    /**
     * Store a newly created DepartmentHead in storage.
     *
     * @param CreateDepartmentHeadRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartmentHeadRequest $request)
    {
        $input = $request->all();

        $departmentHead = $this->departmentHeadRepository->create($input);

        Flash::success('DepartmentHead saved successfully.');

        return redirect(route('admin.departmentHead.departmentHeads.index'));
    }

    /**
     * Display the specified DepartmentHead.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $departmentHead = $this->departmentHeadRepository->findWithoutFail($id);

        if (empty($departmentHead)) {
            Flash::error('DepartmentHead not found');

            return redirect(route('departmentHeads.index'));
        }

        return view('admin.departmentHead.departmentHeads.show')->with('departmentHead', $departmentHead);
    }

    /**
     * Show the form for editing the specified DepartmentHead.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $departmentHead = $this->departmentHeadRepository->findWithoutFail($id);

        if (empty($departmentHead)) {
            Flash::error('DepartmentHead not found');

            return redirect(route('departmentHeads.index'));
        }

        return view('admin.departmentHead.departmentHeads.edit')->with('departmentHead', $departmentHead);
    }

    /**
     * Update the specified DepartmentHead in storage.
     *
     * @param  int              $id
     * @param UpdateDepartmentHeadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartmentHeadRequest $request)
    {
        $departmentHead = $this->departmentHeadRepository->findWithoutFail($id);

        

        if (empty($departmentHead)) {
            Flash::error('DepartmentHead not found');

            return redirect(route('departmentHeads.index'));
        }

        $departmentHead = $this->departmentHeadRepository->update($request->all(), $id);

        Flash::success('DepartmentHead updated successfully.');

        return redirect(route('admin.departmentHead.departmentHeads.index'));
    }

    /**
     * Remove the specified DepartmentHead from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.departmentHead.departmentHeads.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = DepartmentHead::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.departmentHead.departmentHeads.index'))->with('success', Lang::get('message.success.delete'));

       }

}
