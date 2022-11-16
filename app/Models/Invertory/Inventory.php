<?php

namespace App\Models\Invertory;

use Illuminate\Database\Eloquent\Model;



class Inventory extends Model
{

    public $table = 'Inventorys';
    


    public $fillable = [
        'item_tot',
        'item_btot',
        'item_lef',
        'item_lis'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'item_tot' => 'integer',
        'item_btot' => 'integer',
        'item_lef' => 'integer',
        'item_lis' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
