<?php

namespace App\Models\Item_Category;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class ItemCategor extends Model
{
    use SoftDeletes;

    public $table = 'itemCategors';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name_ic',
        'discription'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name_ic' => 'string',
        'discription' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_ic' => 'required',
        'discription' => 'required'
    ];
}
