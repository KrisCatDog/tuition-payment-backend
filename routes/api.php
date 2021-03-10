<?php

use App\Http\Controllers\API\ClassController;
use App\Http\Controllers\API\MajorController;
use App\Http\Controllers\API\OfficerController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\TuitionController;
use App\Http\Controllers\API\UserController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'authenticated']);
    Route::apiResource('students', StudentController::class);
    Route::apiResource('tuitions', TuitionController::class);
    Route::apiResource('classes', ClassController::class);
    Route::apiResource('majors', MajorController::class);
    Route::apiResource('officers', OfficerController::class);
    Route::apiResource('payments', PaymentController::class, ['except' => ['update', 'destroy']]);
});
