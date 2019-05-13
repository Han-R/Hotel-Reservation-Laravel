<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantMenu extends Model
{
    //
    protected $fillable = [
        'product','price','image','deleted',
    ];

    public function restaurantReservation(){

        return $this->hasMany('App\Models\RestaurantReservation');

    } 
}
