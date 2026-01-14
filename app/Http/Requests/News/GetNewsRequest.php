<?php

namespace App\Http\Requests\News;

use App\Http\Requests\BaseRequest;
use App\Repositories\NewsRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class GetNewsRequest extends BaseRequest
{
    public function validateResolved(): void
    {
        parent::validateResolved();

        $this->checkNewsExistence();
    }

    protected function checkNewsExistence(): void
    {
        $exists = app(NewsRepository::class)->exists($this->route('id'));

        if (!$exists) {
            throw new NotFoundHttpException(__('validation.exceptions.not_found', ['entity' => 'News']));
        }
    }
}
