<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Requests;
use App\Http\Requests\Item\CreateItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;
use App\Repositories\Item\ItemRepository;
use App\Models\Item\Item;
use App\Repositories\store\StoreRepository;
use App\Repositories\Item_Category\ItemCategorRepository;
use App\Repositories\Item_Units\ItemUnitRepository;
use App\Repositories\Items_List\ItemlistRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

use App\Models\Invertory\Inventory;
use App\Repositories\Invertory\InventoryRepository;
use App\Models\Item_Units\ItemUnit;
use App\Models\Items\Itemlist;
use Flash;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ItemController extends InfyOmBaseController
{
    /** @var  ItemRepository */
    private $itemRepository;
    private $itemUnit;
    private $itemlist;
    private $itemcategory;
    private $storeRepo;
    private $inventoryRepository;

    public function __construct(StoreRepository $store,InventoryRepository $inventoryR,ItemRepository $itemRepo,ItemUnitRepository $itemU,ItemlistRepository $iteml, ItemCategorRepository $itemc)
    {
        $this->storeRepo = $store;
        $this->itemRepository = $itemRepo;
        $this->itemUnit = $itemU;
        $this->itemlist = $iteml;
        $this->itemcategory = $itemc;
        $this->inventoryRepository = $inventoryR;
    }

    /**
     * Display a listing of the Item.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $items = Item::join('stores', 'stores.id', '=' , 'items.store_id' )
                                        ->join('itemcategors','itemcategors.id', '=' , 'items.item_category_id')
                                        ->join('itemlists','itemlists.id', '=' , 'items.item_list_id')
                                        ->join('itemunits','itemunits.id', '=' , 'items.item_unit_id')
                                        ->get(['items.id','items.quantity','stores.type','itemcategors.name_ic','itemlists.name_il','itemunits.name_iu']);

        return view('admin.item.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new Item.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $this->itemUnit->pushCriteria(new RequestCriteria($request));
        $this->itemlist->pushCriteria(new RequestCriteria($request));
        $this->itemcategory->pushCriteria(new RequestCriteria($request));
        $this->storeRepo->pushCriteria(new RequestCriteria($request));
        $itemu  = $this->itemUnit->all();
        $itemc  = $this->itemcategory->all();
        $iteml  = $this->itemlist->all();
        $stores = $this->storeRepo->all(); 
        return view('admin.item.items.create')
        ->with('iteml',$iteml)
        ->with('itemc',$itemc)
        ->with('itemu',$itemu)
        ->with('store',$stores);
    }

    /**
     * Store a newly created Item in storage.
     *
     * @param CreateItemRequest $request
     *
     * @return Response
     */
    public function store(CreateItemRequest $request)
    {
                $input = $request->all();
                $item_l = $request->item_list_id;
                $item_q = $request->quantity;

            foreach ($item_q as $key => $value) {
                
                $items = Inventory::select('*')
                                    ->where('inventorys.item_lis',$item_l[$key])
                                    ->first();
                if($items == null ){

                    foreach ($item_q as $key => $value) {
                        
                        Inventory::create([
                            'item_lis' => $request->item_list_id[$key],
                            'item_tot' => $request->quantity[$key]
                        ]);
                        Item::create([
        
                            'store_id' => $request->store_id[$key],
                            'item_list_id' => $request->item_list_id[$key],
                            'item_category_id' => $request->item_category_id[$key],
                            'item_unit_id' => $request->item_unit_id[$key],
                            'quantity'=>$request->quantity[$key]
        
                        ]);
        
                    }
                    
                        Flash::success('Item saved successfully.');
        
                        return redirect(route('admin.item.items.index'));
                      
                      }else{
                        $item_tt = collect($items->item_tot)->first();
                        $item_t = $item_tt + $item_q[$key];
                      
                        Inventory::where('inventorys.item_lis',$item_l[$key])
                                    ->update(array( 'item_tot' => $item_t,'item_lis' => $item_l[$key]));
                      
                        Item::create([
        
                            'store_id' => $request->store_id[$key],
                            'item_list_id' => $request->item_list_id[$key],
                            'item_category_id' => $request->item_category_id[$key],
                            'item_unit_id' => $request->item_unit_id[$key],
                            'quantity'=>$request->quantity[$key]
        
                        ]);

                        Flash::success('Item saved successfully.');
        
                            return redirect(route('admin.item.items.index'));
                     
                      }
            }
                

        
    }

    /**
     * Display the specified Item.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
       // $item = $this->itemRepository->findWithoutFail($id);
        
        
       $item = Item::where('items.id', $id )
       ->join('stores', 'stores.id', '=' , 'items.store_id' )
       ->join('itemcategors','itemcategors.id', '=' , 'items.item_category_id')
       ->join('itemlists','itemlists.id', '=' , 'items.item_list_id')
       ->join('itemunits','itemunits.id', '=' , 'items.item_unit_id')
       ->get(['items.id','items.quantity','stores.type',
       'itemcategors.name_ic','itemlists.name_il','itemunits.name_iu']);


        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        return view('admin.item.items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified Item.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //$item = $this->itemRepository->findWithoutFail($id);

        $item = Item::where('items.id', $id )
        ->join('stores', 'stores.id', '=' , 'items.store_id' )
        ->join('itemcategors','itemcategors.id', '=' , 'items.item_category_id')
        ->join('itemlists','itemlists.id', '=' , 'items.item_list_id')
        ->join('itemunits','itemunits.id', '=' , 'items.item_unit_id')
        ->get(['items.id','items.quantity','stores.type',
        'itemcategors.name_ic','itemlists.name_il','itemunits.name_iu']);
 
        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        return view('admin.item.items.edit',compact('item'));
    }

    /**
     * Update the specified Item in storage.
     *
     * @param  int              $id
     * @param UpdateItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItemRequest $request)
    {
        $item = $this->itemRepository->findWithoutFail($id);

        

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        $item = $this->itemRepository->update($request->all(), $id);

        Flash::success('Item updated successfully.');

        return redirect(route('admin.item.items.index'));
    }

    /**
     * Remove the specified Item from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.item.items.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Item::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.item.items.index'))->with('success', Lang::get('message.success.delete'));

       }

}
