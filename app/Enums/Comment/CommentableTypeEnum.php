<?php

namespace App\Enums\Comment;

use App\Support\Traits\EnumTrait;

enum CommentableTypeEnum: string
{
    use EnumTrait;

    case News = 'news';
    case VideoPost = 'video_post';
    case Comment = 'comment';
}
