<?php

namespace App\Http\Requests\Sdf;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Sdf\D;

class CreateDRequest extends FormRequest
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
        return D::$rules;
    }
}
