<?php

namespace App\Factories;

use App\Contracts\CommentableRepositoryContract;
use App\Enums\Comment\CommentableTypeEnum;
use App\Repositories\CommentRepository;
use App\Repositories\NewsRepository;
use App\Repositories\VideoPostRepository;

final class CommentableRepositoryFactory
{
    protected const MAP = [
        CommentableTypeEnum::News->value => NewsRepository::class,
        CommentableTypeEnum::Comment->value => CommentRepository::class,
        CommentableTypeEnum::VideoPost->value => VideoPostRepository::class,
    ];

    public function make(CommentableTypeEnum $type): CommentableRepositoryContract
    {
        return app(self::MAP[$type->value]);
    }
}
