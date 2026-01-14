<?php

namespace App\Services;

use App\Models\Comment;
use App\Repositories\CommentRepository;

final class CommentService
{
    public function __construct(
        protected CommentRepository $commentRepository,
    ) {
    }

    public function create(int $commentatorId, array $data): Comment
    {
        return $this->commentRepository->create(array_merge($data, ['commentator_id' => $commentatorId]));
    }
}
