<?php

namespace App\Models\Returned_Item;

use Illuminate\Database\Eloquent\Model;



class ReturnedItem extends Model
{

    public $table = 'ReturnedItems';
    


    public $fillable = [
        'user_id',
        'item_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'item_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'item_id' => 'required'
    ];
}
