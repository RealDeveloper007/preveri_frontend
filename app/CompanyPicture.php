<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyPicture extends Model
{

     protected $fillable = [
        'company_id','ip_address', 'picture','added_by','status'
    ];
    //
    protected $casts = [
        'ip_address' => 'string',
        'company_id' => 'integer',
        'picture' => 'string',
        'added_by' => 'integer',
        'status' => 'string',
    ];

    public function company()
    {
        return $this->hasOne(Company::class, 'id','company_id');
    }
    
       public function added_by_user()
    {
        return $this->hasOne(User::class, 'id','added_by');

    }
}
