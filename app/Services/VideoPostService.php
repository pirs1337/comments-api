<?php

namespace App\Services;

use App\Dto\CommentableWithCommentsDto;
use App\Enums\Comment\CommentableTypeEnum;
use App\Repositories\CommentRepository;
use App\Repositories\VideoPostRepository;

final class VideoPostService
{
    public function __construct(
        protected VideoPostRepository $videoPostRepository,
        protected CommentRepository $commentRepository,
    ) {
    }

    public function getWithComments(int $id): CommentableWithCommentsDto
    {
        $videoPost = $this->videoPostRepository->find($id);

        $comments = $this->commentRepository->get($id, CommentableTypeEnum::VideoPost);

        return new CommentableWithCommentsDto(
            commentable: $videoPost,
            comments: $comments,
        );
    }
}
