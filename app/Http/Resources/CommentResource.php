<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class CommentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'text' => $this->resource->text,
            'commentable_id' => $this->resource->commentable_id,
            'commentable_type' => $this->resource->commentable_type,
            'commentator' => new UserResource($this->whenLoaded('commentator')),
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ];
    }
}
