<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomepageSection extends Model
{
    protected $table = 'homepage_section';

     protected $fillable = [
        'title', 'short_description','sub_str','image','status'
    ];
    //
    protected $casts = [
        'title' => 'string',
        'short_description' => 'string',
        'sub_str'=>'integer',
        'image'=>'string',
        'status'=>'integer',
    ];
}
