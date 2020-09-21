<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $fillable = [
        'date_appmnt', 'hour', 'validate', 'id_patient'
    ];

    public function patient()
    {
        return $this->hasOne('App\Patient', 'id', 'id_patient');

    }
}
