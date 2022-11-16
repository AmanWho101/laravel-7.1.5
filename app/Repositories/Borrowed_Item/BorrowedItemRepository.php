<?php

namespace App\Repositories\Borrowed_Item;

use App\Models\Borrowed_Item\BorrowedItem;
use InfyOm\Generator\Common\BaseRepository;

class BorrowedItemRepository extends BaseRepository
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
        return BorrowedItem::class;
    }
}
