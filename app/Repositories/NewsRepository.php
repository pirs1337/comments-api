<?php

namespace App\Repositories;

use App\Contracts\CommentableRepositoryContract;
use App\Models\News;

final class NewsRepository implements CommentableRepositoryContract
{
    public function create(array $data): News
    {
        return News::query()->create($data);
    }

    public function find(int $id): ?News
    {
        return News::query()->find($id);
    }

    public function exists(int $id): bool
    {
        return News::query()
            ->where('id', $id)
            ->exists();
    }
}
