<?php

use App\Http\Controllers\Api\Central\Auth\AuthController;
use App\Http\Controllers\Api\Central\TenantController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;
use App\Http\Controllers\Api\Tenant\DocumentController;
use App\Http\Controllers\Api\Central\UserController;

// Central routes - Start
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('admin/user/{user?}', 'get')->name('admin.user');
    });
});

Route::prefix('tenant')->group(function () {
    Route::get('/create', [TenantController::class, 'create'])->name('tenant.create');
});
// Central routes - End

Route::group([
    'prefix' => '/{tenant}',
    'middleware' => [
        InitializeTenancyByPath::class
    ],
], function () {
    Route::apiResource('document', DocumentController::class);
});
