<?php

namespace App\Http\Requests\Requested_Item;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Requested_Item\RequetedItem;

class UpdateRequetedItemRequest extends FormRequest
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
        return RequetedItem::$rules;
    }
}
