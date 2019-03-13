<?php

namespace App\Services;


use App\Question;
use App\Repositories\QuestionRepositoryInterface;

class QuestionService implements QuestionServiceInterface
{
    private $questionRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    /**
     * @param int $id
     * @return Question
     * @throws \Exception
     */
    public function getQuestionById(int $id): Question
    {
        $question = $this->questionRepository->findById($id);
        if (!$question) {
            throw new \Exception('Question not found');
        }
        return $question;
    }
}