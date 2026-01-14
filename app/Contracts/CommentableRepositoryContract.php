<?php

namespace App\Contracts;

interface CommentableRepositoryContract
{
    public function find(int $id): ?CommentableModelContract;
}
