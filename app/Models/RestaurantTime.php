<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantTime extends Model
{
    //
    protected $fillable = [
        'time','opening_hours','closing_hours','deleted',
    ];

    public function restaurantReservation(){

        return $this->hasMany('App\Models\RestaurantReservation');

    }
     
}
