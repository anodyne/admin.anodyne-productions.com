<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Resources\AddonCollection;
use App\Models\Addon;

class GetAddonsController
{
    public function __invoke()
    {
        return new AddonCollection(Addon::published()->get());
    }
}
