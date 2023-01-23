<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Release;
use Illuminate\Http\Request;

class CheckLatestVersionController extends Controller
{
    public function __invoke(Request $request)
    {
        $latestRelease = Release::latest('date')->first();

        if (version_compare($latestRelease->name, $request->version, '>')) {
            return $latestRelease->toJson();
        }

        return response()->json();
    }
}
