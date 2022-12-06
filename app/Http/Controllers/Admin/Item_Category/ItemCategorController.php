<?php

namespace App\Http\Controllers\Admin\Item_Category;

use App\Http\Requests;
use App\Http\Requests\Item_Category\CreateItemCategorRequest;
use App\Http\Requests\Item_Category\UpdateItemCategorRequest;
use App\Repositories\Item_Category\ItemCategorRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Item_Category\ItemCategor;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ItemCategorController extends InfyOmBaseController
{
    /** @var  ItemCategorRepository */
    private $itemCategorRepository;

    public function __construct(ItemCategorRepository $itemCategorRepo)
    {
        $this->itemCategorRepository = $itemCategorRepo;
    }

    /**
     * Display a listing of the ItemCategor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->itemCategorRepository->pushCriteria(new RequestCriteria($request));
        $itemCategors = $this->itemCategorRepository->all();
        return view('admin.itemCategory.itemCategors.index')
            ->with('itemCategors', $itemCategors);
    }

    /**
     * Show the form for creating a new ItemCategor.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.itemCategory.itemCategors.create');
    }

    /**
     * Store a newly created ItemCategor in storage.
     *
     * @param CreateItemCategorRequest $request
     *
     * @return Response
     */
    public function store(CreateItemCategorRequest $request)
    {
        //$input = $request->all();
        $name_ic = $request->name_ic;
        //$itemCategor = $this->itemCategorRepository->create($input);

        foreach ($name_ic as $key => $value) {
            # code...
            ItemCategor::create([
                'name_ic' => $name_ic[$key],
                'discription' => $request->discription[$key]
            ]);
        }


        Flash::success('ItemCategor saved successfully.');

        return redirect(route('admin.itemCategory.itemCategors.index'));
    }

    /**
     * Display the specified ItemCategor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $itemCategor = $this->itemCategorRepository->findWithoutFail($id);

        if (empty($itemCategor)) {
            Flash::error('ItemCategor not found');

            return redirect(route('itemCategors.index'));
        }

        return view('admin.itemCategory.itemCategors.show')->with('itemCategor', $itemCategor);
    }

    /**
     * Show the form for editing the specified ItemCategor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $itemCategor = $this->itemCategorRepository->findWithoutFail($id);

        if (empty($itemCategor)) {
            Flash::error('ItemCategor not found');

            return redirect(route('itemCategors.index'));
        }

        return view('admin.itemCategory.itemCategors.edit')->with('itemCategor', $itemCategor);
    }

    /**
     * Update the specified ItemCategor in storage.
     *
     * @param  int              $id
     * @param UpdateItemCategorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItemCategorRequest $request)
    {
        $itemCategor = $this->itemCategorRepository->findWithoutFail($id);

        

        if (empty($itemCategor)) {
            Flash::error('ItemCategor not found');

            return redirect(route('itemCategors.index'));
        }

        $itemCategor = $this->itemCategorRepository->update($request->all(), $id);

        Flash::success('ItemCategor updated successfully.');

        return redirect(route('admin.itemCategory.itemCategors.index'));
    }

    /**
     * Remove the specified ItemCategor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.itemCategory.itemCategors.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = ItemCategor::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.itemCategory.itemCategors.index'))->with('success', Lang::get('message.success.delete'));

       }

}
