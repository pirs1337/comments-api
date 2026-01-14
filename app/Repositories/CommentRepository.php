<?php

namespace App\Repositories;

use App\Contracts\CommentableRepositoryContract;
use App\Enums\Comment\CommentableTypeEnum;
use App\Models\Comment;
use Illuminate\Contracts\Pagination\CursorPaginator;

final class CommentRepository implements CommentableRepositoryContract
{
    public function create(array $data): Comment
    {
        return Comment::query()->create($data);
    }

    public function delete(int $id): int
    {
        return Comment::destroy($id);
    }

    public function update(int $id, array $data): int
    {
        return Comment::query()
            ->where('id', $id)
            ->update($data);
    }

    public function get(int $commentableId, CommentableTypeEnum $commentableType): CursorPaginator
    {
        return Comment::query()
            ->where('commentable_id', $commentableId)
            ->where('commentable_type', $commentableType)
            ->with('commentator')
            ->cursorPaginate();
    }

    public function find(int $id): ?Comment
    {
        return Comment::query()->find($id);
    }

    public function exists(int $id): bool
    {
        return Comment::query()
            ->where('id', $id)
            ->exists();
    }
}
