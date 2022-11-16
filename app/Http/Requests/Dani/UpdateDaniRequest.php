<?php

namespace App\Http\Requests\Dani;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Dani\Dani;

class UpdateDaniRequest extends FormRequest
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
        return Dani::$rules;
    }
}
