<?php

namespace App\Repositories;


use App\Answer;
use App\Question;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class QuestionRepository implements QuestionRepositoryInterface
{
    /**
     * @return Collection|null
     */
    public function findAllQuestion(): ?Collection
    {
        // TODO: Implement findAllQuestion() method.
    }

    /**
     * @param int $id
     * @return Question|null
     */
    public function findById(int $id): ?Question
    {
        $question = Question::find($id);
        if (!$question) {
            return null;
        }

        return $question->with('answers')->first();
    }

    /**
     * @param int $id
     * @return Collection|null
     */
    public function findByUserId(int $id): ?Collection
    {
        // TODO: Implement findByUserId() method.
    }

    /**
     * @param array $question
     */
    public function create(array $question): void
    {
        // TODO: Implement create() method.
    }

    /**
     * @param int $id
     * @param array $question
     */
    public function update(int $id, array $question): void
    {
        // TODO: Implement update() method.
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }

}