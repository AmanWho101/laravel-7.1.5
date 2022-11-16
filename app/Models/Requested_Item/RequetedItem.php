<?php

namespace App\Models\Requested_Item;

use Illuminate\Database\Eloquent\Model;



class RequetedItem extends Model
{

    public $table = 'requetedItems';
    


    public $fillable = [
        'item_b'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'item_b' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
