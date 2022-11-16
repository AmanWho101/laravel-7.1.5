<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Requests;
use App\Http\Requests\Store\CreateStoreRequest;
use App\Http\Requests\Store\UpdateStoreRequest;
use App\Repositories\Store\StoreRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Store\Store;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StoreController extends InfyOmBaseController
{
    /** @var  StoreRepository */
    private $storeRepository;

    public function __construct(StoreRepository $storeRepo)
    {
        $this->storeRepository = $storeRepo;
    }

    /**
     * Display a listing of the Store.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->storeRepository->pushCriteria(new RequestCriteria($request));
        $stores = $this->storeRepository->all();
        return view('admin.store.stores.index')
            ->with('stores', $stores);
    }

    /**
     * Show the form for creating a new Store.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.store.stores.create');
    }

    /**
     * Store a newly created Store in storage.
     *
     * @param CreateStoreRequest $request
     *
     * @return Response
     */
    public function store(CreateStoreRequest $request)
    {
        $input = $request->all();

        $store = $this->storeRepository->create($input);

        Flash::success('Store saved successfully.');

        return redirect(route('admin.store.stores.index'));
    }

    /**
     * Display the specified Store.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $store = $this->storeRepository->findWithoutFail($id);

        if (empty($store)) {
            Flash::error('Store not found');

            return redirect(route('stores.index'));
        }

        return view('admin.store.stores.show')->with('store', $store);
    }

    /**
     * Show the form for editing the specified Store.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $store = $this->storeRepository->findWithoutFail($id);

        if (empty($store)) {
            Flash::error('Store not found');

            return redirect(route('stores.index'));
        }

        return view('admin.store.stores.edit')->with('store', $store);
    }

    /**
     * Update the specified Store in storage.
     *
     * @param  int              $id
     * @param UpdateStoreRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStoreRequest $request)
    {
        $store = $this->storeRepository->findWithoutFail($id);

        

        if (empty($store)) {
            Flash::error('Store not found');

            return redirect(route('stores.index'));
        }

        $store = $this->storeRepository->update($request->all(), $id);

        Flash::success('Store updated successfully.');

        return redirect(route('admin.store.stores.index'));
    }

    /**
     * Remove the specified Store from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.store.stores.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Store::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.store.stores.index'))->with('success', Lang::get('message.success.delete'));

       }

}
