<?php

namespace App\Repositories\Department_Head;

use App\Models\Department_Head\DepartmentHead;
use InfyOm\Generator\Common\BaseRepository;

class DepartmentHeadRepository extends BaseRepository
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
        return DepartmentHead::class;
    }
}
