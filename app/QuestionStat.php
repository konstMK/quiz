<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionStat extends Model
{
    protected $fillable = [
        'score', 'user_id', 'question_id'
    ];
}
