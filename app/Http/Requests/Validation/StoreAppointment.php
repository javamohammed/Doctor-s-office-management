<?php

namespace App\Http\Requests\Validation;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PatientHaveAppointment;

class StoreAppointment extends FormRequest
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
            'patient' => [ 'required', new PatientHaveAppointment() ],
            'hour' =>  'required',
            'date_appmnt' => 'required'
        ];
    }

    public function messages()
{
    return [
        'patient.required' => 'The patient name is required',
        'hour.required' => 'Please select the Hour',
        'date_appmnt.required' => 'The Date of appointment is required',
    ];
}
}
