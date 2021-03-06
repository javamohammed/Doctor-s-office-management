<?php

namespace App\Http\Requests\Validation;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PatientHaveAppointment;

class StoreSetMedicament extends FormRequest
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
            'description' => 'required',
            'medicaments' =>  'required',
        ];
    }

    public function messages()
{
    return [
        'description.required' => 'The description  is required',
        'medicaments.required' => 'Please select the medicaments'
    ];
}
}
