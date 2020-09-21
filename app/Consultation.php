<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    //
    protected $fillable = [
        'date_consultation', 'diagnostic', 'id_patient'
    ];

    public function patient()
    {
        return $this->hasOne('App\Patient', 'id', 'id_patient');

    }
}
