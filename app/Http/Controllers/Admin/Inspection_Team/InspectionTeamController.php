<?php

namespace App\Http\Controllers\Admin\Inspection_Team;

use App\Http\Requests;
use App\Http\Requests\Inspection_Team\CreateInspectionTeamRequest;
use App\Http\Requests\Inspection_Team\UpdateInspectionTeamRequest;
use App\Repositories\Inspection_Team\InspectionTeamRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Inspection_Team\InspectionTeam;
use App\Models\Items_List\Itemlist;
use App\Models\User;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class InspectionTeamController extends InfyOmBaseController
{
    /** @var  InspectionTeamRepository */
    private $inspectionTeamRepository;

    public function __construct(InspectionTeamRepository $inspectionTeamRepo)
    {
        $this->inspectionTeamRepository = $inspectionTeamRepo;
    }

    /**
     * Display a listing of the InspectionTeam.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->inspectionTeamRepository->pushCriteria(new RequestCriteria($request));
        $inspectionTeams = InspectionTeam::join('itemlists','itemlists.id','inspectionteams.item_d')
                             ->get(['inspectionteams.id','inspectionteams.department','itemlists.discription']);
        //$this->inspectionTeamRepository->all();
        return view('admin.inspectionTeam.inspectionTeams.index',compact('inspectionTeams', $inspectionTeams));
    }

    /**
     * Show the form for creating a new InspectionTeam.
     *
     * @return Response
     */
    public function create()
    {
        $user = User::get();
        $itemlist = Itemlist::get();
        return view('admin.inspectionTeam.inspectionTeams.create')
        ->with('user',$user)
        ->with('itemlist',$itemlist);
    }

    /**
     * Store a newly created InspectionTeam in storage.
     *
     * @param CreateInspectionTeamRequest $request
     *
     * @return Response
     */
    public function store(CreateInspectionTeamRequest $request)
    {
        $input = $request->all();

        $inspectionTeam = $this->inspectionTeamRepository->create($input);

        Flash::success('InspectionTeam saved successfully.');

        return redirect(route('admin.inspectionTeam.inspectionTeams.index'));
    }

    /**
     * Display the specified InspectionTeam.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inspectionTeam = $this->inspectionTeamRepository->findWithoutFail($id);

        if (empty($inspectionTeam)) {
            Flash::error('InspectionTeam not found');

            return redirect(route('inspectionTeams.index'));
        }

        return view('admin.inspectionTeam.inspectionTeams.show')->with('inspectionTeam', $inspectionTeam);
    }

    /**
     * Show the form for editing the specified InspectionTeam.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inspectionTeam = $this->inspectionTeamRepository->findWithoutFail($id);

        if (empty($inspectionTeam)) {
            Flash::error('InspectionTeam not found');

            return redirect(route('inspectionTeams.index'));
        }

        return view('admin.inspectionTeam.inspectionTeams.edit')->with('inspectionTeam', $inspectionTeam);
    }

    /**
     * Update the specified InspectionTeam in storage.
     *
     * @param  int              $id
     * @param UpdateInspectionTeamRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInspectionTeamRequest $request)
    {
        $inspectionTeam = $this->inspectionTeamRepository->findWithoutFail($id);

        

        if (empty($inspectionTeam)) {
            Flash::error('InspectionTeam not found');

            return redirect(route('inspectionTeams.index'));
        }

        $inspectionTeam = $this->inspectionTeamRepository->update($request->all(), $id);

        Flash::success('InspectionTeam updated successfully.');

        return redirect(route('admin.inspectionTeam.inspectionTeams.index'));
    }

    /**
     * Remove the specified InspectionTeam from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.inspectionTeam.inspectionTeams.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = InspectionTeam::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.inspectionTeam.inspectionTeams.index'))->with('success', Lang::get('message.success.delete'));

       }

}
