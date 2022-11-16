<?php

namespace App\Http\Controllers\Admin\Borrowed_Item;

use App\Http\Requests;
use App\Http\Requests\Borrowed_Item\CreateBorrowedItemRequest;
use App\Http\Requests\Borrowed_Item\UpdateBorrowedItemRequest;
use App\Repositories\Borrowed_Item\BorrowedItemRepository;

use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Borrowed_Item\BorrowedItem;
use App\Models\Invertory\Inventory;
use App\Models\Item_Category\ItemCategor;
use App\Models\Item_Units\ItemUnit;
use App\Models\Items_List\Itemlist;
use App\Models\Store\Store;
use App\Repositories\Items_List\ItemlistRepository;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\User;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\Transaction as TransactionTransaction;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class BorrowedItemController extends InfyOmBaseController
{
    /** @var  BorrowedItemRepository */
    private $borrowedItemRepository;
    private $ItemlistRepository;
    public function __construct(BorrowedItemRepository $borrowedItemRepo,
     ItemlistRepository $itemlrepo)
    {
        $this->borrowedItemRepository = $borrowedItemRepo;
        $this->ItemlistRepository = $itemlrepo;
    }

    /**
     * Display a listing of the BorrowedItem.
     *
     * @param Request $request
     * @return Response
     */

    public function index(Request $request)
    {
       
        // $this->borrowedItemRepository->pushCriteria(new RequestCriteria($request));

        // $borrowedItems = $this->borrowedItemRepository->all();

        $borrowedItems = BorrowedItem::join('users', 'users.id', '=' , 'borroweditems.name_b' )
        ->join('itemlists','itemlists.id', '=' , 'borroweditems.item_b')
        ->where('borroweditems.w_approve','=',1)
        // ->where('borroweditems.d_approve','=',1)
        ->where('borroweditems.hos_approved','=',1)
        ->get(['borroweditems.id','users.email','borroweditems.item_b',
        'itemlists.name_il','borroweditems.name_b',
        'borroweditems.quantity_b','borroweditems.room_b','borroweditems.created_at']);


        return view('admin.borrowedItem.borrowedItems.index',compact('borrowedItems',$borrowedItems));
            // ->with('borrowedItems', $borrowedItems);
    }

    /**
     * Show the form for creating a new BorrowedItem.
     *
     * @return Response
     */
    public function create()
    {   
        $stores = Store::get();
        $users = User::get();
        $unit = ItemUnit::get();
        $catitem= ItemCategor::get();
        $item = Itemlist::join('inventorys','inventorys.item_lis','=','itemlists.id')
        ->get(['itemlists.id','itemlists.name_il']);
        return view('admin.borrowedItem.borrowedItems.create',compact('item',$item))
                ->with('user',$users)
                ->with('unit',$unit)
                ->with('catitem',$catitem)
                ->with('store', $stores);
    }

    /**
     * Store a newly created BorrowedItem in storage.
     *
     * @param CreateBorrowedItemRequest $request
     *
     * @return Response
     */
    public function store(CreateBorrowedItemRequest $request)
    {   
        $input = $request->all();
        $item_b = $request->input('quantity_b');
        $item_id = $request->input('item_b'); 
        $item_type = $request->input('item_bc'); 
        $room = $request->input('room_b');
        $name_b = $request->input('name_b');
        $item_s = $request->input('item_s');

        $inventory = new Inventory();
        $tras = new Transaction();
        $items = Inventory::select('*')
        ->where('inventorys.item_lis',$item_id)
        ->first();
        

            if($items){
                $item_tt = collect($items->item_btot)->first();
                $item_t = $item_tt + $item_b;
                $borrowedItemRepository = $this->borrowedItemRepository->create($input);
                Inventory::where('inventorys.item_lis',$item_id)
                ->update(array( 'item_btot' => $item_t)); 
                $tras->action = 'requested';
                $tras->r_name = $name_b;
                $tras->item_name = $item_id;
                $tras->item_type = $item_type;
                $tras->item_quant = $item_b;
                $tras->room = $room;
                $tras->item_s = $item_s;
                $tras->save();
            Flash::success('BorrowedItem saved successfully.');

        return redirect(route('admin.borrowedItem.borrowedItems.index')); 
        }
       


        
        
    }

    /**
     * Display the specified BorrowedItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
       // $borrowedItem = $this->borrowedItemRepository->findWithoutFail($id);
        $borrowedItem = BorrowedItem::where('borroweditems.id', $id )
        ->join('users', 'users.id', '=' , 'borroweditems.name_b' )
        ->join('itemlists','itemlists.id', '=' , 'borroweditems.item_b')
        ->get(['borroweditems.id','users.email'
        ,'itemlists.name_il','borroweditems.room_b'
        ,'borroweditems.created_at','borroweditems.quantity_b']);

        if (empty($borrowedItem)) {
            Flash::error('BorrowedItem not found');

            return redirect(route('borrowedItems.index'));
        }

        return view('admin.borrowedItem.borrowedItems.show',compact('borrowedItem', $borrowedItem));//->with('borrowedItem', $borrowedItem);
    }

    /**
     * Show the form for editing the specified BorrowedItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $borrowedItem = $this->borrowedItemRepository->findWithoutFail($id);

        if (empty($borrowedItem)) {
            Flash::error('BorrowedItem not found');

            return redirect(route('borrowedItems.index'));
        }

        return view('admin.borrowedItem.borrowedItems.edit')->with('borrowedItem', $borrowedItem);
    }

    /**
     * Update the specified BorrowedItem in storage.
     *
     * @param  int              $id
     * @param UpdateBorrowedItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBorrowedItemRequest $request)
    {
        $borrowedItem = $this->borrowedItemRepository->findWithoutFail($id);

        

        if (empty($borrowedItem)) {
            Flash::error('BorrowedItem not found');

            return redirect(route('borrowedItems.index'));
        }

        $borrowedItem = $this->borrowedItemRepository->update($request->all(), $id);

        Flash::success('BorrowedItem updated successfully.');

        return redirect(route('admin.borrowedItem.borrowedItems.index'));
    }

    /**
     * Remove the specified BorrowedItem from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.borrowedItem.borrowedItems.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = BorrowedItem::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.borrowedItem.borrowedItems.index'))->with('success', Lang::get('message.success.delete'));

       }

}
