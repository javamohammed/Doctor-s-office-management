<?php

namespace App\Events;

use Illuminate\Database\Eloquent\Model;

class Event 
{
     public String $title ;
     public String $start ;
     public String $end ;
     
    function __construct($title, $start, $end) {
        
        $this->title = $title;
        $this->start = $start;
        $this->end = $end;
    }
}
