<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\API\LoginAPIRequest;
use App\Http\Controllers\AppBaseController;

class AuthAPIController extends AppBaseController
{
    public function login(LoginAPIRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            /** @var User $user */
            $user = Auth::user();
            $token = $user->createToken(Str::slug(config('app.name') . '_auth_token', '_'))->plainTextToken;
            return $this->sendResponse(['token' => $token, 'user' => $user->toArray()], 'Logged in');
        }

        return $this->sendError('These credentials do not match our records', 406);
    }
}
