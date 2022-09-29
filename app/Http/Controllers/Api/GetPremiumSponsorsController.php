<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Resources\SponsorCollection;
use App\Models\Sponsor;

class GetPremiumSponsorsController
{
    public function __invoke()
    {
        return new SponsorCollection(Sponsor::active()->premiumTier()->get());
    }
}
