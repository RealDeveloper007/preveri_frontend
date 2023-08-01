<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class CompanySalaries extends Model
{
        use Loggable;

    protected $table = 'company_salaries';

     protected $fillable = [
        'company_comment_id','company_id', 'workplace','avarage_salary','min_salary', 'max_salary', 'added_by','status'
    ];
    //
    protected $casts = [
        'company_comment_id' => 'integer',
        'company_id' => 'integer',
        'workplace' => 'string',
        'avarage_salary' => 'string',
        'min_salary' => 'string',
        'max_salary' => 'string',
        'added_by'=>'integer',
        'status'=>'integer',
    ];
    
     public function added_by()
    {
        return $this->hasOne(User::class, 'id','added_by');

    }

      public function company()
    {
        return $this->hasOne(Company::class, 'id','company_id');
    }
}
