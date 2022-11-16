<?php

namespace App\Models\Borrowed_Item;

use Illuminate\Database\Eloquent\Model;



class BorrowedItem extends Model
{

    public $table = 'BorrowedItems';
    


    public $fillable = [
        'name_b',
        'item_b',
        'item_u',
        'w_approve',
        'quantity_b',
        'room_b',
        'item_bc',
        'item_s'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name_b' => 'integer',
        'item_b' => 'integer',
        'w_approve' => 'integer',
        'quantity_b' => 'integer',
        'room_b' => 'string',
        'item_u'=>'string',
        'item_bc'=>'string',
        'item_s'=>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_b' => 'required',
        'item_b' => 'required',
        'quantity_b' => 'required',
        'room_b' => 'required',
        'item_s' => 'required'
    ];
}
