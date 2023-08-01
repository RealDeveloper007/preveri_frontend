<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    //
    protected $casts = [
        'title'=>'string',
        'status'=>'integer'
    ];

       protected $fillable = [
       'title',
       'status'
    ];

}
