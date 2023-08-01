<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PopularVideo extends Model
{
    protected $table = 'popular_videos';

    //
    protected $casts = [
        'title'=>'string',
        'thumbnail'=>'string',
        'video'=>'string',
        'status'=>'integer',
        'created_at'=>'datetime',
        'updated_at'=>'datetime'
    ];

       protected $fillable = [
       'title',
       'thumbnail',
       'video',
       'status'
    ];

}
