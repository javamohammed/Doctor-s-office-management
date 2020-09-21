<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'sex', 'address', 'phone', 'email', 'birthday'
    ];


    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }

}
