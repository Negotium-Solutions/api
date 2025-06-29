<?php

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Api\Central\Auth\AuthController;

Route::get('/ping', function () {
    return ['message' => 'pong'];
});

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::middleware([InitializeTenancyByPath::class, PreventAccessFromCentralDomains::class, 'auth:sanctum'])->group(function () {
    //
});
