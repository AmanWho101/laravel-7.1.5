<?php

namespace App\Repositories\Request_Aproved;

use App\Models\Request_Aproved\RequestAproved;
use InfyOm\Generator\Common\BaseRepository;

class RequestAprovedRepository extends BaseRepository
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
        return RequestAproved::class;
    }
}
