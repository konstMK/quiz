<?php

namespace App\Repositories;


use App\Question;
use Illuminate\Database\Eloquent\Collection;

interface QuestionRepositoryInterface
{
    /**
     * @return Collection|null
     */
    public function findAllQuestion(): ?Collection;

    /**
     * @param int $id
     * @return Question|null
     */
    public function findById(int $id): ?Question;

    /**
     * @param int $id
     * @return Collection|null
     */
    public function findByUserId(int $id): ?Collection;

    /**
     * @param array $question
     */
    public function create(array $question): void;

    /**
     * @param int $id
     * @param array $question
     */
    public function update(int $id, array $question): void;

    /**
     * @param int $id
     */
    public function delete(int $id): void;
}