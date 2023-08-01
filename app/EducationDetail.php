<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationDetail extends Model
{
    protected $table = 'education_details';

     protected $fillable = [
        'user_id', 'school_college','city','period'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'school_college' =>'string',
        'period' => 'string',
        'city' => 'string',
    ];
}
