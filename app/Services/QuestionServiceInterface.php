<?php

namespace App\Services;


use App\Question;

interface QuestionServiceInterface
{
    /**
     * @param int $id
     * @return Question
     */
    public function getQuestionById(int $id): Question;
}
