<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Release;

class LatestVersionController extends Controller
{
    public function __invoke()
    {
        return Release::latest('date')->first()->toJson();
    }
}
