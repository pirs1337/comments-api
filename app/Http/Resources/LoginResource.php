<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class LoginResource extends JsonResource
{
    public function __construct(
        protected string $token,
        protected User $user,
    ) {
        parent::__construct([]);
    }

    public function toArray(Request $request): array
    {
        return [
            'token' => $this->token,
            'user' => new UserResource($this->user),
        ];
    }
}
