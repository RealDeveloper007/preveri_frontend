<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Setting extends Model
{
        use Loggable;

    protected $table = 'setting';

    //
    protected $casts = [
        'site_title' => 'string',
        'logo'=>'string',
        'short_desc_about' => 'string',
        'short_description' => 'string',
        'address' => 'string',
        'email' => 'string',
        'phone'=>'integer',
        'about_us'=>'string',
        'terms_condition'=>'string',
        'privacy_policy'=>'string',
        'privacy'=>'string'

    ];

}
