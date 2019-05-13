<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title', 'url','deleted','published','video_categories_id'
    ];
    function VideoCategory(){
                                 //Table                      Foreign key     Primary k
        return $this->belongsTo(VideoCategory::class, "video_categories_id", "id");
}
}
