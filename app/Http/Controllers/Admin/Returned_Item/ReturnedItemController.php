<?php

namespace App\Http\Controllers\Admin\Returned_Item;

use App\Http\Requests;
use App\Http\Requests\Returned_Item\CreateReturnedItemRequest;
use App\Http\Requests\Returned_Item\UpdateReturnedItemRequest;
use App\Repositories\Returned_Item\ReturnedItemRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Returned_Item\ReturnedItem;
use App\Models\Borrowed_Item\BorrowedItem;
use App\Models\Invertory\Inventory;
use App\Repositories\Invertory\InventoryRepository;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ReturnedItemController extends InfyOmBaseController
{
    /** @var  ReturnedItemRepository */
    private $returnedItemRepository;
    private $inventoryRepository;

    public function __construct(ReturnedItemRepository $returnedItemRepo,InventoryRepository $inventoryRepo)
    {
        $this->returnedItemRepository = $returnedItemRepo;
        $this->inventoryRepository = $inventoryRepo;
    }

    /**
     * Display a listing of the ReturnedItem.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        //$this->returnedItemRepository->pushCriteria(new RequestCriteria($request));
        //$returnedItems = $this->returnedItemRepository->all();

        $returnedItems = ReturnedItem::join('users', 'users.id', '=' , 'returneditems.user_id' )
        ->join('itemlists','itemlists.id', '=' , 'returneditems.item_id')
        ->get(['returneditems.id','users.email',
        'itemlists.name_il','returneditems.created_at']);

        return view('admin.returnedItem.returnedItems.index'
        ,compact('returnedItems',$returnedItems));
    }

    /**
     * Show the form for creating a new ReturnedItem.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.returnedItem.returnedItems.create');
    }

    /**
     * Store a newly created ReturnedItem in storage.
     *
     * @param CreateReturnedItemRequest $request
     *
     * @return Response
     */
    public function store(CreateReturnedItemRequest $request)
    {
        //$input = $request->all();

        //$returnedItem = $this->returnedItemRepository->create($input);
       
        $bitem = $request->input('itemid');
        BorrowedItem::where('borroweditems.id',$bitem)->delete();

        $ReturnedItem = new ReturnedItem();
        $ReturnedItem->user_id = $request->input('user_id');
        $ReturnedItem->item_id = $request->input('item_id');
        $item_b = $request->input('quantity_b');
        $inventory = new Inventory();

        $return = $request->input('item_id');
        $items = Inventory::select('*')
        ->where('inventorys.item_lis',$return)
        ->first();
        $item_tt = collect($items->item_tot)->first();
            if($items){

                $item_t = $item_tt - $item_b;
                $ReturnedItem->save();
                Inventory::where('inventorys.item_lis',$return)->update(array( 'item_lef' => $item_t));
               // $inventory->save();
              
        }
       

        
        Flash::success('ReturnedItem saved successfully.');

        return redirect(route('admin.returnedItem.returnedItems.index'));
    }

    /**
     * Display the specified ReturnedItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
       // $returnedItem = $this->returnedItemRepository->findWithoutFail($id);
       $returnedItem = ReturnedItem::where('returneditems.id', $id )
       ->join('users', 'users.id', '=' , 'returneditems.user_id' )
        ->join('itemlists','itemlists.id', '=' , 'returneditems.item_id')
       ->get(['returneditems.id','users.email',
       'itemlists.name_il','returneditems.created_at']);
        if (empty($returnedItem)) {
            Flash::error('ReturnedItem not found');

            return redirect(route('returnedItems.index'));
        }

        return view('admin.returnedItem.returnedItems.show',compact('returnedItem',$returnedItem));
    }

    /**
     * Show the form for editing the specified ReturnedItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $returnedItem = $this->returnedItemRepository->findWithoutFail($id);

        if (empty($returnedItem)) {
            Flash::error('ReturnedItem not found');

            return redirect(route('returnedItems.index'));
        }

        return view('admin.returnedItem.returnedItems.edit')->with('returnedItem', $returnedItem);
    }

    /**
     * Update the specified ReturnedItem in storage.
     *
     * @param  int              $id
     * @param UpdateReturnedItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReturnedItemRequest $request)
    {
        $returnedItem = $this->returnedItemRepository->findWithoutFail($id);

        

        if (empty($returnedItem)) {
            Flash::error('ReturnedItem not found');

            return redirect(route('returnedItems.index'));
        }

        $returnedItem = $this->returnedItemRepository->update($request->all(), $id);

        Flash::success('ReturnedItem updated successfully.');

        return redirect(route('admin.returnedItem.returnedItems.index'));
    }

    /**
     * Remove the specified ReturnedItem from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.returnedItem.returnedItems.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = ReturnedItem::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.returnedItem.returnedItems.index'))->with('success', Lang::get('message.success.delete'));

       }

}
