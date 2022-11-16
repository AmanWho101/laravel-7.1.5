<?php

namespace App\Repositories\Items_List;

use App\Models\Items_List\Itemlist;
use InfyOm\Generator\Common\BaseRepository;

class ItemlistRepository extends BaseRepository
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
        return Itemlist::class;
    }
}
