<?php

namespace App\Http\Requests\Comments;

use App\Http\Requests\BaseRequest;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class DeleteCommentRequest extends BaseRequest
{
    protected ?Comment $comment;

    public function authorize(): bool
    {
        return $this->comment->commentator_id === $this->user()->id;
    }

    public function validateResolved(): void
    {
        $this->init();

        $this->checkCommentExistence();

        parent::validateResolved();
    }

    protected function checkCommentExistence(): void
    {
        if (is_null($this->comment)) {
            throw new NotFoundHttpException(__('validation.exceptions.not_found', ['entity' => 'Comment']));
        }
    }

    protected function init(): void
    {
        $this->comment = app(CommentRepository::class)->find($this->route('id'));
    }
}
