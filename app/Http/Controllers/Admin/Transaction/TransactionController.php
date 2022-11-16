<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Http\Requests;
use App\Http\Requests\Transaction\CreateTransactionRequest;
use App\Http\Requests\Transaction\UpdateTransactionRequest;
use App\Repositories\Transaction\TransactionRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Models\Borrowed_Item\BorrowedItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Transaction\Transaction;
use Sentinel;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TransactionController extends InfyOmBaseController
{
    /** @var  TransactionRepository */
    private $transactionRepository;

    public function __construct(TransactionRepository $transactionRepo)
    {
        $this->transactionRepository = $transactionRepo;
    }

    /**
     * Display a listing of the Transaction.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $null = null;
        if(Sentinel::inRole('department'))
        {
            $transactions = BorrowedItem::join('users','users.id','=','borroweditems.name_b')
            ->where('borroweditems.w_approve','=',1)
            
            ->join('itemcategors','itemcategors.id','=','borroweditems.item_bc')
            ->join('itemlists','itemlists.id','=','borroweditems.item_b')
            ->join('stores','stores.id','=','borroweditems.item_s')
            ->get();
return view('admin.transaction.transactions.index',compact('transactions'));
        }elseif(Sentinel::inRole('headofstore')){
            // $transactions = Transaction::where('borroweditems','borroweditems.hos_approved','=',1)
            // ->join('users','users.id','=','transactions.r_name')
            // ->join('itemcategors','itemcategors.id','=','transactions.item_type')
            // ->join('itemlists','itemlists.id','=','transactions.item_name')
            // ->join('stores','stores.id','=','transactions.item_s')
            // ->get();
            $transactions = BorrowedItem::join('users','users.id','=','borroweditems.name_b')
            ->where('borroweditems.hos_approved','=',1)
            
            ->join('itemcategors','itemcategors.id','=','borroweditems.item_bc')
            ->join('itemlists','itemlists.id','=','borroweditems.item_b')
            ->join('stores','stores.id','=','borroweditems.item_s')
            ->get();
return view('admin.transaction.transactions.index',compact('transactions'));
            

        }elseif(Sentinel::inRole('fixed')){

            $transactions = BorrowedItem::join('users','users.id','=','borroweditems.name_b')
            ->where('borroweditems.f_approve','=',1)
            
            ->join('itemcategors','itemcategors.id','=','borroweditems.item_bc')
            ->join('itemlists','itemlists.id','=','borroweditems.item_b')
            ->join('stores','stores.id','=','borroweditems.item_s')
            ->get();
          
return view('admin.transaction.transactions.index',compact('transactions'));
        }elseif(Sentinel::inRole('consumable')){
            $transactions = BorrowedItem::join('users','users.id','=','borroweditems.name_b')
            ->where('borroweditems.c_approve','=',1)
            
            ->join('itemcategors','itemcategors.id','=','borroweditems.item_bc')
            ->join('itemlists','itemlists.id','=','borroweditems.item_b')
            ->join('stores','stores.id','=','borroweditems.item_s')
            ->get();

return view('admin.transaction.transactions.index',compact('transactions'));
            
        }elseif(Sentinel::inRole('storekeeper')){
            $transactions = BorrowedItem::join('users','users.id','=','borroweditems.name_b')
            ->where('borroweditems.d_approve','=',1)
            
            ->join('itemcategors','itemcategors.id','=','borroweditems.item_bc')
            ->join('itemlists','itemlists.id','=','borroweditems.item_b')
            ->join('stores','stores.id','=','borroweditems.item_s')
            ->get();

return view('admin.transaction.transactions.index',compact('transactions'));

        }elseif(Sentinel::inRole('datamanager')){

            $transactions = BorrowedItem::join('users','users.id','=','borroweditems.name_b')
            ->where('borroweditems.m_approve','=',1)
            
            ->join('itemcategors','itemcategors.id','=','borroweditems.item_bc')
            ->join('itemlists','itemlists.id','=','borroweditems.item_b')
            ->join('stores','stores.id','=','borroweditems.item_s')
            ->get();

return view('admin.transaction.transactions.index',compact('transactions'));

        }
        
    }

    /**
     * Show the form for creating a new Transaction.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.transaction.transactions.create');
    }

    /**
     * Store a newly created Transaction in storage.
     *
     * @param CreateTransactionRequest $request
     *
     * @return Response
     */
    public function store(CreateTransactionRequest $request)
    {
        $input = $request->all();

        $transaction = $this->transactionRepository->create($input);

        Flash::success('Transaction saved successfully.');

        return redirect(route('admin.transaction.transactions.index'));
    }

    /**
     * Display the specified Transaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transaction = $this->transactionRepository->findWithoutFail($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('admin.transaction.transactions.show')->with('transaction', $transaction);
    }

    /**
     * Show the form for editing the specified Transaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transaction = $this->transactionRepository->findWithoutFail($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('admin.transaction.transactions.edit')->with('transaction', $transaction);
    }

    /**
     * Update the specified Transaction in storage.
     *
     * @param  int              $id
     * @param UpdateTransactionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransactionRequest $request)
    {
        $transaction = $this->transactionRepository->findWithoutFail($id);

        

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $transaction = $this->transactionRepository->update($request->all(), $id);

        Flash::success('Transaction updated successfully.');

        return redirect(route('admin.transaction.transactions.index'));
    }

    /**
     * Remove the specified Transaction from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.transaction.transactions.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Transaction::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.transaction.transactions.index'))->with('success', Lang::get('message.success.delete'));

       }

}
