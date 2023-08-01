<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillKnowledge extends Model
{
    protected $table = 'skill_knowledge';

     protected $fillable = [
        'user_id', 'title'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'title' =>'string',
    ];
}
