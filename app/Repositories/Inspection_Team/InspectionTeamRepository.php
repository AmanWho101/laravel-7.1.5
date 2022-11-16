<?php

namespace App\Repositories\Inspection_Team;

use App\Models\Inspection_Team\InspectionTeam;
use InfyOm\Generator\Common\BaseRepository;

class InspectionTeamRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return InspectionTeam::class;
    }
}
