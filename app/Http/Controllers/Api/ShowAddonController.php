<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Resources\AddonResource;
use App\Models\Addon;

class ShowAddonController
{
    public function __invoke(Addon $addon)
    {
        $addon->loadMissing('latestVersion');

        return new AddonResource($addon);
    }
}
