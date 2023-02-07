<?php

use App\Http\Controllers\Api\GetAddonsController;
use App\Http\Controllers\Api\GetPremiumSponsorsController;
use App\Http\Controllers\Api\LatestVersionController;
use App\Http\Controllers\Api\RegisterGameController;
use App\Http\Controllers\Api\ShowAddonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', function (Request $request) {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    });

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::get('/addons', GetAddonsController::class);
Route::get('/addons/{addon}/show', ShowAddonController::class);

Route::post('/games', RegisterGameController::class);

Route::get('/sponsors/premium', GetPremiumSponsorsController::class);

Route::get('/nova/latest-version', LatestVersionController::class);
