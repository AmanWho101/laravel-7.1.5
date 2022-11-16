<?php

namespace App\Repositories\Invertory;

use App\Models\Invertory\Inventory;
use InfyOm\Generator\Common\BaseRepository;

class InventoryRepository extends BaseRepository
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
        return Inventory::class;
    }
}
