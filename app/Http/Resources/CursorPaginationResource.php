<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Pagination\CursorPaginator;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class CursorPaginationResource extends ResourceCollection
{
    public function __construct(
        CursorPaginator $resource,
    ) {
        parent::__construct($resource);
    }

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'links' => [
                'next' => $this->resource->nextPageUrl(),
                'prev' => $this->resource->previousPageUrl(),
            ],
            'meta' => [
                'path' => $this->resource->path(),
                'per_page' => $this->resource->perPage(),
                'next_cursor' => $this->resource->nextCursor()?->encode(),
                'prev_cursor' => $this->resource->previousCursor()?->encode(),
            ],
        ];
    }
}
