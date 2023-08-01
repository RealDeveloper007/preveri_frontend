<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $table = 'work_experience';

     protected $fillable = [
        'user_id','companyName','location', 'position','from','to','status'
    ];
    //
    protected $casts = [
        'user_id' => 'integer',
        'companyName'=>'string',
        'location'=>'string',
        'position' => 'string',
        'from' => 'string',
        'to' => 'string',
        'status'=>'integer',
    ];
}
