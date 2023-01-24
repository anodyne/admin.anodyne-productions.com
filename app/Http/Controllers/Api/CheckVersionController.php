<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Release;
use Illuminate\Http\Request;

class CheckVersionController extends Controller
{
    public function __invoke(Request $request)
    {
        $latestRelease = Release::query()
            ->where('date', '<=', now()->startOfDay())
            ->latest('date')
            ->first();

        if (version_compare($latestRelease->version, $request->version, '>')) {
            return $latestRelease->toJson();
        }

        return response()->json();
    }
}
