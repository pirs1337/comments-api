<?php

namespace App\Http\Requests\VideoPost;

use App\Http\Requests\BaseRequest;

final class CreateVideoPostRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ];
    }
}
