<?php

namespace App\Repositories;

use App\Contracts\CommentableRepositoryContract;
use App\Models\VideoPost;

final class VideoPostRepository implements CommentableRepositoryContract
{
    public function create(array $data): VideoPost
    {
        return VideoPost::query()->create($data);
    }

    public function find(int $id): ?VideoPost
    {
        return VideoPost::query()->find($id);
    }

    public function exists(int $id): bool
    {
        return VideoPost::query()
            ->where('id', $id)
            ->exists();
    }
}
