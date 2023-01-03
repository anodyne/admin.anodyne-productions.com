<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Resources\AddonCollection;
use App\Models\Addon;
use Spatie\QueryBuilder\QueryBuilder;

class GetAddonsController
{
    public function __invoke()
    {
        $addons = QueryBuilder::for(Addon::class)
            ->allowedFilters(['name', 'user.name'])
            ->allowedIncludes(['products'])
            ->published()
            ->with('user', 'products')
            ->withCount('downloads')
            ->get();

        return new AddonCollection($addons);
    }
}
