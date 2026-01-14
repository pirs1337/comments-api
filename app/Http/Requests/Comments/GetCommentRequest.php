<?php

namespace App\Http\Requests\Comments;

use App\Http\Requests\BaseRequest;
use App\Repositories\CommentRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class GetCommentRequest extends BaseRequest
{
    public function validateResolved(): void
    {
        parent::validateResolved();

        $this->checkCommentExistence();
    }

    protected function checkCommentExistence(): void
    {
        $exists = app(CommentRepository::class)->exists($this->route('id'));

        if (!$exists) {
            throw new NotFoundHttpException(__('validation.exceptions.not_found', ['entity' => 'Comment']));
        }
    }
}
