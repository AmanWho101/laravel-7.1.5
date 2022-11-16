<?php

namespace App\Repositories\Transaction_History;

use App\Models\Transaction_History\TransactionsHistory;
use InfyOm\Generator\Common\BaseRepository;

class TransactionsHistoryRepository extends BaseRepository
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
        return TransactionsHistory::class;
    }
}
