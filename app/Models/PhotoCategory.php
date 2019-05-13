<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoCategory extends Model
{
     //
     protected $fillable = [
        'name','published','deleted',
    ];

      //relationship between photo and photocategory one to many
      public function photos(){

        return $this->hasMany('App\Models\Photo');

    }

    
}
