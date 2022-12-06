<?php

namespace App\Http\Controllers\Admin\Item_Units;

use App\Http\Requests;
use App\Http\Requests\Item_Units\CreateItemUnitRequest;
use App\Http\Requests\Item_Units\UpdateItemUnitRequest;
use App\Repositories\Item_Units\ItemUnitRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Item_Units\ItemUnit;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ItemUnitController extends InfyOmBaseController
{
    /** @var  ItemUnitRepository */
    private $itemUnitRepository;

    public function __construct(ItemUnitRepository $itemUnitRepo)
    {
        $this->itemUnitRepository = $itemUnitRepo;
    }

    /**
     * Display a listing of the ItemUnit.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->itemUnitRepository->pushCriteria(new RequestCriteria($request));
        $itemUnits = $this->itemUnitRepository->all();
        return view('admin.itemUnits.itemUnits.index')
            ->with('itemUnits', $itemUnits);
    }

    /**
     * Show the form for creating a new ItemUnit.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.itemUnits.itemUnits.create');
    }

    /**
     * Store a newly created ItemUnit in storage.
     *
     * @param CreateItemUnitRequest $request
     *
     * @return Response
     */
    public function store(CreateItemUnitRequest $request)
    {
        $input = $request->all();
        $name_iu = $request->name_iu;
       // $itemUnit = $this->itemUnitRepository->create($input);

        foreach ($name_iu as $key => $value) {
            # code...
            ItemUnit::create([
                'name_iu' => $name_iu[$key],
                'discription' => $request->discription[$key]
            ]);
        }

        Flash::success('ItemUnit saved successfully.');

        return redirect(route('admin.itemUnits.itemUnits.index'));
    }

    /**
     * Display the specified ItemUnit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $itemUnit = $this->itemUnitRepository->findWithoutFail($id);

        if (empty($itemUnit)) {
            Flash::error('ItemUnit not found');

            return redirect(route('itemUnits.index'));
        }

        return view('admin.itemUnits.itemUnits.show')->with('itemUnit', $itemUnit);
    }

    /**
     * Show the form for editing the specified ItemUnit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $itemUnit = $this->itemUnitRepository->findWithoutFail($id);

        if (empty($itemUnit)) {
            Flash::error('ItemUnit not found');

            return redirect(route('itemUnits.index'));
        }

        return view('admin.itemUnits.itemUnits.edit')->with('itemUnit', $itemUnit);
    }

    /**
     * Update the specified ItemUnit in storage.
     *
     * @param  int              $id
     * @param UpdateItemUnitRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItemUnitRequest $request)
    {
        $itemUnit = $this->itemUnitRepository->findWithoutFail($id);

        

        if (empty($itemUnit)) {
            Flash::error('ItemUnit not found');

            return redirect(route('itemUnits.index'));
        }

        $itemUnit = $this->itemUnitRepository->update($request->all(), $id);

        Flash::success('ItemUnit updated successfully.');

        return redirect(route('admin.itemUnits.itemUnits.index'));
    }

    /**
     * Remove the specified ItemUnit from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.itemUnits.itemUnits.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = ItemUnit::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.itemUnits.itemUnits.index'))->with('success', Lang::get('message.success.delete'));

       }

}
