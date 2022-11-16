<?php

namespace App\Repositories\Returned_Item;

use App\Models\Returned_Item\ReturnedItem;
use InfyOm\Generator\Common\BaseRepository;

class ReturnedItemRepository extends BaseRepository
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
        return ReturnedItem::class;
    }
}
