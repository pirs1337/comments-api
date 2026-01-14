<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoPost\CreateVideoPostRequest;
use App\Http\Requests\VideoPost\GetVideoPostRequest;
use App\Http\Resources\VideoPostResource;
use App\Http\Resources\VideoPostWithCommentsResource;
use App\Repositories\VideoPostRepository;
use App\Services\VideoPostService;

final class VideoPostController extends Controller
{
    public function create(CreateVideoPostRequest $request, VideoPostRepository $repository): VideoPostResource
    {
        $videoPost = $repository->create($request->validated());

        return new VideoPostResource($videoPost);
    }

    public function get(GetVideoPostRequest $request, VideoPostService $service, int $id): VideoPostWithCommentsResource
    {
        $videoPostWithComments = $service->getWithComments($id);

        return new VideoPostWithCommentsResource($videoPostWithComments);
    }
}
