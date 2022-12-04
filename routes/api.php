<?php

use App\Http\Controllers\Api\GetPremiumSponsorsController;
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

Route::get('/sponsors/premium', GetPremiumSponsorsController::class);
