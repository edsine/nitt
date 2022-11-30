<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthAPIController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('samples', App\Http\Controllers\API\SampleAPIController::class);

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthAPIController::class, 'login'])->name('auth.login');
    Route::post('logout', [AuthAPIController::class, 'logout'])->name('auth.logout');
    Route::post('register', [AuthAPIController::class, 'register'])->name('auth.register');
    Route::post('recover', [AuthAPIController::class, 'recover'])->name('auth.recover');
    Route::post('reset', [AuthAPIController::class, 'reset'])->name('auth.reset');
});


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
})->middleware(['auth', 'signed'])->name('verification.verify');
