<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicament_selected extends Model
{
    //

    public function order()
    {
        return $this->hasOne('App\Order', 'id', 'id_order');

    }

    public function medicament()
    {
        return $this->hasOne('App\Medicament', 'id', 'id_medicament');

    }

}
