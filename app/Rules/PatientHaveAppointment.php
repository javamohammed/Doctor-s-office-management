<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Appointment;

class PatientHaveAppointment implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $date_appmnt = \DateTime::createFromFormat('d/m/Y', \request()->input('date_appmnt'));
        $date_appmnt =  $date_appmnt->format('Y-d-m');

        $appointment = Appointment::Where('date_appmnt', $date_appmnt )->where('id_patient', $value)->get();
       // dd(\request()->input('date_appmnt'));
       return true ? count($appointment) == 0 : \count($appointment) == 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This patient already have an appointment.';
    }
}
