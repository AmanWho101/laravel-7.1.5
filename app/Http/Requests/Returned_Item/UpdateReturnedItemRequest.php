<?php

namespace App\Http\Requests\Returned_Item;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Returned_Item\ReturnedItem;

class UpdateReturnedItemRequest extends FormRequest
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
        return ReturnedItem::$rules;
    }
}
