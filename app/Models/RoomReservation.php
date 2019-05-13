<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomReservation extends Model
{
    //
    protected $fillable = [
        'room_id','client_id','check_in','check_out','cancel','deleted',
    ];

    public function room(){

        return $this->belongsTo('App\Models\RoomType','room_id');

    }

    public function client(){

        return $this->belongsTo('App\Models\Client','client_id');

    }

    public function user(){

        return $this->belongsTo('App\User','client_id');

    }

    
}
