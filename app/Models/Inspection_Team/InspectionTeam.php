<?php

namespace App\Models\Inspection_Team;

use Illuminate\Database\Eloquent\Model;



class InspectionTeam extends Model
{

    public $table = 'inspectionTeams';
    


    public $fillable = [
        'department',
        'item_n_r',
        'entry_no',
        'stok',
        'stor_no',
        'shelf_no',
        'reciver',
        'reciver_from',
        'item_d',
        'model',
        'serial',
        'r_from',
        'd_to',
        'quantity',
        'unit_p',
        'doner',
        'recipient',
        'aprove'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'department' => 'string',
        'item_n_r'  => 'string',
        'entry_no'  => 'string',
        'stok'  => 'string',
        'stor_no'   => 'string',
        'shelf_no'  => 'string',
        'reciver'   => 'int',
        'reciver_from'  => 'int',
        'item_d'    => 'int',
        'model' => 'string',
        'serial'    => 'string',
        'r_from'  => 'int',
        'd_to'    => 'int',
        'quantity'  => 'string',
        'unit_p'    => 'string',
        'doner' => 'string',
        'recipient' => 'int',
        'aprove' => 'int'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
