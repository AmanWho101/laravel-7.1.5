<?php

namespace App\Models\Item_Units;

use Illuminate\Database\Eloquent\Model;



class ItemUnit extends Model
{

    public $table = 'itemUnits';
    


    public $fillable = [
        'name_iu',
        'discription'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name_iu' => 'string',
        'discription' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_iu' => 'required',
        'discription' => 'required'
    ];
}
