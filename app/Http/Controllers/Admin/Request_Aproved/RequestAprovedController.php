<?php

namespace App\Http\Controllers\Admin\Request_Aproved;

use App\Http\Requests;
use App\Http\Requests\Request_Aproved\CreateRequestAprovedRequest;
use App\Http\Requests\Request_Aproved\UpdateRequestAprovedRequest;
use App\Repositories\Request_Aproved\RequestAprovedRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Request_Aproved\RequestAproved;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Borrowed_Item\BorrowedItem;

class RequestAprovedController extends InfyOmBaseController
{
    /** @var  RequestAprovedRepository */
    private $requestAprovedRepository;

    public function __construct(RequestAprovedRepository $requestAprovedRepo)
    {
        $this->requestAprovedRepository = $requestAprovedRepo;
    }

    /**
     * Display a listing of the RequestAproved.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        //$this->requestAprovedRepository->pushCriteria(new RequestCriteria($request));
        //$requestAproveds = $this->requestAprovedRepository->all();
        $requestAproveds = BorrowedItem::join('itemlists','itemlists.id','=','borroweditems.item_b')
                                        ->join('users','users.id','=','borroweditems.name_b')
                                        ->get(['borroweditems.id',
                                        'itemlists.name_il','users.first_name','users.last_name']);

        return view('admin.requestAproved.requestAproveds.index',compact('requestAproveds'));
            
    }

    /**
     * Show the form for creating a new RequestAproved.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.requestAproved.requestAproveds.create');
    }

    /**
     * Store a newly created RequestAproved in storage.
     *
     * @param CreateRequestAprovedRequest $request
     *
     * @return Response
     */
    public function store(CreateRequestAprovedRequest $request)
    {
        $input = $request->all();

        $requestAproved = $this->requestAprovedRepository->create($input);

        Flash::success('RequestAproved saved successfully.');

        return redirect(route('admin.requestAproved.requestAproveds.index'));
    }

    /**
     * Display the specified RequestAproved.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $requestAproved = $this->requestAprovedRepository->findWithoutFail($id);

        if (empty($requestAproved)) {
            Flash::error('RequestAproved not found');

            return redirect(route('requestAproveds.index'));
        }

        return view('admin.requestAproved.requestAproveds.show')->with('requestAproved', $requestAproved);
    }

    /**
     * Show the form for editing the specified RequestAproved.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $requestAproved = $this->requestAprovedRepository->findWithoutFail($id);

        if (empty($requestAproved)) {
            Flash::error('RequestAproved not found');

            return redirect(route('requestAproveds.index'));
        }

        return view('admin.requestAproved.requestAproveds.edit')->with('requestAproved', $requestAproved);
    }

    /**
     * Update the specified RequestAproved in storage.
     *
     * @param  int              $id
     * @param UpdateRequestAprovedRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequestAprovedRequest $request)
    {
        $requestAproved = $this->requestAprovedRepository->findWithoutFail($id);

        

        if (empty($requestAproved)) {
            Flash::error('RequestAproved not found');

            return redirect(route('requestAproveds.index'));
        }

        $requestAproved = $this->requestAprovedRepository->update($request->all(), $id);

        Flash::success('RequestAproved updated successfully.');

        return redirect(route('admin.requestAproved.requestAproveds.index'));
    }

    /**
     * Remove the specified RequestAproved from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.requestAproved.requestAproveds.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = RequestAproved::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.requestAproved.requestAproveds.index'))->with('success', Lang::get('message.success.delete'));

       }

}
