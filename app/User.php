<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Carbon;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class User extends Authenticatable
{
    use Notifiable,
        HasApiTokens,
        Loggable;

    const ROLE = [
        "Admin" => 1,
        "Company" => 2,
        "User" => 3,
    ];
    const STATUS = [
        "Active" => 1,
        "Inactive" => 2,
    ];
    const LOGIN_VIA = [
        1 => "Web",
        2 => "Gmail",
        3 => "FB",
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'social_id', 'role','username','role', 'name', 'email', 'email_verified_at', 'password', 'phone', 'dob', 'image','status','login_via'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'social_id' => 'integer',
        'username' =>'string',
        'role' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'phone' => 'integer',
        'dob' => 'string',
        'image' => 'string',
        'status' => 'integer',
        'login_via' => 'string'
    ];

    public function BasicInfo()
    {
        return $this->hasOne(BasicInformation::class, 'user_id','id');

    }

    public function EducationDetails()
    {
        return $this->hasMany(EducationDetail::class, 'user_id','id');

    }

     public function SkillKnowledge()
    {
        return $this->hasMany(SkillKnowledge::class, 'user_id','id');

    }

    public function WorkExperience()
    {
        return $this->hasMany(WorkExperience::class, 'user_id','id');

    }

}
