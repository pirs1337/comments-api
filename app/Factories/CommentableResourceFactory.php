<?php

namespace App\Factories;

use App\Contracts\CommentableModelContract;
use App\Enums\Comment\CommentableTypeEnum;
use App\Http\Resources\CommentResource;
use App\Http\Resources\NewsResource;
use App\Http\Resources\VideoPostResource;
use Illuminate\Http\Resources\Json\JsonResource;

final class CommentableResourceFactory
{
    protected const MAP = [
        CommentableTypeEnum::News->value => NewsResource::class,
        CommentableTypeEnum::Comment->value => CommentResource::class,
        CommentableTypeEnum::VideoPost->value => VideoPostResource::class,
    ];

    public function make(CommentableModelContract $commentable): JsonResource
    {
        $resourceClass = self::MAP[$commentable->getMorphClass()];

        return new $resourceClass($commentable);
    }
}
