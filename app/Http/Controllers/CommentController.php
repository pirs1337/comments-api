<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\CreateCommentRequest;
use App\Http\Requests\Comments\DeleteCommentRequest;
use App\Http\Requests\Comments\GetCommentRequest;
use App\Http\Requests\Comments\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Repositories\CommentRepository;
use App\Services\CommentService;
use Symfony\Component\HttpFoundation\Response;

final class CommentController extends Controller
{
    public function create(CreateCommentRequest $request, CommentService $service): CommentResource
    {
        $comment = $service->create($request->user()->id, $request->validated());

        return new CommentResource($comment);
    }

    public function get(GetCommentRequest $request, CommentRepository $repository, int $id): CommentResource
    {
        $comment = $repository->find($id);

        return new CommentResource($comment);
    }

    public function delete(DeleteCommentRequest $request, CommentRepository $repository, int $id): Response
    {
        $repository->delete($id);

        return new Response(null, Response::HTTP_NO_CONTENT);
    }

    public function update(UpdateCommentRequest $request, CommentRepository $repository, int $id): Response
    {
        $repository->update($id, $request->validated());

        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
