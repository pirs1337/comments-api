<?php

namespace App\Http\Requests\News;

use App\Http\Requests\BaseRequest;

final class CreateNewsRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ];
    }
}
