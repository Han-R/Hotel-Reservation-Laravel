<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoCategory extends Model
{
    protected $fillable = [
        'name', 'deleted','published'
    ];
    function Video(){
        //Table           Foreign Key   Primary Key
return $this->hasMany(videos::class, "photo_categories_id", "id");
}
}
