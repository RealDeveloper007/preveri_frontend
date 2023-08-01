<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasicInformation extends Model
{
    protected $table = 'basic_information';

     protected $fillable = [
        'user_id', 'user_status','user_interest','cv', 'net_salary','phone','dob', 'category_driving_licence'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'user_status' =>'string',
        'user_interest' => 'string',
        'cv' => 'string',
        'net_salary' => 'string',
        'phone' => 'string',
        'dob' => 'string',
        'category_driving_licence' => 'json',
    ];
}
