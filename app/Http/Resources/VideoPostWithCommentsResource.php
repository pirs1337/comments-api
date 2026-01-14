<?php

namespace App\Http\Resources;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class VideoPostWithCommentsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $this->resource->comments->through(fn (Comment $comment) => new CommentResource($comment));

        return [
            'video_post' => new VideoPostResource($this->resource->commentable),
            'comments' => new CursorPaginationResource($this->resource->comments),
        ];
    }
}
