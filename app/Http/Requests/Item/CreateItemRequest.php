<?php

namespace App\Http\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Item\Item;

class CreateItemRequest extends FormRequest
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
        return Item::$rules;
    }
}
