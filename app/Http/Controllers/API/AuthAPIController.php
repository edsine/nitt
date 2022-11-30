<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\API\LoginAPIRequest;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\RegisterAPIRequest;

class AuthAPIController extends AppBaseController
{
    public function login(LoginAPIRequest $request)
    {
        $request->validated();

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            /** @var User $user */
            $user = Auth::user();
            $token = $user->createToken(Str::slug(config('app.name') . '_auth_token', '_'))->plainTextToken;
            return $this->sendResponse(['token' => $token, 'user' => $user->toArray()], 'Logged in');
        }

        return $this->sendError('These credentials do not match our records', 406);
    }

    public function logout()
    {
        /** @var User $user */
        $user = Auth::user();
        $user->currentAccessToken()->delete();
        return $this->sendResponse(null, 'Session closed successfully');
    }

    public function register(RegisterAPIRequest $request)
    {
        $request->validated();

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->save();

        //Send email for verification
        event(new Registered($user));
        
        //Assign role



        $token = $user->createToken(Str::slug(config('app.name').'_auth_token', '_'))->plainTextToken;
        return $this->sendResponse(['token' => $token, 'user' => $user->toArray()], 'Registered');
    }
}
