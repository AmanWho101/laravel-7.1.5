<?php

namespace App\Http\Requests\Department_Head;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Department_Head\DepartmentHead;

class CreateDepartmentHeadRequest extends FormRequest
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
        return DepartmentHead::$rules;
    }
}
