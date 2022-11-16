<?php

namespace App\Repositories\Item_Category;

use App\Models\Item_Category\ItemCategor;
use InfyOm\Generator\Common\BaseRepository;

class ItemCategorRepository extends BaseRepository
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
        return ItemCategor::class;
    }
}
