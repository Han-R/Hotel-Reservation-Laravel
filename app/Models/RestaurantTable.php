<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantTable extends Model
{
    //
    protected $fillable = [
        'capacity','reserved','deleted',
    ];

    public function restaurantReservation(){

        return $this->hasMany('App\Models\RestaurantReservation');

    }
     
}
