<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class CompanyComments extends Model
{
    use Loggable;
    protected $table = 'company_comments';

    protected $fillable = [
        'company_id', 'added_by', 'ip_address', 'good_stuff', 'bad_things', 'management_advice', 'full_response', 'full_response_by_user', 'additional_text', 'notes', 'status'
    ];
    //
    protected $casts = [
        'company_id' => 'integer',
        'added_by' => 'integer',
        'ip_address' => 'string',
        'good_stuff' => 'string',
        'bad_things' => 'string',
        'management_advice' => 'string',
        'full_response' => 'json',
        'full_response_by_user' => 'json',
        'additional_text' => 'integer',
        'notes' => 'string',
        'status' => 'integer',
    ];

    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function added_by_user()
    {
        return $this->hasOne(User::class, 'id', 'added_by');
    }

    public function added_by()
    {
        return $this->hasOne(User::class, 'id', 'added_by');
    }
}
