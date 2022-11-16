<?php

namespace App\Repositories\Item_Units;

use App\Models\Item_Units\ItemUnit;
use InfyOm\Generator\Common\BaseRepository;

class ItemUnitRepository extends BaseRepository
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
        return ItemUnit::class;
    }
}
