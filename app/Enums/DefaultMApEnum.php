<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class DefaultMApEnum extends Enum
{
    const MAP = [
        'pits-map',
        'bing-default',
        'google-default'
    ];
}
