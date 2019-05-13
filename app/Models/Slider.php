<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $fillable = [
        'title','subtitle','image','url','button_text','deleted','active'
    ];
}