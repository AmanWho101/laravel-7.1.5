<?php

namespace App\Models\Items_List;

use Illuminate\Database\Eloquent\Model;



class Itemlist extends Model
{

    public $table = 'Itemlists';
    


    public $fillable = [
        'name_il',
        'discription'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name_il' => 'string',
        'discription' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_il' => 'required',
        'discription' => 'required'
    ];
}
