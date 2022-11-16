<?php

namespace App\Http\Controllers\Admin\Invertory;

use App\Http\Requests;
use App\Http\Requests\Invertory\CreateInventoryRequest;
use App\Http\Requests\Invertory\UpdateInventoryRequest;
use App\Repositories\Invertory\InventoryRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Invertory\Inventory;
use Flash;
use App\Repositories\Item\ItemRepository;
use App\Models\Item\Item;
use App\Models\Items\Itemlist;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class InventoryController extends InfyOmBaseController
{
    /** @var  InventoryRepository */
    private $inventoryRepository;

    public function __construct(InventoryRepository $inventoryRepo)
    {
        $this->inventoryRepository = $inventoryRepo;
    }

    /**
     * Display a listing of the Inventory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        //$this->inventoryRepository->pushCriteria(new RequestCriteria($request));
        //$inventories = $this->inventoryRepository->all();
        $inventories = Inventory::join('itemlists','itemlists.id', '=' , 'inventorys.item_lis')
                                        ->get();

        return view('admin.invertory.inventories.index',compact('inventories'));
    }

    /**
     * Show the form for creating a new Inventory.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.invertory.inventories.create');
    }

    /**
     * Store a newly created Inventory in storage.
     *
     * @param CreateInventoryRequest $request
     *
     * @return Response
     */
    public function store(CreateInventoryRequest $request)
    {
        $input = $request->all();

        $inventory = $this->inventoryRepository->create($input);

        Flash::success('Inventory saved successfully.');

        return redirect(route('admin.invertory.inventories.index'));
    }

    /**
     * Display the specified Inventory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inventory = $this->inventoryRepository->findWithoutFail($id);

        if (empty($inventory)) {
            Flash::error('Inventory not found');

            return redirect(route('inventories.index'));
        }

        return view('admin.invertory.inventories.show')->with('inventory', $inventory);
    }

    /**
     * Show the form for editing the specified Inventory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inventory = $this->inventoryRepository->findWithoutFail($id);

        if (empty($inventory)) {
            Flash::error('Inventory not found');

            return redirect(route('inventories.index'));
        }

        return view('admin.invertory.inventories.edit')->with('inventory', $inventory);
    }

    /**
     * Update the specified Inventory in storage.
     *
     * @param  int              $id
     * @param UpdateInventoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInventoryRequest $request)
    {
        $inventory = $this->inventoryRepository->findWithoutFail($id);

        

        if (empty($inventory)) {
            Flash::error('Inventory not found');

            return redirect(route('inventories.index'));
        }

        $inventory = $this->inventoryRepository->update($request->all(), $id);

        Flash::success('Inventory updated successfully.');

        return redirect(route('admin.invertory.inventories.index'));
    }

    /**
     * Remove the specified Inventory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.invertory.inventories.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Inventory::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.invertory.inventories.index'))->with('success', Lang::get('message.success.delete'));

       }

}
