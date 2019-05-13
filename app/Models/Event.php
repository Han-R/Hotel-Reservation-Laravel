<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        'event_name','image','event_date','deleted',
    ];

   protected $dates=['event_date'];
     
}
