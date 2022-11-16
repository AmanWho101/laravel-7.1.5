<?php

namespace App\Models\Request_Aproved;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class RequestAproved extends Model
{
    use SoftDeletes;

    public $table = 'requestAproveds';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'item_b_id',
        'aprov_user_id',
        'approved'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'item_b_id' => 'integer',
        'aprov_user_id' => 'integer',
        'approved' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
