<?php

namespace App\Repositories\Datamanagers;

use App\Models\Datamanagers\Datamanager;
use InfyOm\Generator\Common\BaseRepository;

class DatamanagerRepository extends BaseRepository
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
        return Datamanager::class;
    }
}
