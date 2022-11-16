<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Transaction extends Model
{
    use SoftDeletes;

    public $table = 'transactions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'action',
        'r_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'action' => 'string',
        'r_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'action' => 'required',
        'r_name' => 'required'
    ];
}
