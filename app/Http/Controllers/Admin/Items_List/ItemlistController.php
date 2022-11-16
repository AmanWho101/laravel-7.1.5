<?php

namespace App\Http\Controllers\Admin\Items_List;

use App\Http\Requests;
use App\Http\Requests\Items_List\CreateItemlistRequest;
use App\Http\Requests\Items_List\UpdateItemlistRequest;
use App\Repositories\Items_List\ItemlistRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Items_List\Itemlist;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ItemlistController extends InfyOmBaseController
{
    /** @var  ItemlistRepository */
    private $itemlistRepository;

    public function __construct(ItemlistRepository $itemlistRepo)
    {
        $this->itemlistRepository = $itemlistRepo;
    }

    /**
     * Display a listing of the Itemlist.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->itemlistRepository->pushCriteria(new RequestCriteria($request));
        $itemlists = $this->itemlistRepository->all();
        return view('admin.itemsList.itemlists.index')
            ->with('itemlists', $itemlists);
    }

    /**
     * Show the form for creating a new Itemlist.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.itemsList.itemlists.create');
    }

    /**
     * Store a newly created Itemlist in storage.
     *
     * @param CreateItemlistRequest $request
     *
     * @return Response
     */
    public function store(CreateItemlistRequest $request)
    {
        $input = $request->all();

        $itemlist = $this->itemlistRepository->create($input);

        Flash::success('Itemlist saved successfully.');

        return redirect(route('admin.itemsList.itemlists.index'));
    }

    /**
     * Display the specified Itemlist.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $itemlist = $this->itemlistRepository->findWithoutFail($id);

        if (empty($itemlist)) {
            Flash::error('Itemlist not found');

            return redirect(route('itemlists.index'));
        }

        return view('admin.itemsList.itemlists.show')->with('itemlist', $itemlist);
    }

    /**
     * Show the form for editing the specified Itemlist.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $itemlist = $this->itemlistRepository->findWithoutFail($id);

        if (empty($itemlist)) {
            Flash::error('Itemlist not found');

            return redirect(route('itemlists.index'));
        }

        return view('admin.itemsList.itemlists.edit')->with('itemlist', $itemlist);
    }

    /**
     * Update the specified Itemlist in storage.
     *
     * @param  int              $id
     * @param UpdateItemlistRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItemlistRequest $request)
    {
        $itemlist = $this->itemlistRepository->findWithoutFail($id);

        

        if (empty($itemlist)) {
            Flash::error('Itemlist not found');

            return redirect(route('itemlists.index'));
        }

        $itemlist = $this->itemlistRepository->update($request->all(), $id);

        Flash::success('Itemlist updated successfully.');

        return redirect(route('admin.itemsList.itemlists.index'));
    }

    /**
     * Remove the specified Itemlist from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.itemsList.itemlists.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Itemlist::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.itemsList.itemlists.index'))->with('success', Lang::get('message.success.delete'));

       }

}
