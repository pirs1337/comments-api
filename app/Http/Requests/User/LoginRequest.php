<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

final class LoginRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
}
