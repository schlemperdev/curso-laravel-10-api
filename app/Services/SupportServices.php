<?php

namespace App\Services;

use stdClass;

class SupportService
{
    protected $repository;

    public function __construct()
    {

    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function new(
        string $subject,
        string $message,
        string $status,
    ): stdClass
    {
        return $this->repository->new(
            $subject,
            $message,
            $status
        );
    }

    public function update(
        string $id,
        string $subject,
        string $message,
        string $status,
    ): stdClass|null
    {
        return $this->repository->update(
            $id,
            $subject,
            $message,
            $status
        );
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
