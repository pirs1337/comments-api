<?php

namespace App\Dto;

use App\Contracts\CommentableModelContract;
use Illuminate\Contracts\Pagination\CursorPaginator;
use App\Models\Comment;

/**
 * @property-read CursorPaginator<Comment> comments
 */
final readonly class CommentableWithCommentsDto
{
    /**
     * @param CursorPaginator<Comment> $comments
     */
    public function __construct(
        public CommentableModelContract $commentable,
        public CursorPaginator $comments,
    ) {
    }
}
