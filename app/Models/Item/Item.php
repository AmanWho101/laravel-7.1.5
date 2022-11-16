<?php

namespace App\Models\Item;

use Illuminate\Database\Eloquent\Model;



class Item extends Model
{

    public $table = 'Items';
    


    public $fillable = [
        'store_id',
        'item_list_id',
        'item_category_id',
        'quantity',
        'item_unit_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'store_id' => 'integer',
        'item_list_id' => 'integer',
        'item_category_id' => 'integer',
        'item_unit_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
