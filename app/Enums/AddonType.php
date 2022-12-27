<?php

declare(strict_types=1);

namespace App\Enums;

enum AddonType: string
{
    case extension = 'extension';

    // case genre = 'genre';

    case rank = 'rank';

    case theme = 'theme';

    public function displayName(): string
    {
        return ucfirst($this->value);
    }
}
