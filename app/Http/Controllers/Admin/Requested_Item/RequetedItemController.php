<?php

namespace App\Http\Controllers\Admin\Requested_Item;

use App\Http\Requests;
use App\Http\Requests\Requested_Item\CreateRequetedItemRequest;
use App\Http\Requests\Requested_Item\UpdateRequetedItemRequest;
use App\Repositories\Requested_Item\RequetedItemRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Requested_Item\RequetedItem;
use App\Repositories\Borrowed_Item\BorrowedItemRepository;
use App\Models\Borrowed_Item\BorrowedItem;
use App\Models\User;
use App\Models\Items_List\Itemlist;
use App\Models\Transaction\Transaction;
use Cartalyst\Sentinel\Sentinel as SentinelSentinel;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Sentinel;

class RequetedItemController extends InfyOmBaseController
{
    /** @var  RequetedItemRepository */
    private $requetedItemRepository;
    private $BorrowedItemRepository;

    public function __construct(RequetedItemRepository $requetedItemRepo,BorrowedItemRepository $bitemrepo)
    {
        $this->requetedItemRepository = $requetedItemRepo;
        $this->BorrowedItemRepository = $bitemrepo;
    }

    /**
     * Display a listing of the RequetedItem.
     *
     * @param Request $request
     * @return Response
     */
    
    public function index(Request $request)
    {
        $null = null;
        if(Sentinel::inRole('department'))
        {

            $requetedItems = BorrowedItem::join('itemlists','itemlists.id','=',
            'borroweditems.item_b')
            ->join('users','users.id','=','borroweditems.name_b')
            ->where('borroweditems.w_approve','=',$null)
          
            ->get(['borroweditems.id','borroweditems.room_b','borroweditems.created_at',
            'itemlists.name_il','users.first_name','users.last_name']);

return view('admin.requestedItem.requetedItems.index',compact('requetedItems'));

        }elseif(Sentinel::inRole('headofstore')){

            $requetedItems = BorrowedItem::join('itemlists','itemlists.id','=',
            'borroweditems.item_b')
            ->join('users','users.id','=','borroweditems.name_b')
            ->where('borroweditems.item_s','!=',1)
            ->where('borroweditems.w_approve','=',1)
            ->where('borroweditems.hos_approved','=',$null)
            ->get(['borroweditems.id','borroweditems.w_approve',
            'borroweditems.room_b','borroweditems.created_at',
            'itemlists.name_il','users.first_name','users.last_name']);

return view('admin.requestedItem.requetedItems.index',compact('requetedItems'));

        }elseif(Sentinel::inRole('fixed')){

            $requetedItems = BorrowedItem::join('itemlists','itemlists.id','=',
            'borroweditems.item_b')
            ->join('users','users.id','=','borroweditems.name_b')
            ->where('borroweditems.item_s','=',1)
            ->where('borroweditems.item_bc','=',1)
            ->where('borroweditems.hos_approved','=',1)
            ->orWhere('borroweditems.d_approve','=',1)
            ->where('borroweditems.f_approve','=',$null)
            ->get(['borroweditems.id','borroweditems.w_approve',
            'borroweditems.room_b','borroweditems.created_at',
            'itemlists.name_il','users.first_name','users.last_name']);
return view('admin.requestedItem.requetedItems.index',compact('requetedItems'));

        }elseif(Sentinel::inRole('consumable')){

            $requetedItems = BorrowedItem::join('itemlists','itemlists.id','='
            ,'borroweditems.item_b')
            ->join('users','users.id','=','borroweditems.name_b')
            ->where('borroweditems.item_s','=',1)
            ->where('borroweditems.item_bc','=',2)
            ->where('borroweditems.hos_approved','=',1)
            ->orWhere('borroweditems.d_approve','=',1)
            ->where('borroweditems.c_approve','=',$null)
            ->get(['borroweditems.id','borroweditems.w_approve',
            'borroweditems.room_b','borroweditems.created_at',
            'itemlists.name_il','users.first_name','users.last_name']);

return view('admin.requestedItem.requetedItems.index',compact('requetedItems'));

        }elseif(Sentinel::inRole('storekeeper')){

            $requetedItems = BorrowedItem::join('itemlists','itemlists.id','=','borroweditems.item_b')
            ->join('users','users.id','=','borroweditems.name_b')
            ->where('borroweditems.item_s','=',1)
            ->where('borroweditems.d_approve','=',$null)
            ->where('borroweditems.w_approve','=',1)
            ->where('borroweditems.hos_approved','=',$null)
            ->where('borroweditems.f_approve','=',$null)
            ->where('borroweditems.c_approve','=',$null)
            ->get(['borroweditems.id',
            'borroweditems.room_b','borroweditems.created_at',
            'itemlists.name_il','users.first_name','users.last_name']);

return view('admin.requestedItem.requetedItems.index',compact('requetedItems'));

        }elseif(Sentinel::inRole('datamanager')){

            $requetedItems = BorrowedItem::join('itemlists','itemlists.id','=','borroweditems.item_b')
            ->join('users','users.id','=','borroweditems.name_b')
            ->where('borroweditems.m_approve',$null)
            ->where('borroweditems.f_approve',1)
            ->orwhere('borroweditems.c_approve',1)
            ->get(['borroweditems.id',
            'borroweditems.room_b','borroweditems.created_at',
            'itemlists.name_il','users.first_name','users.last_name']);

return view('admin.requestedItem.requetedItems.index',compact('requetedItems'));

        }
  
    }

    /**
     * Show the form for creating a new RequetedItem.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.requestedItem.requetedItems.create');
    }

    
    /**
     * Store a newly created RequetedItem in storage.
     *
     * @param CreateRequetedItemRequest $request
     *
     * @return Response
     */
    public function store(CreateRequetedItemRequest $request)
    {
       
        $id = $request->input('approve');
      
       if(Sentinel::inRole('department')){
        BorrowedItem::where('borroweditems.id','=',$id)
        ->update(array('w_approve'=>1));
         Flash::success('RequetedItem saved successfully.');
         return redirect(route('admin.requestedItem.requetedItems.storeprint',$id));

       }elseif(Sentinel::inRole('headofstore')){
        BorrowedItem::where('borroweditems.id','=',$id)
        ->update(array('hos_approved'=>1));
        // Transaction::where('transactions.bor_id','=',$id)
        // ->update(array('hos_approved'=>1));
         Flash::success('RequetedItem saved successfully.');
         return redirect(route('admin.requestedItem.requetedItems.storeprint',$id));

       }elseif(Sentinel::inRole('storekeeper')){

        BorrowedItem::where('borroweditems.id','=',$id)
        ->update(array('d_approve'=>1));
         Flash::success('RequetedItem saved successfully.');
         return redirect(route('admin.requestedItem.requetedItems.storeprint',$id));


       }elseif(Sentinel::inRole('fixed')){
        BorrowedItem::where('borroweditems.id','=',$id)
        ->update(array('f_approve'=>1));
         Flash::success('RequetedItem saved successfully.');
         return redirect(route('admin.requestedItem.requetedItems.storeprint',$id));
       }
       elseif(Sentinel::inRole('consumable')){
        BorrowedItem::where('borroweditems.id','=',$id)
        ->update(array('c_approve'=>1));
        Flash::success('RequetedItem saved successfully.');
        return redirect(route('admin.requestedItem.requetedItems.storeprint',$id));
      }elseif(Sentinel::inRole('datamanager')){
        BorrowedItem::where('borroweditems.id','=',$id)
        ->update(array('m_approve'=>1));
        Flash::success('RequetedItem saved successfully.');
        return redirect(route('admin.requestedItem.requetedItems.index',$id));
      }
       
    }

    /**
     * Display the specified RequetedItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function storeprint($id){
        
        if(Sentinel::inRole('department')){
            $DateItem = $this->BorrowedItemRepository->findWithoutFail($id);
            $date=date("Y-m-d H:i",strtotime($DateItem->created_at));
            
            $printItem = BorrowedItem::where('borroweditems.id','=', $id)
             ->join('itemlists','itemlists.id','=','borroweditems.item_b')
             ->join('users','users.id','=','borroweditems.name_b')
             ->join('itemunits','itemunits.id','=','borroweditems.item_u')
             ->get(['itemunits.name_iu','borroweditems.w_approve','borroweditems.id',
              'borroweditems.quantity_b','borroweditems.room_b','borroweditems.created_at',
              'itemlists.name_il','users.first_name','users.last_name']);//
            if (empty($printItem)) {
                Flash::error('RequetedItem not found');
    
                return redirect(route('requetedItems.index'));
            }
            
            return view('admin.requestedItem.requetedItems.store&supplyunit',
            compact('printItem'));//->with('date',$date);
        }elseif(Sentinel::inRole('headofstore')){
            $users = User::get();
            $DateItem = $this->BorrowedItemRepository->findWithoutFail($id);
            $date=date("Y-m-d H:i",strtotime($DateItem->created_at));
            
            $printItem =BorrowedItem::where('borroweditems.id','=', $id)
            ->join('itemlists','itemlists.id','=','borroweditems.item_b')
            ->join('users','users.id','=','borroweditems.name_b')
            ->join('itemunits','itemunits.id','=','borroweditems.item_u')
            ->get(['itemunits.name_iu','borroweditems.w_approve','borroweditems.id',
            'borroweditems.quantity_b','borroweditems.room_b','borroweditems.created_at',
            'itemlists.name_il','users.first_name','users.last_name']);
            if (empty($printItem)) {
                Flash::error('RequetedItem not found');
    
                return redirect(route('requetedItems.index'));
            }
            
            return view('admin.requestedItem.requetedItems.fixedatf',
            compact('printItem'))
            ->with('user',$users);

        }elseif(Sentinel::inRole('storekeeper')){
            $DateItem = $this->BorrowedItemRepository->findWithoutFail($id);
            $date=date("Y-m-d H:i",strtotime($DateItem->created_at));
            
            $printItem = BorrowedItem::where('borroweditems.id','=', $id)
            ->join('itemlists','itemlists.id','=','borroweditems.item_b')
            ->join('users','users.id','=','borroweditems.name_b')
            ->join('itemunits','itemunits.id','=','borroweditems.item_u')
            ->get(['itemunits.name_iu','borroweditems.w_approve',
            'borroweditems.id','borroweditems.quantity_b',
            'borroweditems.room_b','borroweditems.created_at',
            'itemlists.name_il','users.first_name','users.last_name']);

            if (empty($printItem)) {
                Flash::error('RequetedItem not found');
     
                return redirect(route('requetedItems.index'));
            }
            
            return view('admin.requestedItem.requetedItems.store&supplyunit',
            compact('printItem'));
        }elseif(Sentinel::inRole('fixed')){
            $DateItem = $this->BorrowedItemRepository->findWithoutFail($id);
            $date=date("Y-m-d H:i",strtotime($DateItem->created_at));
            
            $printItem = BorrowedItem::where('borroweditems.id','=', $id)
            ->join('itemlists','itemlists.id','=','borroweditems.item_b')
            ->join('users','users.id','=','borroweditems.name_b')
            ->join('itemunits','itemunits.id','=','borroweditems.item_u')
            ->get(['itemunits.name_iu','borroweditems.w_approve',
            'borroweditems.id','borroweditems.quantity_b','borroweditems.room_b',
            'borroweditems.created_at',
            'itemlists.name_il','users.first_name','users.last_name']);
            if (empty($printItem)) {
                Flash::error('RequetedItem not found');
     
                return redirect(route('requetedItems.index'));
            }
            
            return view('admin.requestedItem.requetedItems.fixedpublic',compact('printItem'));
        }elseif(Sentinel::inRole('consumable')){
            $DateItem = $this->BorrowedItemRepository->findWithoutFail($id);
            $date=date("Y-m-d H:i",strtotime($DateItem->created_at));
            
            $printItem = BorrowedItem::where('borroweditems.id','=', $id)
            ->join('itemlists','itemlists.id','=','borroweditems.item_b')
            ->join('users','users.id','=','borroweditems.name_b')
            ->join('itemunits','itemunits.id','=','borroweditems.item_u')
            ->get(['itemunits.name_iu','borroweditems.w_approve',
            'borroweditems.id','borroweditems.quantity_b',
            'borroweditems.room_b','borroweditems.created_at',
            'itemlists.name_il','users.first_name','users.last_name']);
            if (empty($printItem)) {
                Flash::error('RequetedItem not found');
     
                return redirect(route('requetedItems.index'));
            }
            
            return view('admin.requestedItem.requetedItems.gatepass',compact('printItem'));
        }

        
    }

    public function show($id)
    {
       
        $requetedItem = BorrowedItem::where('borroweditems.id','=',$id)
        ->join('itemlists','itemlists.id','=','borroweditems.item_b')
        ->join('users','users.id','=','borroweditems.name_b')
        ->join('itemunits','itemunits.id','=','borroweditems.item_u')
        ->get(['itemunits.name_iu','borroweditems.id','borroweditems.quantity_b',
        'borroweditems.room_b','.borroweditems.created_at',
        'itemlists.name_il','users.first_name','users.last_name']);
        
        if (empty($requetedItem)) {
            Flash::error('RequetedItem not found');

            return redirect(route('requetedItems.index'));
        }

        return view('admin.requestedItem.requetedItems.show',compact('requetedItem'));//->with('requetedItem', $requetedItem);
    }

    /**
     * Show the form for editing the specified RequetedItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $requetedItem = $this->requetedItemRepository->findWithoutFail($id);

        if (empty($requetedItem)) {
            Flash::error('RequetedItem not found');

            return redirect(route('requetedItems.index'));
        }

        return view('admin.requestedItem.requetedItems.edit')->with('requetedItem', $requetedItem);
    }

    /**
     * Update the specified RequetedItem in storage.
     *
     * @param  int              $id
     * @param UpdateRequetedItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequetedItemRequest $request)
    {
        $requetedItem = $this->requetedItemRepository->findWithoutFail($id);

        

        if (empty($requetedItem)) {
            Flash::error('RequetedItem not found');

            return redirect(route('requetedItems.index'));
        }

        $requetedItem = $this->requetedItemRepository->update($request->all(), $id);

        Flash::success('RequetedItem updated successfully.');

        return redirect(route('admin.requestedItem.requetedItems.index'));
    }

    /**
     * Remove the specified RequetedItem from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.requestedItem.requetedItems.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = RequetedItem::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.requestedItem.requetedItems.index'))->with('success', Lang::get('message.success.delete'));

       }

}
