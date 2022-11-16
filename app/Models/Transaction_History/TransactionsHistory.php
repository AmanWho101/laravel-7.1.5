<?php

namespace App\Models\Transaction_History;

use Illuminate\Database\Eloquent\Model;



class TransactionsHistory extends Model
{

    public $table = 'TransactionsHistorys';
    


    public $fillable = [
        'action',
        't_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'action' => 'string',
        't_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
