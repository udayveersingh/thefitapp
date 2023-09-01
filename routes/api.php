<?php

use App\Http\Controllers\Api\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [RegisterController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/logout', [RegisterController::class, 'logout']);
    Route::post('/refresh', [RegisterController::class, 'refresh']);
    Route::get('/user-profile', [RegisterController::class, 'userProfile']);  

});

Route::Resource('/users',App\Http\Controllers\Api\UserController::class);
Route::post('/user-update/{id}',[App\Http\Controllers\Api\UserController::class,'update']);
Route::post('/create-otp',[App\Http\Controllers\Api\UserOtpController::class,'create']);
Route::post('/verify-otp',[App\Http\Controllers\Api\UserOtpController::class,'verify']);
Route::resource('/user-profile',App\Http\Controllers\Api\UserProfileController::class);
Route::resource('/user-tracker',App\Http\Controllers\Api\UserTrackerController::class);
Route::resource('/user-income-summary',App\Http\Controllers\Api\UserIncomeSummaryController::class);
Route::resource('/user-task',App\Http\Controllers\Api\UserTaskController::class);

