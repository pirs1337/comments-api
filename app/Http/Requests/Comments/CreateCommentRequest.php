<?php

namespace App\Http\Requests\Comments;

use App\Contracts\CommentableModelContract;
use App\Enums\Comment\CommentableTypeEnum;
use App\Factories\CommentableRepositoryFactory;
use App\Http\Requests\BaseRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class CreateCommentRequest extends BaseRequest
{
    protected ?CommentableModelContract $commentable;

    public function rules(): array
    {
        return [
            'text' => 'required|string',
            'commentable_id' => "required|integer",
            'commentable_type' => 'required|string|in:' . CommentableTypeEnum::toString(),
        ];
    }

    public function validateResolved(): void
    {
        parent::validateResolved();

        $this->init();

        $this->checkCommentableExistence();
    }

    protected function init(): void
    {
        $this->commentable = app(CommentableRepositoryFactory::class)
            ->make(CommentableTypeEnum::from($this->input('commentable_type')))
            ->find($this->input('commentable_id'));
    }

    protected function checkCommentableExistence(): void
    {
        if (is_null($this->commentable)) {
            throw new NotFoundHttpException(__('validation.exceptions.not_found', ['entity' => 'Commentable']));
        }
    }
}
