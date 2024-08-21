<?php

namespace App\Http\Controllers\API;

use stdClass;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;
use App\Notifications\Auth\ResetPassword;
use App\Http\Requests\API\LoginAPIRequest;
use App\Http\Requests\API\ResetAPIRequest;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\RecoverAPIRequest;
use App\Http\Requests\API\RegisterAPIRequest;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthAPIController extends AppBaseController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => ['login', 'register', 'recover', 'reset', 'resetPassword', 'getFrontendLogin', 'verifyEmail']]);
    }

    public function verifyEmail(Request $request, $user_id)
    {
        $user = User::find($user_id);

        if ($user == null) {
            $url = config('app.frontend_url');
            return Redirect::to("$url/login?error=true");
        }

        if (!$request->hasValidSignature()) {
            $url = config('app.frontend_url');
            return Redirect::to("$url/login?error=true");
        }

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        $url = config('app.frontend_url');
        return Redirect::to("$url/login?success=true");
    }

    public function login(LoginAPIRequest $request)
    {
        $request->validated();

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            /** @var User $user */
            $user = Auth::user();
            $user_permissions = $user->getAllPermissions();
            $token = $user->createToken(Str::slug(config('app.name') . '_auth_token', '_'))->plainTextToken;
            return $this->sendResponse(['token' => $token, 'user' => $user->toArray(), 'userPermissions' => $user_permissions->pluck('name')], 'Logged in');
        }

        return $this->sendError('These credentials do not match our records');
    }

    public function getFrontendLogin()
    {
        return redirect(env('APP_FRONTEND_URL'));
    }

    public function logout()
    {
        /** @var User $user */
        $user =  Auth::user();
        // $user->currentAccessToken()->delete();
        $user->tokens()->delete();
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

        Auth::login($user);

        //Assign role
        $data_viewer_role = Role::where('name', '=', 'data-viewer')->first();
        $user->assignRole($data_viewer_role);

        $user_permissions = $user->getAllPermissions();

        try {
            //Send email for verification
            event(new Registered($user));
        } catch (\Throwable $th) {
        }


        $token = $user->createToken(Str::slug(config('app.name') . '_auth_token', '_'))->plainTextToken;
        return $this->sendResponse(['token' => $token, 'user' => $user->toArray(), 'userPermissions' => $user_permissions->toArray()], 'Registered');
    }


    public function recover(RecoverAPIRequest $request)
    {
        $request->validated();

        $user = User::where('email', $request->get('email'))->first();
        if (!$user) {
            return $this->sendError('The email entered is not registered', 406);
        }

        $token = Str::random(60);
        DB::table('password_resets')->where('email', $request->get('email'))->delete();
        DB::table('password_resets')->insert(['email' => $request->get('email'), 'token' => $token, 'created_at' => Carbon::now()]);

        $objNotificationData = new stdClass();
        $objNotificationData->token = $token;
        $objNotificationData->user = $user;
        $user->notify((new ResetPassword($objNotificationData)));

        return $this->sendResponse(null, 'An email has been sent with a link to reset the password');
    }


    public function resetPassword(Request $request, $token)
    {
        $tokenData = DB::table('password_resets')->where('token', $token)->first();
        $url = config('app.frontend_url');

        if ($tokenData) {
            return Redirect::to("$url/reset-password?success=true&token=$token");
        }

        return Redirect::to("$url/forgot-password?error=true");
    }

    public function reset(ResetAPIRequest $request)
    {
        $request->validated();

        $tokenData = DB::table('password_resets')->where('token', $request->get('token'))->first();
        if ($tokenData) {
            $user = User::where('email', $tokenData->email)->first();
            if (!$user) {
                return $this->sendError('The email entered is not registered', 406);
            }
            $user->password = bcrypt($request->get('password'));
            if (is_null($user->email_verified_at)) {
                $user->email_verified_at = Carbon::now();
            }
            $user->save();

            DB::table('password_resets')->where('email', $user->email)->delete();
            /** @var User $user */
            $user = Auth::loginUsingId($user->id);
            $token = $user->createToken(Str::slug(config('app.name') . '_auth_token', '_'))->plainTextToken;
            $user_permissions = $user->getAllPermissions();
            return $this->sendResponse(['token' => $token, 'user' => $user->toArray(), 'userPermissions' => $user_permissions->pluck('name')], 'Password reset successfully');
        }

        return $this->sendError('The recovery token is incorrect or has already been used', 406);
    }

    public function verify(Request $request)
    {
        try {
            $request->user()->sendEmailVerificationNotification();
        } catch (\Throwable $th) {
            return $this->sendError('An error occured');
        }

        return $this->sendResponse(null, 'An email has been sent with a link to verify your email address');
    }
}
