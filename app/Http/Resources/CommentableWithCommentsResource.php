<?php

namespace App\Http\Resources;

use App\Factories\CommentableResourceFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class CommentableWithCommentsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $commentableResource = app(CommentableResourceFactory::class)
            ->make($this->resource->commentable);

        return [
            'commentable' => $commentableResource,
            'comments' => [
                'data' => CommentResource::collection($this->resource->comments),
                'links' => [
                    'next' => $this->resource->comments->nextPageUrl(),
                    'prev' => $this->resource->comments->previousPageUrl(),
                ],
                'meta' => [
                    'path' => $this->resource->comments->path(),
                    'per_page' => $this->resource->comments->perPage(),
                    'next_cursor' => $this->resource->comments->nextCursor()?->encode(),
                    'prev_cursor' => $this->resource->comments->previousCursor()?->encode(),
                ],
            ],
        ];
    }
}
