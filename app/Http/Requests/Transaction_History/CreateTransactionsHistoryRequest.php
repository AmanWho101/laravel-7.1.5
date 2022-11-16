<?php

namespace App\Http\Requests\Transaction_History;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Transaction_History\TransactionsHistory;

class CreateTransactionsHistoryRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return TransactionsHistory::$rules;
    }
}