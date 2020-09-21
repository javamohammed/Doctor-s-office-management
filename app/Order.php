<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'date_order', 'id_consultation'
    ];

    public function consultation()
    {
        return $this->hasOne('App\Consultation', 'id', 'id_consultation');

    }


    /*
    public function medicaments()
    {
        return $this->has('App\Medicament_selected', 'id', 'id_consultation');

    }*/
    public function medicaments()
    {
        return $this->hasMany('App\Medicament_selected', 'id_order');
    }
}
