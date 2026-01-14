<?php

namespace App\Services;

use App\Dto\CommentableWithCommentsDto;
use App\Enums\Comment\CommentableTypeEnum;
use App\Repositories\CommentRepository;
use App\Repositories\NewsRepository;

final class NewsService
{
    public function __construct(
        protected NewsRepository $newsRepository,
        protected CommentRepository $commentRepository,
    ) {
    }

    public function getWithComments(int $id): CommentableWithCommentsDto
    {
        $news = $this->newsRepository->find($id);

        $comments = $this->commentRepository->get($id, CommentableTypeEnum::News);

        return new CommentableWithCommentsDto(
            commentable: $news,
            comments: $comments,
        );
    }
}
