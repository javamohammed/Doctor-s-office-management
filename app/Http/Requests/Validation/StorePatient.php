<?php

namespace App\Http\Requests\Validation;

use Illuminate\Foundation\Http\FormRequest;

class StorePatient extends FormRequest
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
            'firstname' =>  'required',
            'lastname' =>  'required',
            'email' => 'email',
            'address' =>  'required',
            'sex' =>  'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'birthday' => 'required'
        ];
    }

    public function messages()
{
    return [
        'firstname.required' => 'The first name is required',
        'lastname.required' => 'The last name is required',
        'address.required' => 'The Address is required',
        'sex.required' => 'Your sex is required',
        'email.email' => 'Please enter a valid email',
        'phone.required' => 'The phone is required',
        'phone.regex' => 'Please enter a valid number phone',
        'birthday.required' => 'The birthday is required',
    ];
}
}
