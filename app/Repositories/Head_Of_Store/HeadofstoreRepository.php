<?php

namespace App\Repositories\Head_Of_Store;

use App\Models\Head_Of_Store\HeadofStore;
use InfyOm\Generator\Common\BaseRepository;

class HeadofStoreRepository extends BaseRepository
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
        return HeadofStore::class;
    }
}
