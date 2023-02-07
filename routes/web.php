<?php

use App\Models\Release;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Route;

Route::get('/nova', function () {
    $release = Release::query()
        ->where('published', true)
        ->latest('date')
        ->first();

    $sponsors = Sponsor::active()->premiumTier()->shouldBeDisplayed()->get();

    return view('nova-2', [
        'latestVersion' => $release->version,
        'sponsors' => $sponsors,
    ]);
})->name('home');

Route::get('/nova-3', function () {
    return view('nova-3');
})->name('nova-3');

Route::redirect('/', '/nova');
