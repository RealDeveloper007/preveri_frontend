<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyViewed extends Model
{
    protected $table = 'company_viewed';

    //
    protected $casts = [
        'company_id'=>'integer',
        'date'=>'date',
    ];

       protected $fillable = [
       'company_id',
       'date'
    ];

}
