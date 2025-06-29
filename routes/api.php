<?php

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Api\Central\Auth\AuthController;
use App\Http\Controllers\Api\Central\TenantController;

// Central routes - Start
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});
// Central routes - End

Route::middleware([InitializeTenancyByPath::class, PreventAccessFromCentralDomains::class, 'auth:sanctum'])->group(function () {
    Route::prefix('tenant')->group(function () {
        Route::get('/create', [TenantController::class, 'create'])->name('tenant.create');
    });
});
