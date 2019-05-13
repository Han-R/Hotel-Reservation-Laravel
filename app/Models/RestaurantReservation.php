<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantReservation extends Model
{
    //
    protected $fillable = [
        'table_id','product_id','time_id','client_id','deleted',
    ];

    public function client(){

        return $this->belongsTo('App\Models\Client','client_id');

    }

    public function restaurantTable(){

        return $this->belongsTo('App\Models\RstaurantTable','table_id');

    }
    public function restaurantMenu(){

        return $this->belongsTo('App\Models\RestaurantMenu','product_id');

    }

    public function restaurantTime(){

        return $this->belongsTo('App\Models\RestaurantTime','time_id');

    }

     
}
