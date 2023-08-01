<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class News extends Model
{
        use Loggable;

    protected $table = 'news';

     protected $fillable = [
        'title','slug','image', 'short_description','description','date'
    ];
    //
    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'image' => 'string',
        'short_description' => 'string',
        'description' => 'string',
        'date' => 'date',
    ];
}
