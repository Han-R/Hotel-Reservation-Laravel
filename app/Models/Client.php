<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    //
    use Notifiable;

    protected $fillable = [
        'name','email','phone','password','address','no_of_adults','no_of_children','deleted',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

      //relationship between Client and RoomReservation one to many
      public function roomResrvations(){

        return $this->hasMany('App\Models\RoomReservation');

    }

     //relationship between Client and RestaurantReservation one to many
     public function restaurantResrvations(){

        return $this->hasMany('App\Models\RestaurantReservation');

    }
}
