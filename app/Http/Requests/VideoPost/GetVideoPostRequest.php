<?php

namespace App\Http\Requests\VideoPost;

use App\Http\Requests\BaseRequest;
use App\Repositories\VideoPostRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class GetVideoPostRequest extends BaseRequest
{
    public function validateResolved(): void
    {
        parent::validateResolved();

        $this->checkVideoPostExistence();
    }

    protected function checkVideoPostExistence(): void
    {
        $exists = app(VideoPostRepository::class)->exists($this->route('id'));

        if (!$exists) {
            throw new NotFoundHttpException(__('validation.exceptions.not_found', ['entity' => 'Video Post']));
        }
    }
}
