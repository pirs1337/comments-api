<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use App\Models\News;
use App\Models\VideoPost;
use App\Models\Comment;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Relation::morphMap([
            'news' => News::class,
            'video_post' => VideoPost::class,
            'comment' => Comment::class,
        ]);
    }
}
