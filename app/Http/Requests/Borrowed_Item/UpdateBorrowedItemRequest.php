<?php

namespace App\Http\Requests\Borrowed_Item;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Borrowed_Item\BorrowedItem;

class UpdateBorrowedItemRequest extends FormRequest
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
        return BorrowedItem::$rules;
    }
}
