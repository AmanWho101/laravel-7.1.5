<?php

namespace App\Http\Controllers\Admin\Head_Of_Store;

use App\Http\Requests;
use App\Http\Requests\Head_Of_Store\CreateHeadofStoreRequest;
use App\Http\Requests\Head_Of_Store\UpdateHeadofStoreRequest;
use App\Repositories\Head_Of_Store\HeadofStoreRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Head_Of_Store\HeadofStore;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class HeadofStoreController extends InfyOmBaseController
{
    /** @var  HeadofStoreRepository */
    private $headofStoreRepository;

    public function __construct(HeadofStoreRepository $headofStoreRepo)
    {
        $this->headofStoreRepository = $headofStoreRepo;
    }

    /**
     * Display a listing of the HeadofStore.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->headofStoreRepository->pushCriteria(new RequestCriteria($request));
        $headofStores = $this->headofStoreRepository->all();
        return view('admin.headOfStore.headofStores.index')
            ->with('headofStores', $headofStores);
    }

    /**
     * Show the form for creating a new HeadofStore.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.headOfStore.headofStores.create');
    }

    /**
     * Store a newly created HeadofStore in storage.
     *
     * @param CreateHeadofStoreRequest $request
     *
     * @return Response
     */
    public function store(CreateHeadofStoreRequest $request)
    {
        $input = $request->all();

        $headofStore = $this->headofStoreRepository->create($input);

        Flash::success('HeadofStore saved successfully.');

        return redirect(route('admin.headOfStore.headofStores.index'));
    }

    /**
     * Display the specified HeadofStore.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $headofStore = $this->headofStoreRepository->findWithoutFail($id);

        if (empty($headofStore)) {
            Flash::error('HeadofStore not found');

            return redirect(route('headofStores.index'));
        }

        return view('admin.headOfStore.headofStores.show')->with('headofStore', $headofStore);
    }

    /**
     * Show the form for editing the specified HeadofStore.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $headofStore = $this->headofStoreRepository->findWithoutFail($id);

        if (empty($headofStore)) {
            Flash::error('HeadofStore not found');

            return redirect(route('headofStores.index'));
        }

        return view('admin.headOfStore.headofStores.edit')->with('headofStore', $headofStore);
    }

    /**
     * Update the specified HeadofStore in storage.
     *
     * @param  int              $id
     * @param UpdateHeadofStoreRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHeadofStoreRequest $request)
    {
        $headofStore = $this->headofStoreRepository->findWithoutFail($id);

        

        if (empty($headofStore)) {
            Flash::error('HeadofStore not found');

            return redirect(route('headofStores.index'));
        }

        $headofStore = $this->headofStoreRepository->update($request->all(), $id);

        Flash::success('HeadofStore updated successfully.');

        return redirect(route('admin.headOfStore.headofStores.index'));
    }

    /**
     * Remove the specified HeadofStore from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.headOfStore.headofStores.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = HeadofStore::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.headOfStore.headofStores.index'))->with('success', Lang::get('message.success.delete'));

       }

}
