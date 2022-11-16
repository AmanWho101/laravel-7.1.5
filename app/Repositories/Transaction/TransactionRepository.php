<?php

namespace App\Repositories\Transaction;

use App\Models\Transaction\Transaction;
use InfyOm\Generator\Common\BaseRepository;

class TransactionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Transaction::class;
    }
}
