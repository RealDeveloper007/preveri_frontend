<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivedData extends Model
{
    protected $table = 'archived_data';

    //
    protected $casts = [
        'search_key'=>'string',
        'date'=>'string',
    ];

       protected $fillable = [
       'search_key',
       'date'
    ];

}
