<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = [
        'room_type_id','description','reserved','deleted',
    ];

    public function roomType(){

        return $this->belongsTo('App\Models\RoomType','room_type_id');

    }
}
