<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})
    ->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);


Route::apiResource('users', UserController::class)
    ->middleware('auth:sanctum');

Route::apiResource('modules', ModuleController::class)
    ->middleware('auth:sanctum');

Route::post('/modules/{id}/activate', [ModuleController::class, 'activate'])
    ->middleware('auth:sanctum');

Route::post('/modules/{id}/deactivate', [ModuleController::class, 'deactivate'])
    ->middleware('auth:sanctum');


// Route::prefix('auth')
// ->group(function(){
//     Route::post('login',[AuthController::class, 'login']);
//     Route::post('register',[AuthController::class, 'register']);
// });