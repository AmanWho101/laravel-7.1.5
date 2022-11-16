<?php

namespace App\Models\Store;

use Illuminate\Database\Eloquent\Model;



class Store extends Model
{

    public $table = 'Stores';
    


    public $fillable = [
        'type',
        'discription'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'type' => 'string',
        'discription' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'required',
        'discription' => 'required'
    ];
}
