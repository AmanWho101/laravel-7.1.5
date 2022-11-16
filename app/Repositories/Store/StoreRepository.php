<?php

namespace App\Repositories\Store;

use App\Models\Store\Store;
use InfyOm\Generator\Common\BaseRepository;

class StoreRepository extends BaseRepository
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
        return Store::class;
    }
}
