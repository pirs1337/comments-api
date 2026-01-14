<?php

namespace App\Http\Controllers;

use App\Http\Requests\News\CreateNewsRequest;
use App\Http\Requests\News\GetNewsRequest;
use App\Http\Resources\CommentableWithCommentsResource;
use App\Http\Resources\NewsResource;
use App\Repositories\NewsRepository;
use App\Services\NewsService;

final class NewsController extends Controller
{
    public function create(CreateNewsRequest $request, NewsRepository $repository): NewsResource
    {
        $news = $repository->create($request->validated());

        return new NewsResource($news);
    }

    public function get(GetNewsRequest $request, NewsService $service, int $id): CommentableWithCommentsResource
    {
        $newsWithComments = $service->getWithComments($id);

        return new CommentableWithCommentsResource($newsWithComments);
    }
}
