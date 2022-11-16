<?php

namespace App\Http\Controllers\Admin\Transaction_History;

use App\Http\Requests;
use App\Http\Requests\Transaction_History\CreateTransactionsHistoryRequest;
use App\Http\Requests\Transaction_History\UpdateTransactionsHistoryRequest;
use App\Repositories\Transaction_History\TransactionsHistoryRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Transaction_History\TransactionsHistory;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TransactionsHistoryController extends InfyOmBaseController
{
    /** @var  TransactionsHistoryRepository */
    private $transactionsHistoryRepository;

    public function __construct(TransactionsHistoryRepository $transactionsHistoryRepo)
    {
        $this->transactionsHistoryRepository = $transactionsHistoryRepo;
    }

    /**
     * Display a listing of the TransactionsHistory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->transactionsHistoryRepository->pushCriteria(new RequestCriteria($request));
        $transactionsHistories = $this->transactionsHistoryRepository->all();
        return view('admin.transactionHistory.transactionsHistories.index')
            ->with('transactionsHistories', $transactionsHistories);
    }

    /**
     * Show the form for creating a new TransactionsHistory.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.transactionHistory.transactionsHistories.create');
    }

    /**
     * Store a newly created TransactionsHistory in storage.
     *
     * @param CreateTransactionsHistoryRequest $request
     *
     * @return Response
     */
    public function store(CreateTransactionsHistoryRequest $request)
    {
        $input = $request->all();

        $transactionsHistory = $this->transactionsHistoryRepository->create($input);

        Flash::success('TransactionsHistory saved successfully.');

        return redirect(route('admin.transactionHistory.transactionsHistories.index'));
    }

    /**
     * Display the specified TransactionsHistory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transactionsHistory = $this->transactionsHistoryRepository->findWithoutFail($id);

        if (empty($transactionsHistory)) {
            Flash::error('TransactionsHistory not found');

            return redirect(route('transactionsHistories.index'));
        }

        return view('admin.transactionHistory.transactionsHistories.show')->with('transactionsHistory', $transactionsHistory);
    }

    /**
     * Show the form for editing the specified TransactionsHistory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transactionsHistory = $this->transactionsHistoryRepository->findWithoutFail($id);

        if (empty($transactionsHistory)) {
            Flash::error('TransactionsHistory not found');

            return redirect(route('transactionsHistories.index'));
        }

        return view('admin.transactionHistory.transactionsHistories.edit')->with('transactionsHistory', $transactionsHistory);
    }

    /**
     * Update the specified TransactionsHistory in storage.
     *
     * @param  int              $id
     * @param UpdateTransactionsHistoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransactionsHistoryRequest $request)
    {
        $transactionsHistory = $this->transactionsHistoryRepository->findWithoutFail($id);

        

        if (empty($transactionsHistory)) {
            Flash::error('TransactionsHistory not found');

            return redirect(route('transactionsHistories.index'));
        }

        $transactionsHistory = $this->transactionsHistoryRepository->update($request->all(), $id);

        Flash::success('TransactionsHistory updated successfully.');

        return redirect(route('admin.transactionHistory.transactionsHistories.index'));
    }

    /**
     * Remove the specified TransactionsHistory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.transactionHistory.transactionsHistories.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = TransactionsHistory::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.transactionHistory.transactionsHistories.index'))->with('success', Lang::get('message.success.delete'));

       }

}
