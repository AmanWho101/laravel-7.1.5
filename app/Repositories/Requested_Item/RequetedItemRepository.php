<?php

namespace App\Repositories\Requested_Item;

use App\Models\Requested_Item\RequetedItem;
use InfyOm\Generator\Common\BaseRepository;

class RequetedItemRepository extends BaseRepository
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
        return RequetedItem::class;
    }
}
