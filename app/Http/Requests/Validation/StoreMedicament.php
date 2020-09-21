<?php

namespace App\Http\Requests\Validation;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicament extends FormRequest
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
        return [
            //
            'name' =>  'required',
            'type_sick' =>  'required'
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'The first name is required',
        'type_sick.required' => 'The last name is required',
    ];
}
}
